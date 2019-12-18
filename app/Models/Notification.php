<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Notification
 * @package App\Models
 * @version November 14, 2019, 3:41 am UTC
 *
 * @property integer user_id
 * @property string title
 * @property string content
 * @property string image
 * @property integer type
 * @property string segment
 * @property integer document_id
 * @property string role
 */
class Notification extends Model
{
    use SoftDeletes;

    public $table = 'notifications';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'title',
        'content',
        'image',
        'type',
        'segment',
        'document_id',
        'role'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'title' => 'string',
        'content' => 'string',
        'image' => 'string',
        'type' => 'integer',
        'segment' => 'string',
        'document_id' => 'integer',
        'role' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
