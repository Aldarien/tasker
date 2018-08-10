<?php
include_once dirname(__DIR__) . '/bootstrap/public.php';

include_once config('locations.routes') . '/public.php';
$app->run();
