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

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    // Relasi ke unit
    public function unit()
    {
        return $this->belongsTo(UnitModel::class, 'unit_id');
    }
}
