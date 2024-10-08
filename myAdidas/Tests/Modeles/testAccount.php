<?php

require_once 'Modele/Account.php';

$tstAccount = new Account;
$Accounts = $tstAccount->getAccountByEmail("john.doe@example.com");
echo '<h3>Test getAccount : </h3>';
var_dump($accounts->rowCount());
