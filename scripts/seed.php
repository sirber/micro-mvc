<?php

require_once(__DIR__ . '/../bootstrap.php');

use App\Repository\Seeding;

echo "Running seeds...\n\n";

$seeding = new Seeding();
$seeding->seed();

echo "Script completed.\n";
