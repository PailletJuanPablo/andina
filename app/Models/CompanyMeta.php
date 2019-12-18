<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompanyMeta
 * @package App\Models
 * @version November 14, 2019, 3:40 am UTC
 *
 * @property string title
 * @property string description
 * @property integer user_id
 * @property integer company_id
 */
class CompanyMeta extends Model
{
    use SoftDeletes;

    public $table = 'company_meta';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'description',
        'user_id',
        'company_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'user_id' => 'integer',
        'company_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function cobranzas() {
        return $this->hasMany('App\Models\Cobranza', 'ceco_id');
    }

    
}
