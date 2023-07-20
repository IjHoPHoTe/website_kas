<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;
    protected $with = ['Wilayah'];

    protected $fillable = [
        'id_anggota',
        'id_wilayah',
        'id_komisariat',
        'nama',
        'jenis_kelamin',
        'alamat',
        'email',
        'tanggal_lahir'
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'id_wilayah');
    }
    public function komisariat()
    {
        return $this->belongsTo(Komisariat::class, 'id_komisariat');
    }
}