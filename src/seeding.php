<?php

require_once('./bootstrap.php');

use App\Repository\Seeding;

echo "Running seeds...\n\n";

$migration = new Seeding();
$migration->seed();

echo "Script completed.";
