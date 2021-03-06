<?php

defined('DS') ? null : define("DS", DIRECTORY_SEPARATOR);
defined('ROOT') ? null : define("ROOT", dirname(dirname(dirname(dirname(dirname(__FILE__))))));

include ROOT . '/vendor/autoload.php';

$di = \DI\ContainerBuilder::buildDevContainer();
$params = $di->get('\Opoink\Cli\Request\Param');

/**
 * start to execute the command
 */
$result = [
    'error' => 1,
    'message' => '',
    'methods' => [],
    'data' => null
];
try {
    $action = $params->action;
    $nameSpace = $params->nameSpace;
    $object = $di->get($nameSpace);

    if( method_exists($object, 'setDi') ){
        $object->setDi($di);
    }

    if( method_exists($object, $action) ){
        $r = $object->$action();

        if($r){
            $result = $r;
        } else {
            $result['error'] = 0;
        }
    } else {
        $result['message'] = 'Caught exception: Method does not exist.';
        $result['methods'] = get_class_methods($object);
    }
} catch (\Exception $e) {
    $result['message'] = 'Caught exception: ' .  $e->getMessage();
}
echo json_encode($result);
?>