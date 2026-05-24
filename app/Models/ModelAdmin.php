<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ModelAdmin extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'nathala_admin';

    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'admin_nama',
        'admin_username',
        'admin_email',
        'admin_password',
        'admin_foto',
        'admin_phone',
        'admin_role',
        'admin_is_active',
        'admin_last_login',
    ];

    protected $hidden = [
        'admin_password',
        'remember_token',
    ];

    protected $casts = [
        'admin_is_active' => 'boolean',
        'admin_last_login' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->admin_password;
    }
}