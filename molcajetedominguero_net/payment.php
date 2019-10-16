<?php
session_start();
include("admin/includes/mysql_infos2.php");

$id_usuario = $_SESSION['idu'];

 				$qt = "SELECT * FROM cart WHERE id_usuario = '$id_usuario' and pagado = 0 ";
				//echo $qt;
				$total=0;
				$resul = mysqli_query($link,$qt);
				$i=0;
				while ($row = mysqli_fetch_row($resul)){
			  		$i++;
					$id_cart = $row[0];
					$id_usuario = $row[1];
					$id_ticket = $row[2];
					$tipo_ticket = $row[3];
					$id_transaccion = $row[4];
					$fecha = $row[5];
					$cantidad = $row[6];
					$pagado = $row[7];
					$alimentos = $row[8];
					$precio = $row[9];
					
					$suma = $precio*$cantidad;
					$total+=$suma;
					
				}
?>
<?php
/*
  require 'vendor/autoload.php';
  require_once 'vendor_sample/constants/SampleCodeConstants.php';
  use net\authorize\api\contract\v1 as AnetAPI;
  use net\authorize\api\controller as AnetController;

  define("AUTHORIZENET_LOG_FILE", "phplog");

function authorizeCreditCard($amount)
{
    
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);
    
    // Set the transaction's refId
    $refId = 'ref' . time();

    // Create the payment data for a credit card
    $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber("4111111111111111");
    $creditCard->setExpirationDate("2038-12");
    $creditCard->setCardCode("123");

    // Add the payment data to a paymentType object
    $paymentOne = new AnetAPI\PaymentType();
    $paymentOne->setCreditCard($creditCard);

    // Create order information
    $order = new AnetAPI\OrderType();
    $order->setInvoiceNumber("10101");
    $order->setDescription("Golf Shirts");

    // Set the customer's Bill To address
    $customerAddress = new AnetAPI\CustomerAddressType();
    $customerAddress->setFirstName("Ellen");
    $customerAddress->setLastName("Johnson");
    $customerAddress->setCompany("Souveniropolis");
    $customerAddress->setAddress("14 Main Street");
    $customerAddress->setCity("Pecan Springs");
    $customerAddress->setState("TX");
    $customerAddress->setZip("44628");
    $customerAddress->setCountry("USA");

    // Set the customer's identifying information
    $customerData = new AnetAPI\CustomerDataType();
    $customerData->setType("individual");
    $customerData->setId("99999456654");
    $customerData->setEmail("EllenJohnson@example.com");

    // Add values for transaction settings
    $duplicateWindowSetting = new AnetAPI\SettingType();
    $duplicateWindowSetting->setSettingName("duplicateWindow");
    $duplicateWindowSetting->setSettingValue("60");

    // Add some merchant defined fields. These fields won't be stored with the transaction,
    // but will be echoed back in the response.
    $merchantDefinedField1 = new AnetAPI\UserFieldType();
    $merchantDefinedField1->setName("customerLoyaltyNum");
    $merchantDefinedField1->setValue("1128836273");

    $merchantDefinedField2 = new AnetAPI\UserFieldType();
    $merchantDefinedField2->setName("favoriteColor");
    $merchantDefinedField2->setValue("blue");

    // Create a TransactionRequestType object and add the previous objects to it
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType("authOnlyTransaction"); 
    $transactionRequestType->setAmount($amount);
    $transactionRequestType->setOrder($order);
    $transactionRequestType->setPayment($paymentOne);
    $transactionRequestType->setBillTo($customerAddress);
    $transactionRequestType->setCustomer($customerData);
    $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
    $transactionRequestType->addToUserFields($merchantDefinedField1);
    $transactionRequestType->addToUserFields($merchantDefinedField2);

    // Assemble the complete transaction request
    $request = new AnetAPI\CreateTransactionRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setRefId($refId);
    $request->setTransactionRequest($transactionRequestType);

    // Create the controller and get the response
    $controller = new AnetController\CreateTransactionController($request);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);


    if ($response != null) {
        // Check to see if the API request was successfully received and acted upon
        if ($response->getMessages()->getResultCode() == "Ok") {
            // Since the API request was successful, look for a transaction response
            // and parse it to display the results of authorizing the card
            $tresponse = $response->getTransactionResponse();
        
            if ($tresponse != null && $tresponse->getMessages() != null) {
                echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
                echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
                echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
                echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
                echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
            } else {
                echo "Transaction Failed \n";
                if ($tresponse->getErrors() != null) {
                    echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                    echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                }
            }
            // Or, print errors if the API request wasn't successful
        } else {
            echo "Transaction Failed \n";
            $tresponse = $response->getTransactionResponse();
        
            if ($tresponse != null && $tresponse->getErrors() != null) {
                echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
            } else {
                echo " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                echo " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
            }
        }      
    } else {
        echo  "No response returned \n";
    }

    return $response;
}

if (!defined('DONT_RUN_SAMPLES')) {
    authorizeCreditCard("2.23");
}
*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Vendor Application | Molcajete Dominguero</title>
<link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Roboto:700|Nanum+Gothic|Titan+One|Passion+One" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/home-local.css">
<link rel="stylesheet" type="text/css" href="css/sponsorships.css">
<link rel="stylesheet" type="text/css" href="css/stylesheetmd-local.css">

<link rel="stylesheet" type="text/css" href="/css/login.css">
<link rel="stylesheet" type="text/css" href="/css/login_cart.css">


 <script src="js/jquery-1.10.2.js"></script>
 <script src="js/home-local.js"></script>
 <script src="js/contact-us.js"></script>
  <script src="/js/login.js"></script>
 
   <script src="/js/login_cart.js"></script>
</head>

<body>


<?php
include "login_cart.php";
?>

<div class="div-contact-us" style="background-image:url(/images/fondo_azul.jpg)">

<br /><br />
      <div class="contact-izq">
           <h1>COMPLETE PAYMENT</h1>
		   
           <h2>AMOUNT TO PAY: $<?php echo number_format($total); ?></h2>
           
           <h3>PLEASE NOTE</h3>
<h4>Complete all the required data.</h4>


       <h2> PAYMENT DATA</h2>

<form action="/payment-complete/" enctype="multipart/form-data" method="post">

<div>
		<div style="float:left; width:50%;">
			<p>First Name:</p>
           <input name="firstname" type="text" class="campo" />
           <br /><br />
           
           <p>Last Name:</p>
           <input name="lastname" type="text" class="campo" />
           <br /><br />
           
           
           <p>Address:</p>
           <input name="address" type="text" class="campo" />
           <br /><br /> 
           
           
             <p>City:</p>
           <input name="city" type="text" class="campo" />
           <br /><br />
           
           
           </div>
           <div style="float:left; width:50%;">
           
           
             <p>State:</p>
           <input name="state" type="text" class="campo" />
           <br /><br />
           
           
             <p>Zip code:</p>
           <input name="zipcode" type="text" class="campo" />
           <br /><br />
           
           
             <p>Country:</p>
           <input name="country" type="text" class="campo" />
           <br /><br />
           
           
           <p>Email:</p>
        <input name="email" type="text" class="campo" />
        <br /><br />
        
        
        
	</div>        
    <div style="clear:both;"></div>
</div>



<div>
  <div style="float:left; width:50%;">
         
        
          <p>Card Number (Example: 4111111111111111):</p>
        <input name="cardnumber" type="text" class="campo" />
        <br /><br />
        
        <p>Expiration Date (Example: 2038-12):</p>
        <input name="expirationdate" type="text" class="campo" />
        <br /><br />
        
          
        <p>Card Code CCV (Example: 123):</p>
        <input name="cardcode" type="text" class="campo" />
        <br /><br />
        
        </div>     
        
         <div style="float:left; width:50%;">   
        		<div style="width:80%; margin:auto">
        			<img src="images/tarjeta-.jpg" width="100%"  alt="CreditCard" />
        		</div>
        </div>
        
        
    <div style="clear:both;"></div>
   
   </div>
   
   
           <input name="SUBMIT" value="SUBMIT" type="submit" class="boton" style="padding-top:3px;" />
         
           
           
         </form>
           
      </div>
        

    
   
    

</div>


</body>

</html>
