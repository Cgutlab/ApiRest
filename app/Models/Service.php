<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subscription;

class Service extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'services';
    protected $fillable = [
        'name', 'image', 'status'
    ];

    protected static function boot()
    {
        // Cascading logical delete...
        parent::boot();
        static::deleting(function ($model) {
            $var = Subscription::where('service_id', $model->id)->get();
            $var->each(function ($item) {
                $item->delete();
            });
        });
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'service_id', 'id');
    }
}
