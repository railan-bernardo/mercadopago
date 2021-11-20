
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integração de Pagamento com mercadoPago</title>
    <link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body>
    <main class="container">
        <!-- Step #2 -->
        <form id="form-checkout" action="proccess.php" method="post" class="box">
        <div class="form">
            <label>Número do Cartão</label>
            <input type="text" name="cardNumber" id="form-checkout__cardNumber" />
        </div>
        <div class="form">
            <div class="form-group">
                <div class="group">
                    <label>Mês de Exp:</label>
                    <input type="text" name="cardExpirationMonth" id="form-checkout__cardExpirationMonth" />
                </div>
                <div class="group mg-lr">
                    <label>Ano de Exp:</label>
                    <input type="text" name="cardExpirationYear" id="form-checkout__cardExpirationYear" />
                </div>
                <div class="group tree">
                    <label>CVV</label>
                    <input type="text" name="securityCode" id="form-checkout__securityCode" />
                </div>
                
            </div>
        </div>
        <div class="form">
            <label>Nome igual do Cartão:</label>
            <input type="text" name="cardholderName" id="form-checkout__cardholderName"/>
        </div>
        <div class="form">
            <label>E-mail:</label>
            <input type="email" name="cardholderEmail" id="form-checkout__cardholderEmail"/>
        </div>

        <div class="form">
            <div class="form-group">
                <div class="group">
                    <label>Banco Emissor:</label>
                    <select name="issuer" id="form-checkout__issuer"></select>
                </div>
                <div class="group">
                    <label>Tipo de Documento:</label>
                    <select name="identificationType" id="form-checkout__identificationType"></select>
                </div>
                
            </div>
        </div>
        <div class="form">
            <div class="form-group">
            <div class="group">
                    <label>Número do Documento:</label>
                    <input type="text" name="identificationNumber" id="form-checkout__identificationNumber"/>
                </div>
                <div class="group">
                    <label>Quantidade:</label>
                    <select name="installments" id="form-checkout__installments"></select>
                </div>
            </div>
        </div>
       
        
        <button type="submit" id="form-checkout__submit">Pagar</button>
        <progress value="0" class="progress-bar">Carregando...</progress>
        </form>
    </main>
</body>
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script src="https://www.mercadopago.com/v2/security.js" view="home"></script>
<script src="assets/js/scripts.js"></script>
</html>