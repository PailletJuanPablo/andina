<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version November 14, 2019, 3:39 am UTC
 *
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string|\Carbon\Carbon email_verified_at
 * @property string password
 * @property integer dni
 * @property string remember_token
 * @property integer role_id
 * @property integer organization
 * @property integer company_id
 * @property integer registration_status_id
 * @property string identificator
 */
class User extends Model
{
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'password',
        'dni',
        'remember_token',
        'role_id',
        'organization',
        'company_id',
        'registration_status_id',
        'identificator'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'dni' => 'integer',
        'remember_token' => 'string',
        'role_id' => 'integer',
        'organization' => 'integer',
        'company_id' => 'integer',
        'registration_status_id' => 'integer',
        'identificator' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
     /*   'password' => 'required',
        'email'=> 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'role_id' => 'required'*/
    ];

    public static $editingRules = [
        /*'email'=> 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'role_id' => 'required'*/
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
