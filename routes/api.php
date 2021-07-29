<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
O nosso desafio, para que possamos avaliar suas habilidades e competências
para a função, você terá que desenvolver uma api para um sistema de mercado
que permita o cadastro dos produtos, dos tipos de cada produto, dos valores
percentuais de imposto dos tipos de produtos, uma rota de consulta, onde será
informado os produtos e quantidades adquiridos, o sistema deve apresentar o
valor de cada item multiplicado pela quantidade adquirida e a quantidade pago
de imposto em cada item, um totalizador do valor da compra e um totalizador do
valor dos impostos.

*Disponibilizar o seu desafio em algum respositório do git e nos enviar ao
finaliza-lo.

*Disponibilizar o dump do seu banco para avaliação ou utilizar as migrations do
laravel.


O sistema deve ser desenvolvido utilizando as seguintes tecnologias:
• PHP/Laravel
• Banco de dados Mysql

Quaisquer dúvidas sobre a especificação do programa a ser desenvolvido,
podem ser questionadas.
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/product')->group(function () {
    Route::post('/create', 'ProductsController@create');
    Route::post('/query', "ProductsController@query");
});
