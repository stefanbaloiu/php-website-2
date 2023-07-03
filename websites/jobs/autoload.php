<?php
function autoload($name) {
    $string = str_replace('\\', '/', $name);
    require "../". $string .".php";
}
spl_autoload_register('autoload');
?>