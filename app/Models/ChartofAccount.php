<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartofAccount extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function categoryCOA()
    {
        return $this->belongsTo(CategoryCOA::class, 'kategori');
    }
}
