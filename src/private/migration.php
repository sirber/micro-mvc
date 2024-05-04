<?php

require_once('./bootstrap.php');

use App\Repository\Migration;

echo "Running migrations...\n\n";

$migration = new Migration();
$migration->migrate();

echo "Script completed.";
