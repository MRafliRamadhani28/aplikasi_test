<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCOA extends Model
{
    use HasFactory;

    protected $table = 'category_c_o_a_s';
    protected $guarded = ['id'];

    public function chartofaccount()
    {
        return $this->hasMany(ChartofAccount::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
