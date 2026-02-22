<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailNota extends Model
{
    protected $fillable = ['nota_id', 'barang_id', 'jumlah', 'subtotal'];

    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
