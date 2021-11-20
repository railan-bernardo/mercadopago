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
    


