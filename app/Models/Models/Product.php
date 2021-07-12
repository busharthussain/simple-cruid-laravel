<?php

namespace App\Models\Models;

use Grid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image','price','brand'];
    //    /**
//     * Customer User Data
//     * @param $params
//     * @return array
//    //     */

    public static function getProductData($params)
    {
        $url = asset('productimage/');
        $sql = DB::table('products as p');
        $sql->select('p.name','p.brand', 'p.price','p.id',
            DB::raw("DATE_FORMAT(p.created_at, '%a, %b %d, %Y - %H:%i %p') as created_at")
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
            'name' => [
                'name' => 'name',
                'isDisplay' => true
            ],

            'price' => [
                'name' => 'price',
                'isDisplay' => true,
            ],

            'brand' => [
                'name' => 'brand',
                'isDisplay' => true
            ],

        ];

        return $arrFields;
    }
}
