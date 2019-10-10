<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Empresa;
use App\Salario;

class Colaborador extends Model
{
    use SoftDeletes;

    protected $fillable = [ 'nome', 'idade', 'empresa_id' ];

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    protected $table = 'colaboradores';

    public function salario(){
        return $this->hasOne(Salario::class);
    }
}
