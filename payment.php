<?php //Inicia PHP
require_once 'vendor/autoload.php'; //necessario carregar para efetuacao da compra


//Passo 1
//Credencias Inicio
MercadoPago\SDK::setAccessToken("TEST-8200121559149382-030517-5f7ec10c7cd169dc213ab7271e7ab137-133879063"); //minhas credencias.
//Credencias Fim

//Passo 2
//Identificacao do Comprador(Dados Pessoais)
$payer = new MercadoPago\Payer();
    $payer->name = "Rodrigo";                               //Nome
    $payer->surname = "Araujo";                             //Sobrenome
    $payer->email = "rodrigoaraujo888888@testeruser.com";   //Email
    $payer->date_created = "2018-06-02T12:58:41.425-04:00"; //Data do Cadastro
    $payer->phone = array(
        "area_code" => "55",                                //Codigo De Area (Brasil)
        "number" => "(11)56778888"                          //DD e Telefone
    );
    $payer->identification = array(
        "type" => "CPF",                                    // Tipo de Identificao  CPF 
        "number" => "36910940888"                           // Numero do CFP
    );
    $payer->address = array(
        "zip_code" => "04379999" ,                          //Cep (Brasil)
        "street_name" => "Av.Jabaquara",                    //Nome da rua 
        "street_number" => "1278"                           //Numero da rua
        
    );

//Identificacao do Comprador (Entrega) 
$shipments = new MercadoPago\Shipments();
    $shipments->receiver_address = array(
       "zip_code" => "04379999",          //Cep (Brasil)
       "street_name" => "Av.Jabaquara",   //Nome da rua
       "street_number" => "1278",         //Numero da rua
       "apartment" => "Torre 2 21" ,      //Numero Do Apartamento
       "floor" => "2"                     //Andar 
    );  

//Passo 3
//Identificacao e Descricao do Produto
$item = new MercadoPago\Item();
    $item->id = "4014";    //Identificacao Do Item (ID)
    $item->title = "Teclado";     // Nome do item 
    $item->quantity = "1";        //Quandidade do Item 
    $item->currency_id = "BRL";   //Tipo de Moeda (R$ Brasil)
    $item->unit_price = "34.72";  //Preco (R$)

//Passo 4
//Meio de Pagamento Inicio
$payment = new MercadoPago\Payment();
    $payment->payment_method_id = "Mastercard";          //bandeira do cartao de credito 
    $payment->token = "5031 4332 1540 6351";             //numero do cartao de credito (Cartao de Teste)
    $payment->transaction_amount = "34.72";              //valor da compra
    $payment->installments = "1";                        //Numero De Parcelas
    $payment->description = "Teclado";                   //descricao do produto
    $payment->payer = array(
        "email" => "rodrigoaraujo888888@testeruser.com"  //email do comprador
    );
    $payment->save();                                    //salva o pagamento
//Meio de Pagamento Final
    echo $payment->status;//imprimir status

//Termina PHP
?>
