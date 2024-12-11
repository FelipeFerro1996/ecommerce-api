<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PagamentosController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){

    Route::apiResource('clientes', ClientesController::class);
    Route::apiResource('produtos', ProdutosController::class);
    Route::apiResource('pedidos', PedidosController::class);
    
    Route::patch('pedidos/{pedido}/status', [PedidosController::class, 'updateStatus']);
    
    Route::post('pagamentos', [PagamentosController::class, 'store']);

});

Route::post('/login', function(Request $request){

    $credentials = $request->only(['email', 'password']);

    if(Auth::attempt($credentials) === false){
        return response()->json('Unauthorized', 401);
    }

    $user = Auth::user();
    $token = $user->createToken('token');
    return response()->json($token->plainTextToken);

});

