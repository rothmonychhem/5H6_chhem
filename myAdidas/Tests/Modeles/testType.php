<?php

require_once 'Modele/Type.php';

echo '<h3>Test searchType(\'an\') : </h3>';
$tstType = new Type;
$types = $tstType->searchType('an');
var_dump($types);
