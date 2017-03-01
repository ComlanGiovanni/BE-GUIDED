<?php
spl_autoload_register('autoloader');

function autoloader($class)
{
    require_once "class/$class.php";
}