<?php

Route::get('/{url}','LinkController@BuscoURL');

Route::get('/',     'LinkController@SemURL');


Route::prefix('portal')->group(function () {
    Route::get('/{id}','PortalController@portalAutoNegociacao');
    Route::get('portalAutoNegociacao/{id}','PortalController@portalAutoNegociacao');
    Route::get('telefone/{id}','PortalController@telefone');
    Route::get('email/{id}','PortalController@email');
    Route::get('sms/{id}','PortalController@sms');
    Route::get('sms','PortalController@sms');
    Route::get('smsSend/{numero}','PortalController@smsSend');
    Route::get('whatsapp/{id}','PortalController@whatsapp');
    Route::post('c2c/{id}','PortalController@c2c');
    
});


Route::prefix('admin')->group(function () {

    Route::prefix('relatorios')->group(function () {
        Route::get('clicks', 'RelatoriosController@clicks');
        Route::get('clicks/{id}', 'RelatoriosController@clicksDetalhes');
    });
    

    Route::prefix('cadastro')->group(function () {
        Route::get('link',  'AdminController@cadastroLink');
        Route::post('link', 'AdminController@SalvarCadastroLink'); 

        Route::get('carteira',  'AdminController@cadastroCarteira');
        Route::post('carteira', 'AdminController@SalvarCadastroCarteira'); 
    });


});
