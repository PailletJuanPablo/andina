<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MlClient
 * @package App\Models
 * @version April 14, 2020, 7:30 am UTC
 *
 * @property string name
 * @property string last_name
 * @property string country
 * @property string agrup_site
 * @property string site
 * @property string rep
 * @property string unidad
 * @property string legajo
 */
class MlClient extends Model
{
    use SoftDeletes;

    public $table = 'ml_clients';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'last_name',
        'country',
        'agrup_site',
        'site',
        'rep',
        'unidad',
        'legajo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'last_name' => 'string',
        'country' => 'string',
        'agrup_site' => 'string',
        'site' => 'string',
        'rep' => 'string',
        'unidad' => 'string',
        'legajo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
