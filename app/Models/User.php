<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Grid;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'password', 'name', 'shop_name', 'address', 'contact','email', 'confirm_password'


    ];



    public static function getData($params)
    {
        $sql = DB::table('Users as p');
        $sql->select('p.name','p.shop_name','p.contact','p.email', 'p.address'
        );
        if (!empty($params['search'])) {
            $search = '%' . $params['search'] . '%';
            $sql->where('p.first_name', 'like', $search);
        }
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

            'Shop' => [
                'name' => 'shop_name',
                'isDisplay' => true,
            ],

            'Contact' => [
                'name' => 'contact',
                'isDisplay' => true,
            ],

            'Email' => [
                'name' => 'email',
                'isDisplay' => true,
            ],

            'Address' => [
                'name' => 'address',
                'isDisplay' => true
            ],

        ];

        return $arrFields;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function websites(){
        return $this->belongsToMany('App\Models\Website')->withTimestamps()->withPivot('user_id', 'website_id');
    }
}
