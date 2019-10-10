<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Validator;
use App\Colaborador;
use App\Empresa;

class ColaboradorController extends BaseController
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'empresa_id' => 'required|integer',
            'nome' => 'required|max:255',
            'idade' => 'required|integer'
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $empresa = Empresa::find($request->empresa_id);
        if( !$empresa ){
            return $this::enviarRespostaErro( 'Empresa não encontrada.', $validator->errors() );
        }

        $colaborador = Colaborador::create([
            'nome' => $request->nome,
            'idade' => $request->idade
        ]);

        $empresa = $empresa->colaboradores()->save($colaborador);

        return $this::enviarRespostaSucesso($colaborador, 'Colaborador criado com sucesso.', 200);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'idade' => 'required|integer',
            'colaborador_id' => 'required|integer',
            'empresa_id' => 'required|integer'
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $colaborador = Colaborador::find($request->colaborador_id);
        $empresa = Empresa::find($request->empresa_id);
        if( !$colaborador or !$empresa ){
            return $this::enviarRespostaErro( 'Colaborador ou Empresa não encontrados.', $validator->errors() );
        }

        $colaborador->empresa()->associate($empresa);
        $colaborador->nome = $request->nome;
        $colaborador->idade = $request->idade;
        $colaborador->save();

        return $this::enviarRespostaSucesso($colaborador, 'Colaborador atualizado com sucesso.', 200);
    }

    public function destroy(Request $request){
        $validator = Validator::make($request->all(), [
            'colaborador_id' => 'required|integer',
            'empresa_id' => 'required|integer',
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Erros de validação.', $validator->errors() );
        }

        $colaborador = Colaborador::find($request->colaborador_id);
        $empresa = Empresa::find($request->empresa_id);
        if( !$colaborador or !$empresa ){
            return $this::enviarRespostaErro( 'Colaborador ou Empresa não encontrados.', $validator->errors() );
        }

        $colaborador->delete();

        return $this::enviarRespostaSucesso($colaborador, 'Colaborador deletado com sucesso.', 200);
    }

    public function removeEmpresa(Request $request){
        $validator = Validator::make($request->all(), [
            'empresa_id' => 'required|integer',
            'colaborador_id' => 'required|integer',
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $colaborador = Colaborador::find($request->colaborador_id);
        $empresa = Empresa::find($request->empresa_id);
        if( !$colaborador or !$empresa ){
            return $this::enviarRespostaErro( 'Colaborador ou Empresa não encontrados.', $validator->errors() );
        }

        $colaborador->empresas()->detach($empresa);
        return $this::enviarRespostaSucesso($empresa, 'Empresa não está mais relacionado ao colaborador.', 200);
    }

    public function show(Request $request){
        $validator = Validator::make($request->all(), [
            'empresa_id' => 'required|integer',
            'colaborador_id' => 'required|integer',
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $colaborador = Colaborador::find($request->colaborador_id);
        $empresa = Empresa::find($request->empresa_id);
        if( !$colaborador or !$empresa ){
            return $this::enviarRespostaErro( 'Colaborador ou Empresa não encontrados.', $validator->errors() );
        }

        return $this::enviarRespostaSucesso($colaborador);
    }

    public function index(Request $request){
        $validator = Validator::make($request->all(), [
            'empresa_id' => 'required|integer',
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $empresa = Empresa::find($request->empresa_id);
        if( !$empresa ){
            return $this::enviarRespostaErro( 'Colaborador ou Empresa não encontrados.', $validator->errors() );
        }

        if( $empresa->colaboradores->count() > 0 ){
            return $this::enviarRespostaErro($empresa->colaboradores, 200);
        }
        return $this::enviarRespostaErro('Não há colaboradores cadastrados.');
    }
}
