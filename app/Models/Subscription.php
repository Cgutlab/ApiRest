<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use Carbon\Carbon;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'subscriptions';
    protected $fillable = [
        'client', 'date', 'approved', 'services_id' 
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::parse($date)->format('Y-m-d');
    }
}
