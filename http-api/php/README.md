# winsms-api-examples
Example code for accessing the WinSMS APIs

> DISCLAIMER: All sample code is provided as a guideline to demonstrate how the WinSMS API works. The code is provided "as is" without any guarantees. The sample code has been tested and works in our environment. Results may vary in different system configurations and software programs, therefore it is expected that you have sufficient technical knowledge and development skills to address any coding issues that may arise from using this sample code.

## PHPSample1.php
Simple server-side only script for sending SMS messages using the <a href="https://www.winsms.co.za/api/httpdocs/" target="_blank">WinSMS HTTP API</a>
```php
<?php
//This sample demonstrates HTTP submittal using variables and encodes the SMS message before submittal.

//DISCLAIMER: The sample code is provided as a guideline to demonstrate how our API works. The code is provided "as is" without any guarantees. The sample code has been tested and works in our environment, results may vary in different system configurations and software programs therefore it is expected that you have sufficient technical knowledge and development skills to address any coding issues that may arise from using this sample code.

$url = "https://www.winsms.co.za/api/batchmessage.asp?";

$userp = "user=";

$passwordp = "&password=";

$messagep = "&message=";

$numbersp = "&Numbers=";

// WinSMS username variable - Set your WinSMS username here.
$username = "WinSMS Username";

// WinSMS password variable - Set your WinSMS password here.
$password = "WinSMS Password"; 

// WinSMS message variable - Set your WinSMS message here.
$message = "test My PHP with encoding";

// URL encoding of your message.
$encmessage = urlencode(utf8_encode($message));

// WinSMS cellphone numbers variable - Set your cellphone numbers here separated with a ;
$numbers = "278xxxxxxxx";

// Combines all the variables together
$all = $url.$userp.$username.$passwordp.$password.$messagep.$encmessage.$numbersp.$numbers;

// Opens the URL in read only mode
$fp = fopen($all, 'r');

// Gets feedback from HTTP submittle
while(!feof($fp)){
$line = fgets($fp, 4000);
print($line);
echo "<br>";
}
fclose($fp);

/*Now Parse $line to determine if errors were encountered, and to obtain the Server ID for each message sent.

Ensure that fopen_allow_url is set to true in php.ini (it is by default).

If the web server is behind a firewall or proxy server, you will have to open it for the php script, or alternatively look into setting the proxy settings for authentication in the .php script.
*/

?>
```
