<?php
require_once('src/controllers/homepage.php');

if (isset($_GET['action']) && $_GET['action'] !== '') {
} else {
    homepage();
}
