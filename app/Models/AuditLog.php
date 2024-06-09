<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'description',
        'table_name',
        'old_values',
        'new_values',
        'user',
        'user_id'
    ];
}