<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = 'wilayah';
    protected $fillable = [
        'nama_wilayah',
    ];

    public function murid()
    {
        return $this->hasMany(Murid::class, 'id_wilayah');
    }
    public function komisariat()
    {
        return $this->hasMany(Komisariat::class, 'id_komisariat');
    }
}

