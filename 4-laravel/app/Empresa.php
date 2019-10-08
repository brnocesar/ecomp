<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Grupo;
class Empresa extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome', 'endereco'];

    public function grupos(){
        return $this->belongsToMany(Grupo::class);
    }
}
