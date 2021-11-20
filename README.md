# INTEGRAÇÃO COM O MERCADO PAGO

> Status: Aceitando melhorias

#### Sobre

Integração com a api de pagamentos do mercado pago usando a SDK


#### Configurações

```php
<?php
// Credenciais do MercadoPago
define("MERCADO_PAGO_KEY", "YOUR_KEY"); // chave key
define("MERCADO_PAGO_TOKEN", "YOUR_TOKEN"); // token
```

#### Class ProccessPayment

```php
<?php
namespace Source\Controller;

use \MercadoPago;

class ProccessPayment {

    // metodo responsavel pelo processamento do pagmento 
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
```

#### Desmostração

```php
<?php
require __DIR__ ."/vendor/autoload.php";


use Source\Models\ProccessPayment;

// instancia a class ProccessPayment
$pay = new ProccessPayment();
// recebe os dados retornado pelo mercado pago
$json = file_get_contents("php://input");
// armazena os dados na variavel $data
$data = json_decode($json);
// armazena o retorno do processamento com o status
$status = $pay->proccess($data);
// exibe o status de pagamento
echo $status;
```