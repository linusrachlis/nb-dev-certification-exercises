<?php

require __DIR__ . '/../common.php';

$personId = empty($_GET['id']) ? null : $_GET['id'];
if (empty($personId) || !is_numeric($personId)) {
    die("Invalid person ID: " . var_export($personId, true) . ". Expected e.g. <em>?id=123</em>");
}

$nation->request('delete', "people/$personId");

require_once __DIR__ . '/../html/header.html';

?>
    <h1>Person Deleted</h1>
<?php
require_once __DIR__ . '/../html/footer.html';
