<?php

require __DIR__ . '/../common.php';

$site->request('post', 'pages/events', null, [
    'event' => [
        "name" => "Test event",
        "status" => "published",
        "start_time" => "2013-05-08T17:00:00-00:00",
        "end_time" => "2013-05-08T19:00:00-00:00"
    ]
]);
