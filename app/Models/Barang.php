<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = "barangs";
    protected $fillable = ["jenis_id", "kondisi_id", "keterangan", "kecacatan", "jumlah", "gambar"];

    public function jenis(){
        return $this->belongsTo(Jenis::class);
    }

    public function kondisi(){
        return $this->belongsTo(Kondisi::class);
    }
}
