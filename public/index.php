<?php

require_once '../src/Support/helpers.php';
require_once base_view() . 'vendor/autoload.php';
require_once base_view() . 'Routes/web.php';

session_start();

app()->run();