<?php
namespace Microweber\Encontrar;

require_once('MCategory.php');
// use App\Models\Category;
use Microweber\Encontrar\MCategory;

class Controller
{
    function getAllCategories() {
        return MCategory::all();
    }

    function getTreeCategories(){
        return MCategory::with('children')->whereNull('parent')->get();
    }
}