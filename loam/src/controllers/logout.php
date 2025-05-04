<?php
session_start();
session_destroy();

require_once(__DIR__ . '/../functions.php');
redirectToUrl('http://localhost/loam/');
?>