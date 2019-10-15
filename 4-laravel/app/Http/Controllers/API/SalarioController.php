<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Salario;
use App\Colaborador;

class SalarioController extends BaseController
{
    public function store(Request $request){
        $validator = Validator::make( $request->all(), [
            'colaborador_id' => 'required|max:255',
            'valor' => 'required|integer'
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $colaborador = Colaborador::find($request->colaborador_id);
        if( !$colaborador ){
            return $this::enviarRespostaErro( 'Colaborador não encontrado.', $validator->errors() );
        }

        $salario = new Salario;
        $salario->valor = $request->valor;
        $colaborador->salario()->save($salario);

        return $this::enviarRespostaSucesso($salario, 'Salário criado com sucesso.', 200);
    }

    public function update(Request $request){
        $validator = Validator::make( $request->all(), [
            'colaborador_id' => 'required|max:255',
            'valor' => 'required|integer'
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $colaborador = Colaborador::find($request->colaborador_id);
        $salario = Salario::where('colaborador_id', $request->colaborador_id)->first();
        if( !$colaborador or !$salario ){
            return $this::enviarRespostaErro( 'Colaborador ou salário não encontrados.', $validator->errors() );
        }

        $salario->colaborador()->associate($colaborador);
        $salario->valor = $request->valor;
        $salario->save();

        return $this::enviarRespostaSucesso($colaborador->salario, 'Salario atualizado com sucesso.', 200);
    }

    public function destroy(Request $request){
        $validator = Validator::make( $request->all(), [
            'colaborador_id' => 'required|max:255'
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro( 'Campo incorreto.', $validator->errors() );
        }

        $colaborador = Colaborador::find($request->colaborador_id);
        $salario = Salario::where('colaborador_id', $request->colaborador_id)->first();
        if( !$colaborador or !$salario ){
            return $this::enviarRespostaErro( 'Colaborador ou salário não encontrados.', $validator->errors() );
        }

        $salario->delete();

        return $this::enviarRespostaSucesso($salario, 'Salário deletado com sucesso.', 200);
    }

    public function removeColaborador(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'colaborador_id' => 'required|integer'
        ]);

        if($validator->fails()){
            return $this::enviarRespostaErro('Campo incorreto.', $validator->errors());
        }

        $colaborador = Colaborador::find($request->colaborador_id);
        $salario = Salario::where('colaborador_id', $request->colaborador_id)->first();
        if(!$colaborador || !$salario){
            return $this::enviarRespostaErro('Colaborador ou salário não encontrados.', null);
        }

        $salario->colaborador()->dissociate($colaborador);

        return $this::enviarRespostaSucesso($salario, 'Salário não está mais relacionado ao colaborador.', 200);
    }

    public function show(Request $request){
        $validator = Validator::make($request->all(), [
            'colaborador_id' => 'required|integer'
        ]);

        if( $validator->fails() ){
            return $this::enviarRespostaErro('Campo incorreto.', $validator->errors());
        }

        $colaborador = Colaborador::find($request->colaborador_id);
        $salario = Salario::where('colaborador_id', $request->colaborador_id)->first();
        if( !$colaborador or !$salario ){
            return $this::enviarRespostaErro('Colaborador ou salário não encontrados.', null);
        }

        return $this::enviarRespostaSucesso($colaborador->salario, 200);
    }

    public function index(Request $request){

    }
}
