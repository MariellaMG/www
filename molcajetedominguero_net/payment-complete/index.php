<?php
session_start();
include("../admin/includes/mysql_infos2.php");


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

//echo "--";
extract($_POST);

/*
  require '../vendor/vendor/autoload.php';
  require_once '../vendor_sample/constants/SampleCodeConstants.php';
  use net\authorize\api\contract\v1 as AnetAPI;
  use net\authorize\api\controller as AnetController;

  define("AUTHORIZENET_LOG_FILE", "phplog");
  
  define("DONT_RUN_SAMPLES", "false");
  define("SAMPLE_CODE_NAME_HEADING", "SampleCodeName");

function authorizeCreditCard($amount)
{
	
	extract($_POST);
	

    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);
    
    $refId = 'ref' . time();

    // Create the payment data for a credit card
    $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber($cardnumber);
    $creditCard->setExpirationDate($expirationdate);
    $creditCard->setCardCode($cardcode);

    // Add the payment data to a paymentType object
    $paymentOne = new AnetAPI\PaymentType();
    $paymentOne->setCreditCard($creditCard);

    // Create order information
    $order = new AnetAPI\OrderType();
    $order->setInvoiceNumber($id_cart);
    $order->setDescription("Cart");

    // Set the customer's Bill To address
    $customerAddress = new AnetAPI\CustomerAddressType();
    $customerAddress->setFirstName($firstname);
    $customerAddress->setLastName($lastname);
    //$customerAddress->setCompany("Souveniropolis");
    $customerAddress->setAddress($address);
    $customerAddress->setCity($city);
    $customerAddress->setState($state);
    $customerAddress->setZip($zipcode);
    $customerAddress->setCountry($country);

    // Set the customer's identifying information
    $customerData = new AnetAPI\CustomerDataType();
    $customerData->setType("individual");
    $customerData->setId($id_usuario);
    $customerData->setEmail($email);

    // Add values for transaction settings
    $duplicateWindowSetting = new AnetAPI\SettingType();
    $duplicateWindowSetting->setSettingName("duplicateWindow");
    $duplicateWindowSetting->setSettingValue("60");

    // Add some merchant defined fields. These fields won't be stored with the transaction,
    // but will be echoed back in the response.
    $merchantDefinedField1 = new AnetAPI\UserFieldType();
    $merchantDefinedField1->setName("customerLoyaltyNum");
    $merchantDefinedField1->setValue($id_usuario);
	
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
   //$res =  authorizeCreditCard("2.23");
}

*/
$cant = "1.".strval(round(rand(10,80)));
$cant = $total;
//$cant = 2;

require '../composer/vendor/autoload.php';
require_once '../vendor_sample/constants/SampleCodeConstants.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

define("AUTHORIZENET_LOG_FILE", "phplog");

