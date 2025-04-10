<?php

namespace App\Http\ServiciosExternos;

use \GuzzleHttp\Client;

class ServicioValidacion
{
    public static function evaluarPredio($pred_temperatura, $pred_ph) {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:3000/webService',
                 [
                     'form_params' => [
                         'pred_temperatura' => $pred_temperatura,
                         'pred_ph' => $pred_ph
                     ]
                 ]
         );
         return filter_var($response->getBody(), FILTER_VALIDATE_BOOLEAN);
     }
}
