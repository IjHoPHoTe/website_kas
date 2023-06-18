<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komisariat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_komisariat',
        'id_wilayah',
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'id_wilayah');
    }
    public function murid()
    {
        return $this->hasMany(Murid::class);
    }
}
