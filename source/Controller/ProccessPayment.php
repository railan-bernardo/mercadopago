<?php

namespace Source\Controller;

use \MercadoPago;

class ProccessPayment {

    // metodo responsavel pelo processamento do pagmento e retorna o status do pagamento
    public function proccess($data)
    {

            MercadoPago\SDK::setAccessToken(MERCADO_PAGO_TOKEN);

        
            $payment = new MercadoPago\Payment();
            $payment->transaction_amount = (float)$data->transaction_amount;
            $payment->token = $data->token;
            $payment->description = $data->description;
            $payment->installments = (int)$data->installments;
            $payment->payment_method_id = $data->payment_method_id;
            $payment->issuer_id = (int)$data->issuer_id;

            $payer = new MercadoPago\Payer();
            $payer->email = $data->payer->email;
            $payer->identification = array(
                "type" => $data->payer->identification->type,
                "number" => $data->payer->identification->number
            );
            $payment->payer = $payer;

            $payment->save();

            $response = array(
                'status' => $payment->status,
                'status_detail' => $payment->status_detail,
                'id' => $payment->id
            );

            return json_encode($response);


    }

}