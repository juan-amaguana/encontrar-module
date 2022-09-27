<?php
require_once('Controller.php');


api_expose('get_enc_categories');
function get_enc_categories($params=array())
{
    $controller = new Microweber\Encontrar\Controller();
    return response()->json($controller->getTreeCategories());
    // $params['table'] = "enc_categories";
    // return db_get($params);
}