<?php

require __DIR__ . '/../common.php';

$responseData = $nation->request('post', 'people', [
    'person' => [
        'first_name' => "Foo",
        'last_name' => "Zam"
    ]
]);

require_once __DIR__ . '/../html/header.html';

?>
    <h1>Person Created</h1>
<?php
var_dump($responseData);
require_once __DIR__ . '/../html/footer.html';
