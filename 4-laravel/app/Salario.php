<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salario extends Model
{
    use SoftDeletes;

    protected $fillable = ['valor', 'colaborador_id'];

    public function colaborador(){
        return $this->belongsTo(Colaborador::class);
    }
}
