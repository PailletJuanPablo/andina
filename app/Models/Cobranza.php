<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cobranza
 * @package App\Models
 * @version November 14, 2019, 3:40 am UTC
 *
 * @property string|\Carbon\Carbon operation_date
 * @property string destination_dni
 * @property string sign
 * @property number ammount
 * @property integer user_id
 * @property integer company_id
 * @property integer employee_id
 * @property string name
 * @property string origin
 * @property string destination
 * @property integer ceco_id
 */
class Cobranza extends Model
{
    use SoftDeletes;

    public $table = 'cobranzas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'operation_date',
        'destination_dni',
        'sign',
        'ammount',
        'user_id',
        'company_id',
        'employee_id',
        'name',
        'origin',
        'destination',
        'ceco_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'operation_date' => 'datetime',
        'destination_dni' => 'string',
        'sign' => 'string',
        'ammount' => 'float',
        'user_id' => 'integer',
        'company_id' => 'integer',
        'employee_id' => 'integer',
        'name' => 'string',
        'origin' => 'string',
        'destination' => 'string',
        'ceco_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'operation_date' => 'required',
        'destination_dni' => 'required',
        'sign' => 'required',
        'ammount' => 'required'
    ];

    public function responsable() {
        return $this->belongsTo('App\User', 'employee_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function ceco() {
        return $this->belongsTo('App\Models\CompanyMeta', 'ceco_id');
    }

    public function formatted()  {
        return $this->operation_date->format('d-m-Y H:i');
    }


    
}
