<?php
namespace Microweber\Encontrar;

require_once('models/MCategory.php');
// use App\Models\Category;
use Microweber\Encontrar\Models\MCategory;

class Controller
{
    function getAllCategories() {
        return MCategory::all();
    }

    function getTreeCategories(){
        return MCategory::with('children')->whereNull('parent')->get();
    }

    public function saveParentCategory($request)
    {
        try {
            $categoria = new MCategory();
            $categoria->name = $request["name"];
            $categoria->parent = isset($request["parent"]) ? $request["parent"]: null;
            $categoria->type = $request["type"];
            $categoria->position = $request["position"];
            $categoria->status = 1;
            $categoria->save();
            return $categoria;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}