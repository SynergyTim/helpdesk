<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportingModel extends Model
{
    use HasFactory;

    protected $table = "reporting";
    protected $guarded = [];
    public $timestamps = false;
}
