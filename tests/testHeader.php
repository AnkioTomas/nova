<?php

$GLOBALS['__nova_app_start__'] = microtime(true);
$GLOBALS['__nova_app_config__'] =  include "../src/config.php";
$GLOBALS['__nova_session_id__'] = uniqid('session_', true);
include "../src/nova/framework/constants.php";
function checkObject($obj1, $obj2)
{
    foreach (get_object_vars($obj1) as $key => $value) {
        try {
            assert($obj1->$key == $obj2->$key);
        }catch (AssertionError $e){
            echo "Error: obj1->$key: ".print_r($value,true)." != obj2->$key: " . print_r($obj2->$key ,true). "\n";
        }
    }
}