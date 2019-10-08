<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Empresa;

class Grupo extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome'];

    public function empresas(){
        return $this->belongsToMany(Empresa::class);
    }
}
