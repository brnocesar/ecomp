<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Validator;
use App\Grupo;

class GrupoController extends BaseController{
    
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:255',
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $grupo = Grupo::create([
            'nome' => $request->nome,
        ]);
        $grupo->save();

        return $this::enviarRespostaSucesso($grupo, 'Grupo criado com sucesso.', 200);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'nome' => 'required|max:255',
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $grupo = Grupo::find($request->id);
        if( !$grupo ){
            return $this::enviarRespostaErro('Grupo não encontrado.', null);
        }

        $grupo->nome = $request->nome;
        $grupo->save();

        return $this::enviarRespostaSucesso($grupo, 'Grupo alterado com sucesso.', 200);
    }

    public function destroy(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Erros de validação.', $validator->errors() );
        }

        $grupo = Grupo::find($request->id);
        if( !$grupo ){
            return $this::enviarRespostaErro('Grupo não encontrado.', null);
        }
        
        $grupo->delete();

        return $this::enviarRespostaSucesso($grupo, 'Grupo deletado com sucesso.', 200);
    }

    public function show(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Erros de validação.', $validator->errors() );
        }

        $grupo = Grupo::find($request->id);
        if( !$grupo ){
            return $this::enviarRespostaErro('Grupo não encontrado.', null);
        }

        return $this::enviarRespostaSucesso($grupo);
    }

    public function index(){
        $grupos = Grupo::all();
        if($grupos->count() > 0){
            return $this::enviarRespostaSucesso($grupos, 'Grupos cadastrados.', 200);
        }

        return enviarRespostaErro('Não há grupos cadastrados.', null);
    }
}
