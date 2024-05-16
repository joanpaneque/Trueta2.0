<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SurgeryType;

class HealthFlag extends Model
{
    use HasFactory;

    protected $fillable = [
        'surgery_type_id',
        'name',
        'description'
    ];

    public function surgeryType()
    {
        return $this->belongsTo(SurgeryType::class);
    }
}
