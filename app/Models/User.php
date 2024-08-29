<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Http;
use Sparrow;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    public function branch(){
        return $this->hasMany(Branch::class);
    }

    public function department(){
        return $this->hasMany(Department::class);
    }
    public function designation(){
        return $this->hasMany(Designation::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'number',
        'random_number',
        'number_verified_code',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'number_verified_at' => 'datetime',
    ];

    protected static function booted()
{
    static::creating(function ($user) {
        $opt_code = rand(11111, 99999);
        $user->number_verified_code = $opt_code;
       
    // Sparrow API HTTP client
    $response = Http::post('https://api.sparrowsms.com/v2/sms', [
        'token' => 'v2_VBVeVE6WkskKT7FiQhCa78tCCJM.3PVy',
        'from' => 'TheAlert',
        'to' => $user->number,
        'text' => 'Your otp verification code is: '.$opt_code,
    ]);
});
}
}

