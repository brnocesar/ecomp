<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Validator;
use App\Empresa;
use App\Grupo;

class EmpresaController extends BaseController
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'grupo_id' => 'required|integer',
            'nome' => 'required|max:255',
            'endereco' => 'required|max:255'
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $empresa = Empresa::create([
            'nome' => $request->nome,
            'endereco' => $request->endereco
        ]);

        $grupo = Grupo::find($request->grupo_id);
        if( !$grupo ){
            // return $this::enviarRespostaErro( 'Grupo não encontrado.', $validator->errors() );
            return $this::enviarRespostaErro( 'Grupo não encontrado.', null );
        }

        $empresa->save();
        $empresa->grupos()->attach($grupo);

        return $this::enviarRespostaSucesso($empresa, 'Empresa criada com sucesso.', 200);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'grupo_id' => 'required|integer',
            'id' => 'required|integer',
            'nome' => 'required|max:255',
            // 'endereco' => 'optional|max:255'
            'endereco' => 'required|max:255'
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $grupo = Grupo::find($request->grupo_id);
        if( !$grupo ){
            return $this::enviarRespostaErro('Grupo não encontrado.', null);
        }

        $empresa = Empresa::find($request->id);
        if( !$empresa ){
            return $this::enviarRespostaErro('Empresa não encontrada.', null);
        }

        $empresa->nome = $request->nome;
        $empresa->endereco = $request->endereco ? $request->endereco : $empresa->endereco;
        $empresa->save();

        return $this::enviarRespostaSucesso($empresa, 'Empresa alterada com sucesso.', 200);
    }

    public function destroy(Request $request){
        $validator = Validator::make($request->all(), [
            'grupo_id' => 'required|integer',
            'id' => 'required|integer',
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $grupo = Grupo::find($request->grupo_id);
        if( !$grupo ){
            return $this::enviarRespostaErro('Grupo não encontrado.', null);
        }

        $empresa = Empresa::find($request->id);
        if( !$empresa ){
            return $this::enviarRespostaErro('Empresa não encontrada.', null);
        }

        $empresa->delete();

        return $this::enviarRespostaSucesso($empresa, 'Grupo deletado com sucesso.', 200);
    }

    public function removeGrupo(Request $request){
        $validator = Validator::make($request->all(), [
            'grupo_id' => 'required|integer',
            'empresa_id' => 'required|integer',
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $empresa = Empresa::find($request->empresa_id);
        $grupo = Grupo::find($request->grupo_id);
        if( !$empresa || !$grupo ){
            return $this::enviarRespostaErro('Empresa ou grupo não encontrados.', null);
        }

        $empresa->grupos()->detach($grupo);
        return $this::enviarRespostaSucesso($empresa, 'Grupo não está mais relacionado à empresa.', 200);
    }

    public function show(Request $request){
        $validator = Validator::make($request->all(), [
            'grupo_id' => 'required|integer',
            'id' => 'required|integer',
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $empresa = Empresa::find($request->id);
        $grupo = Grupo::find($request->grupo_id);
        if( !$empresa || !$grupo ){
            return $this::enviarRespostaErro('Empresa ou grupo não encontrados.', null);
        }

        return $this::enviarRespostaSucesso($empresa);
    }

    public function index(Request $request){
        $validator = Validator::make($request->all(), [
            'grupo_id' => 'required|integer',
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $grupo = Grupo::find($request->grupo_id);
        if( !$grupo ){
            return $this::enviarRespostaErro('Grupo não encontrado.', null);
        }

        if( $grupo->empresas->count() > 0 ){
            return $this::enviarRespostaErro($grupo->empresas, 200);
        }
        return $this::enviarRespostaErro('Não há empresas cadastradas.');
    }
}
