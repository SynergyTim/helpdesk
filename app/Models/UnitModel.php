<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnitModel extends Model
{
    use HasFactory;

    protected $table = 'units';
    protected $guarded = [];
    public $timestamps = false;
}
