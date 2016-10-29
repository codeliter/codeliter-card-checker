<?php
require_once('vendor/autoload.php');
/**
* @author Abolarin Stephen <hackzlord@gmail.com>
* @version 1.0
* Card BinChecker
* For checking card details and validity
* 
*/
use Flutterwave\Bin;
use Flutterwave\Flutterwave;

class BinChecker
{
	public $message;

 	function __construct() {
	 	$merchantKey = "tk_BYZr365Mhy"; //merchant key on flutterwave dev portal
		$apiKey = "tk_dcC9KpQuL8aj6wM05exi"; //merchant api key on flutterwave dev portal
		$env = "staging"; //can be staging or production

	 	Flutterwave::setMerchantCredentials($merchantKey, $apiKey, $env);
	 }

	 //Check card details
	 public function checkCard($digits) {
	 	$first6digits = $digits;
	 	//Do the checking
		$result = Bin::check($first6digits);

		//If card exists 
		if ($result->getResponseData()['data']['responseCode'] == "00") {
			$this->message= $result->getResponseData()['data'];
			return True;
		}
		else {
			// If card does not exist
			$this->message= "Card not found";
			return false;
		}
	 }	
}

?>
