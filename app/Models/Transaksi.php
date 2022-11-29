<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(CategoryCOA::class, 'COA_kode');
    }

    public function master()
    {
        return $this->belongsTo(ChartofAccount::class, 'COA_kode', 'kode');
    }
}
