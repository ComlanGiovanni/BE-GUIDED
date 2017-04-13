<?php
require_once 'load.php';
if (Session::getInstance()->hasFlashes()) {
    echo json_encode(['data' => Session::getInstance()->getFlashes()]);
} else {
    echo json_encode(['data' => "no_flash"]);
}