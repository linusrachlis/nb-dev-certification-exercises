<?php

require_once __DIR__ . '/../common.php';

$eventId = empty($_GET['id']) ? null : $_GET['id'];
if (empty($eventId) || !is_numeric($eventId)) {
    die("Invalid event ID: " . var_export($eventId, true) . ". Expected e.g. <em>?id=123</em>");
}

$form = new Zend_Form();
$form->addElements([
    'name' => [
        'type' => 'text',
        'options' => [
            'required' => true,
            'label' => "Name"
        ]
    ],
    'status' => [
        'type' => 'select',
        'options' => [
            'required' => true,
            'label' => "Status",
            'multiOptions' => [
                'unlisted' => 'unlisted',
                'published' => 'published',
                'hidden' => 'hidden'
            ],
        ],
    ],
    'start_time' => [
        'type' => 'text',
        'options' => [
            'required' => true,
            'label' => "Start Time",
            'size' => '50',
            'validators' => [
                [
                    'validator' => 'date',
                    'options' => ['format' => Zend_Date::ISO_8601]
                ]
            ]
        ]
    ],
    'end_time' => [
        'type' => 'text',
        'options' => [
            'required' => true,
            'label' => "End Time",
            'size' => '50',
            'validators' => [
                [
                    'validator' => 'date',
                    'options' => ['format' => Zend_Date::ISO_8601]
                ]
            ]
        ]
    ],
    'submit' => [
        'type' => 'Submit',
        'options' => ['label' => "Save Changes"],
    ]
]);

// If submitted
if (count($_POST)) {
    // If valid
    if ($form->isValid($_POST)) {
        $event = $form->getValues();
        // Update event
        $site->request('put', "pages/events/$eventId", ['event' => $event]);
        $success = true;
    }
} else {
    // If not submitted, populate form from fresh API call.
    $event = $site->request('get', "pages/events/$eventId")['event'];
    $form->populate($event);
}

require __DIR__ . '/../html/header.html';

?>
    <h1>Edit Event</h1>
<?php

if (!empty($success)) {
    echo '<p><strong><em>Success!</em></strong></p>';
}

echo $form->render(new Zend_View());

require __DIR__ . '/../html/footer.html';
