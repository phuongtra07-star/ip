<?php
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Load file .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
