<?php

$GLOBALS['__nova_app_start__'] = microtime(true);
$GLOBALS['__nova_app_config__'] =  include "../src/config.php";
$GLOBALS['__nova_session_id__'] = uniqid('session_', true);
include "../src/nova/framework/constants.php";