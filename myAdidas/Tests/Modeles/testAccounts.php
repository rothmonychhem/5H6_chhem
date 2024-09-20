<?php

require_once 'Modele/Account.php';

$tstAccount = new Account;
$Accounts = $tstAccount->getAccount(1);
echo '<h3>Test getAccount : </h3>';
var_dump($accounts->rowCount());

$Accounts = $tstAccount->getAccount(1);
echo '<h3>Test getAccount : </h3>';
var_dump($commentaire);