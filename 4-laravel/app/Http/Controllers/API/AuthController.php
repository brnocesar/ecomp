<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Validator;
use App\Usuario;

class AuthController extends BaseController{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        if( $validator->fails() ){
            return $this->enviarRespostaErro('Erro de validação.', $validator->errors());
        }

        if ( auth()->attempt(['email' => $request->email, 'senha' => $request->senha]) ) {
            $usuario = auth()->user();
            // $usuario = auth()->usuario();
            if ( $usuario->token() == '' ) {
                $token = $usuario->createToken('web')->accessToken;
            }
            else {
                $token = $usuario->token();
            }

            return $this->enviarRespostaSucesso(['usuario' => $usuario, 'Authorization' => $token ]);
        }

        return $this->enviarRespostaErro('Credenciais inválidas', null, 401);
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function registro(Request $request){
        $validator = Validator::make($request->all(), [
            'nome'  => 'required|max:255',
            'email' => 'required|email|max:255|unique:usuarios',
            'senha' => 'required|min:6|confirmed',
        ]);

        if( $validator->fails() ){
            return $this->enviarRespostaErro('Erro de validação.', $validator->errors(), 400);
        }

        $input = $request->all();
        $input['senha'] = bcrypt($input['senha']);
        $usuario = Usuario::create( $input );
        $dadosResposta['token'] = $usuario->createToken('web')->accessToken;
        $dadosResposta['usuario'] = $usuario;
        return $this->enviarRespostaSucesso($dadosResposta, 'Usuário registrado com sucesso.', 201);
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        return $this->enviarRespostaSucesso(null, 'Usuário fez logout.', 200);
    }

}
