<?php
require_once('Controller.php');


api_expose('get_enc_categories');
function get_enc_categories($params=array())
{
    $controller = new Microweber\Encontrar\Controller();
    return response()->json($controller->getTreeCategories($params));
    // $params['table'] = "enc_categories";
    // return db_get($params);
}

/**
 * TYPES
 */
api_expose('get_enc_types');
function get_enc_types($params=array())
{
    $controller = new Microweber\Encontrar\Controller();
    return response()->json($controller->getTypes($params));
}

/**
 * CATEGORIES
 */
api_expose('save_enc_categories');
function save_enc_categories($params=array())
{
    $controller = new Microweber\Encontrar\Controller();
    return response()->json($controller->saveParentCategory($params));
}

/**
 * COUNTRIES
 */
api_expose('get_enc_countries');
function get_enc_countries($params=array())
{
    $controller = new Microweber\Encontrar\Controller();
    return response()->json($controller->getCountries($params));
}


/**
 * CATEGORIES FILTER
 */
api_expose('get_enc_filter_categories');
function get_enc_filter_categories($params=array())
{
    $controller = new Microweber\Encontrar\Controller();
    return response()->json($controller->getCategoriesFilter());
}


/**
 * ITEMS
 */
api_expose('get_enc_items');
function get_enc_items($params=array())
{
    $controller = new Microweber\Encontrar\Controller();
    return response()->json($controller->getItems($params));
}

api_expose('get_enc_items_by_id');
function get_enc_items_by_id($params=array())
{
    // print_r($params['itemId']) ;
    $controller = new Microweber\Encontrar\Controller();
    return response()->json($controller->getItemById($params));
}