function chargeCreditCard($amount)
{

    extract($_POST);
    /* Create a merchantAuthenticationType object with authentication details
       retrieved from the constants file */
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);
    
    // Set the transaction's refId
    $refId = 'ref' . time();

    // Create the payment data for a credit card
    $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber($cardnumber);
    $creditCard->setExpirationDate($expirationdate);
    $creditCard->setCardCode($cardcode);

    // Add the payment data to a paymentType object
    $paymentOne = new AnetAPI\PaymentType();
    $paymentOne->setCreditCard($creditCard);

    // Create order information
    $order = new AnetAPI\OrderType();
    $order->setInvoiceNumber($id_transaccion);
    $order->setDescription("Molcajete payment");

    // Set the customer's Bill To address
    $customerAddress = new AnetAPI\CustomerAddressType();
    $customerAddress->setFirstName($firstname);
    $customerAddress->setLastName($lastname);
    $customerAddress->setCompany("Molcajete");
    $customerAddress->setAddress($address);
    $customerAddress->setCity($city);
    $customerAddress->setState($state);
    $customerAddress->setZip($zipcode);
    $customerAddress->setCountry($country);

    // Set the customer's identifying information
    $customerData = new AnetAPI\CustomerDataType();
    $customerData->setType("individual");
    $customerData->setId("99999456654");
    $customerData->setEmail($email);

    // Add values for transaction settings
    $duplicateWindowSetting = new AnetAPI\SettingType();
    $duplicateWindowSetting->setSettingName("duplicateWindow");
    $duplicateWindowSetting->setSettingValue("60");

    // Add some merchant defined fields. These fields won't be stored with the transaction,
    // but will be echoed back in the response.
    //$merchantDefinedField1 = new AnetAPI\UserFieldType();
    //$merchantDefinedField1->setName("customerLoyaltyNum");
    //$merchantDefinedField1->setValue("1128836273");

    //$merchantDefinedField2 = new AnetAPI\UserFieldType();
    //$merchantDefinedField2->setName("favoriteColor");
    //$merchantDefinedField2->setValue("blue");

    // Create a TransactionRequestType object and add the previous objects to it
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType("authCaptureTransaction");
    $transactionRequestType->setAmount($amount);
    $transactionRequestType->setOrder($order);
    $transactionRequestType->setPayment($paymentOne);
    $transactionRequestType->setBillTo($customerAddress);
    $transactionRequestType->setCustomer($customerData);
    $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
    //$transactionRequestType->addToUserFields($merchantDefinedField1);
    //$transactionRequestType->addToUserFields($merchantDefinedField2);

    // Assemble the complete transaction request
    $request = new AnetAPI\CreateTransactionRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setRefId($refId);
    $request->setTransactionRequest($transactionRequestType);

    // Create the controller and get the response
    $controller = new AnetController\CreateTransactionController($request);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
    

    if ($response != null) {
        // Check to see if the API request was successfully received and acted upon
        if ($response->getMessages()->getResultCode() == "Ok") {
            // Since the API request was successful, look for a transaction response
            // and parse it to display the results of authorizing the card
            $tresponse = $response->getTransactionResponse();
        
            if ($tresponse != null && $tresponse->getMessages() != null) {
                //echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
                //echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
                //echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
                //echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
                //echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
            } else {
                //echo "Transaction Failed \n";
                if ($tresponse->getErrors() != null) {
                    //echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                    //echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                }
            }
            // Or, print errors if the API request wasn't successful
        } else {
            return -1;

            //echo "Transaction Failed \n";
            $tresponse = $response->getTransactionResponse();
        
            if ($tresponse != null && $tresponse->getErrors() != null) {
                //echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                //echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
            } else {
                //echo " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                //echo " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
            }
        }
    } else {
        //echo  "No response returned \n";
    }

    return $response;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Molcajete Dominguero</title>
<link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Roboto:700|Nanum+Gothic|Titan+One|Passion+One|Lilita+One|Permanent+Marker" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/home.css">
<link rel="stylesheet" type="text/css" href="../css/stylesheetmd.css">
<link rel="stylesheet" type="text/css" href="../css/payment-complete.css">

 <script src="../js/jquery-1.10.2.js"></script>
 <script src="../js/home2.js"></script>
 
</head>

<body>



<div class="sf_header">

	<div class="sf_header1" id="sf_header1">
        <div class="sf_header2" id="sf_header2">
            
            
			<div class="sf_header_tit" style="margin-top:0vw;">Payment Complete</div>
            
            
          
             
      
             
             
             
             <table width="80%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th width="60%">Payment complete</td>
                <th width="15%"></td>
                <th width="15%"></td>
                <th width="20%"></td>
              </tr>
              
              
              <tr class="item<?php echo $i%2; ?>">
                <td>
                	<div class="item_div">
                		
                        <?php 

                        $response = chargeCreditCard($cant);
						
						if ($response != -1) {
						   //$response =  authorizeCreditCard($cant);
						   
						   echo "Successfully created transaction";
						   
						   $refId=$response->getRefId();
						   //$messages=$response->getMessages();
						   $resultCode=$response->getMessages()->getResultCode();
						   $message=$response->getMessages()->getMessage();
						   
						   //$code=$response->getMessages()->getMessage()->getCode();
						   //$text=$response->getMessages()->getMessage()->getText();
						   
						   $tresponse = $response->getTransactionResponse();
						   
						   /*
						   $responseCode=$tresponse->getResponseCode();
						   $responseCodeA=$tresponse->getResponseCode();
						   */
						   
						   //$avsResultCode=$tresponse->getAvsResultCode();
						   //$cavvResultCode=$tresponse->getCavvResultCode();
						   
						   /*
						   $transId = $tresponse->getTransId();
						   $refTransId = $tresponse->getRefTransId();
						   $transHash = $tresponse->getTransHash();
						   $accountNumber = $tresponse->getAccountNumber();
						   $accountType = $tresponse->getAccountType();
						   
						   $transactionResponse_messages = $tresponse->getMessages();
						   $transactionResponse_messages_resultCode = $tresponse->getMessages()[0]->getCode();
						   $transactionResponse_messages_message = $tresponse->getMessages()[0]->getMessage();
						   
						   $errorCode = $tresponse->getErrors()[0]->getErrorCode();
						   $errorText = $tresponse->getErrors()[0]->getErrorText();
						   */
						   
						   
						   $sql="INSERT INTO `transaccion` (`id_transaccion`, `referencia`, `refId`, `messages`, `resultCode`, `message`, `code`, `text`, `responseCodeA`, `responseCode`, `avsResultCode`, `cvvResultCode`, `cavvResultCode`, `transId`, `refTransId`, `transHash`, `accountNumber`, `accountType`, `transactionResponse_messages`, `transactionResponse_messages_resultCode`, `transactionResponse_messages_message`, `errorCode`, `errorText`, `splitTenderPayments`, `splitTenderPayment`, `responseToCustomer`, `requestedAmount`, `approvedAmount`, `balanceOnCard`, `userFields`, `userField`, `userField_name`, `userField_value`, `extra`, `valor`, `raiz`, `padre`, `fecha`, `fecha_alta`, `fecha_corte`) 
						   VALUES 
						   (NULL, '$referencia', '$refId', '$messages', '$resultCode', '$message', '$code', '$text', '$responseCodeA', '$responseCode', '$avsResultCode', '$cvvResultCode', '$cavvResultCode', '$transId', '$refTransId', '$transHash', '$accountNumber', '$accountType', '$transactionResponse_messages', '$transactionResponse_messages_resultCode', '$transactionResponse_messages_message', '$errorCode', '$errorText', '$splitTenderPayments', '$splitTenderPayment', '$responseToCustomer', '$requestedAmount', '$approvedAmount', '$balanceOnCard', '$userFields', '$userField', '$userField_name', '$userField_value', '0', '0', '0', '0', now(), now(), now());";
						   
						   //echo $sql;
						   
						   $result = mysqli_query($link,$sql);

                        $id_usuario = $_SESSION['idu'];

                        $qt = "update cart set pagado = 1 where id_usuario = '$id_usuario'";
                        $resul = mysqli_query($link,$qt);
						   
						} else {
                            echo "Transaction Failed ";
                        }
						
						?>
                        
                        
                    </div>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>

                <td>$<?php echo number_format($cant); ?></td>
              </tr>
          
              
              
              <tr class="total">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>TOTAL</td>
                <td>$<?php echo number_format($cant); ?></td>
              </tr>
            </table>
            
            <div class="item_btns"></div>
                         
             
             
            
            
            </div>
            
     </div>
    

</div>







    



</body>

</html>
