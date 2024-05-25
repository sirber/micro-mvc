<?php

require_once(__DIR__ . '/../bootstrap.php');

use App\Repository\Seeding;

echo "Running seeds...\n\n";

$migration = new Seeding();
$migration->seed();

echo "Script completed.\n";
