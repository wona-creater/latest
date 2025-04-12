<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function investmentPlans()
    {
        return $this->hasMany(InvestmentPlan::class, 'created_by');
    }

    public function investments()
    {
        return $this->hasMany(Investment::class, 'user_id');
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class, 'user_id');
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class, 'user_id');
    }

    public function cryptoAddresses()
    {
        return $this->hasMany(CryptoAddress::class, 'user_id');
    }


    public function loans() {
        return $this->hasMany(Loan::class, 'user_id');
    }

    public function courses() {
        return $this->hasMany(Course::class, 'user_id' );
    }
    public function courseHistories() {
        return $this->hasMany(CourseHistory::class, 'user_id' );
    }

    public function signals() {
        return $this->hasMany(Signal::class, 'user_id' );
    }
}
