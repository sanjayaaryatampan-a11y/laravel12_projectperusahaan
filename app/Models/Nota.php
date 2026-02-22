<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = ['no_nota', 'tanggal', 'total_jumlah'];

    public function detailNotas()
    {
        return $this->hasMany(DetailNota::class);
    }
}
