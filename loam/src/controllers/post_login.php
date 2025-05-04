<?php
session_start();
require_once(__DIR__ . '/../mysql.php');
require_once(__DIR__ . '/../databaseconnect.php');
require_once(__DIR__ . '/../functions.php');
$postdata = $_POST;

$loginStatement = $mysqlClient->prepare('SELECT * FROM users');
$loginStatement->execute();
$users = $loginStatement->fetchAll();

if(isset($postdata['email']) && isset($postdata['password'])) 
{
    foreach($users as $user) :
        if($postdata['email'] == $user['email'] && $postdata['password'] == $user['password'])
        {
            $_SESSION['LOGGED_USER'] = $user;
            redirectToUrl('http://localhost/loam/');
        }
    endforeach;

    $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Vos identifiants sont incorrects.';
}

redirectToUrl('http://localhost/loam/');

