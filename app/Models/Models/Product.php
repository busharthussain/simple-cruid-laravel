<?php

namespace App\Models\Models;

use Grid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'product_image','product_price','product_brand'];
    //    /**
//     * Customer User Data
//     * @param $params
//     * @return array
//    //     */

    public static function getProductData($params)
    {
        $url = asset('productimage/');
        $sql = DB::table('products as p');
        $sql->select('p.product_name','p.product_brand', 'p.product_price','p.id',
            DB::raw("DATE_FORMAT(p.created_at, '%a, %b %d, %Y - %H:%i %p') as created_at"),
            DB::raw("CONCAT('$url', '/' , product_image) as image")
        );
        // search filters
        if (!empty($params['dropDownFilters'])) {
            $alias = 'p';
            foreach ($params['dropDownFilters'] as $filterKey => $filter) {
                if (!empty($filterKey) && $filter != null) {
                    $sql->where($alias . '.' . $filterKey, '=', $filter);
                }
            }
        }
        if (!empty($params['search'])) {
            $search = '%' . $params['search'] . '%';
            $sql->where('p.first_name', 'like', $search);
        }
        $sql->orderBy('p.created_at', 'desc');
        $grid = [];
        $grid['query'] = $sql;
        $grid['perPage'] = $params['perPage'];
        $grid['page'] = $params['page'];
        $grid['gridFields'] = self::gridFieldsProduct();

        return Grid::runSql($grid);
    }

    public static function gridFieldsProduct()
    {

        $arrFields = [
//            'id' => [
//                'name' => 'id',
//                'isDisplay' => true
//            ],
            'product_name' => [
                'name' => 'product_name',
                'isDisplay' => true
            ],
            'image' => [
                'name' => 'image',
                'isDisplay' => true,
            ],
//
            'product_price' => [
                'name' => 'product_price',
                'isDisplay' => true,
            ],
            'product_brand' => [
                'name' => 'product_brand',
                'isDisplay' => true
            ],


        ];

        return $arrFields;
    }
}
