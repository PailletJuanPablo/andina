<?php

namespace App;

use App\Models\Cobranza;
use App\Models\CompanyMeta;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
     //   'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCecos()
    {
        if ($this->role_id == 6) {
            $cecos = CompanyMeta::get();
        } else {
            $cecos = CompanyMeta::where('user_id', $this->id)->get();
        }
        return $cecos;
    }

    public function getCobranzas()
    {
        return Cobranza::where('employee_id', $this->id)->get();
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function getLasts()
    {
        $cobranzas = Cobranza::where('employee_id', $this->id)->orderBy('operation_date', 'DESC')->limit(10)->get();
        return $cobranzas;
    }
}
