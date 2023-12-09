<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateBlock extends Model
{
    protected $fillable = [
        'assigned_subject',
        'aysem',
        'slot'
    ];
}
