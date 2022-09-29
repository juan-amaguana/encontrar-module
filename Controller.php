<?php
namespace Microweber\Encontrar;

require_once('models/MCategory.php');
require_once('models/MCountry.php');
require_once('models/MCategoryFilter.php');
require_once('models/MItem.php');
require_once('models/MItemsCategory.php');
require_once('models/MItemsDetail.php');
// use App\Models\Category;
use Microweber\Encontrar\Models\MCategory;
use Microweber\Encontrar\Models\MCountry;
use Microweber\Encontrar\Models\MCategoryFilter;
use Microweber\Encontrar\Models\MItem;
use Microweber\Encontrar\Models\MItemsCategory;
use Microweber\Encontrar\Models\MItemsDetail;

use Illuminate\Database\Eloquent\Builder;

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

    /**
     * COUNTRIES
     */
    function getCountries(){
 
        $categories = MCountry::get();
        // return compact('categories');
        return $categories;
    }


    /**
     * CATEGORIES FILTER
     */
    function getCategoriesFilter(){
 
        $categories = MCategoryFilter::with('childrenRecursive')->whereNull('parent')->get();
        // return compact('categories');
        return $categories;
    }


    /**
     * ITEMS
     */
    function getItems($request){ //$items = DB::table('items')->whereIn('id', [1, 2, 3])->get();
   
        $items = MItem::whereHas('categories', function (Builder $query) {
            $query->whereHas('category', function (Builder $query2) {
                $query2->where('status', 1);
            });
        })
        ->with(array('categories' => function ($query) {
            $query->with('category');
        }))
        ->with(array('details' => function ($query) {
            /*if (isset($request["viewcard"])){
                $query->where('viewcard', 1);
            }*/
        }))
        ->with('country');

        if (isset($request["country_ids"])){
            $items->whereIn("country_id", $request["country_ids"]);
        }

        return $items->get();
    }
     
}