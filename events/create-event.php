<?php

require __DIR__ . '/../common.php';

$responseData = $site->request('post', 'pages/events', [
    'event' => [
        "name" => "Test event",
        "status" => "published",
        "start_time" => "2013-05-08T17:00:00-00:00",
        "end_time" => "2013-05-08T19:00:00-00:00"
    ]
]);

require_once __DIR__ . '/../html/header.html';

?>
<h1>Event Created</h1>
<?php
var_dump($responseData);
require_once __DIR__ . '/../html/footer.html';
