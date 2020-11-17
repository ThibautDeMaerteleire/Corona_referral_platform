<?php

CONST DB_NAME = "corona_referral_platform";
CONST DB_HOST = "127.0.0.1";
CONST DB_PORT = "3306";
CONST DB_USER = 'root';
CONST DB_PWD = 'root';
CONST EMAIL = 'info@covidreferralplatform.be';

$DB_DSN = "mysql:dbname=".DB_NAME.";host=".DB_HOST.";port=".DB_PORT;

//open DB
$db = new PDO($DB_DSN, DB_USER, DB_PWD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);