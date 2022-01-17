<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','first_name','last_name','contact','address','length','shoulder','neck','chest',
        'waist','hip','gheera_gool','gheera_choras','arm','moda','kaff','kaff_width','arm_gool','arm_moori','collar','bean',
        'shalwar_length','shalwar_gheera','shalwar_paincha','pocket_front','pocket_side','pocket_shalwar','pent_length',
        'pent_waist','pent_hip','pent_paincha','single_salai','double_salai','triple_salai','design','book_no','design_no',
        'note','price'];
}
