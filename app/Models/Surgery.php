<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SurgeryType;

class Surgery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color'
    ];

    public function types()
    {
        return $this->hasMany(SurgeryType::class);
    }
}
