<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Empresa;

class Colaborador extends Model
{
    use SoftDeletes;

    protected $fillable = [ 'nome', 'idade', 'empresa_id' ];

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    protected $table = 'colaboradores';
}
