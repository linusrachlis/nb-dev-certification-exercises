<?php

use library\nationbuilder\Nation;
use library\nationbuilder\Site;

$nationSlug = getenv('NB_SLUG');
$apiKey = getenv('NB_API_KEY');
$siteSlug = getenv('NB_SITE_SLUG');

require_once __DIR__ . '/vendor/autoload.php';

$nation = new Nation($nationSlug, $apiKey);
$site = new Site($nation, $siteSlug);
