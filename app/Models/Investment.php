<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    //
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
     
    ];
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function plan()
    {
        return $this->belongsTo(InvestmentPlan::class, 'plan_id');
    }
}
