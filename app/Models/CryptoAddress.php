<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptoAddress extends Model
{
    //
    protected $guarded = [];

    protected $table = 'cryptoaddresses';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
