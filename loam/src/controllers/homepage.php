<?php
session_start();
require_once(__DIR__ . '/../mysql.php');
require_once(__DIR__ . '/../databaseconnect.php');
require_once(__DIR__ . '/../functions.php');


function homepage() {
    require('templates/homepage.php');
}


