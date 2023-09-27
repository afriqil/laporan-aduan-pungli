<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;


class ReportUser extends Authenticatable
{
    use HasFactory;

    protected $table = 'reports';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'nik',
        'telp',
        'alamat',
        'gender',
        'name_terlapor',
        'waktu',
        'alamat_pelapor',
        'ktp_terlapor',
        'kronologi',
        'upload',
    ];
}
