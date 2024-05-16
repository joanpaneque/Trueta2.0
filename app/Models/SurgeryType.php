<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Surgery;
use App\Models\HealthFlag;

class SurgeryType extends Model
{
    use HasFactory;

    protected $fillable = [
        'surgery_id',
        'name',
        'prophylaxis'
    ];

    public function surgery()
    {
        return $this->belongsTo(Surgery::class);
    }

    public function healthFlags()
    {
        return $this->hasMany(HealthFlag::class);
    }
}
