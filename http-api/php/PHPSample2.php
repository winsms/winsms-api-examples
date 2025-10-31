<!DOCTYPE HTML> 
<html>
<head>
</head>
<body> 

<?php

// This sample demonstrates HTTP submittal using a form to get variables and encodes the SMS message before submittal.

// DISCLAIMER: The sample code is provided as a guideline to demonstrate how our API works. The code is provided "as is" without any guarantees. The sample code has been tested and works in our environment, results may vary in different system configurations and software programs therefore it is expected that you have sufficient technical knowledge and development skills to address any coding issues that may arise from using this sample code.

// Define variables and set to empty values
$username = $password = $message = $numbers = "";

// Define variables used in the URL
$url = "https://api.winsms.co.za/api/batchmessage.asp?";

$userp = "user=";

$passwordp = "&password=";

$messagep = "&message=";

$numbersp = "&Numbers=";

// Assign varibles values after submittle
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = test_input($_POST["username"]);
   $password = test_input($_POST["password"]);
   $message = test_input($_POST["message"]);
   $numbers = test_input($_POST["numbers"]);
}

// Trim to Strip unnecessary characters. Stripslashes to remove slashes. htmlspecialchars to stop scripts executing.
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>PHP WinSMS Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   WinSMS Username: <input type="text" name="username">
   <br><br>
   WinSMS Password: <input type="password" name="password">
   <br><br>
   SMS Message:     <textarea name="message" rows="5" cols="40"></textarea>
   <br><br>
   Cell Numbers:    <input type="text" name="numbers">
   <input type="submit" name="submit" value="Send">
</form>

<?php

// URL encoding of your message.
$encmessage = urlencode(utf8_encode($message));

// Combines all the variables together
$all = $url.$userp.$username.$passwordp.$password.$messagep.$encmessage.$numbersp.$numbers;

// HTTP submittle and responce printing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$fp = fopen($all, 'r');
while(!feof($fp)){
$line = fgets($fp, 4000);
echo "<br>";
echo "Responce";
echo "<br>";
print($line);
echo "<br>";
}
fclose($fp);
}

/*Now Parse $line to determine if errors were encountered, and to obtain the Server ID for each message sent.
Ensure that fopen_allow_url is set to true in php.ini (it is by default).
If the web server is behind a firewall or proxy server, you will have to open it for the php script, or alternatively look into setting the proxy settings for authentication in the .php script.
*/

?>

</body>

</html>
