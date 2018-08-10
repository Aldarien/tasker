<?php
$pconfig = new App\Service\ParisConfig(config('app.databases'));
$pconfig->setUp(config('databases'));
