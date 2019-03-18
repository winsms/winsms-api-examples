# WinSMS HTTP API Example using HTML forms and classic ASP
Example code for accessing the WinSMS HTTP API using static HTML and classic ASP scripting

> DISCLAIMER: All sample code is provided as a guideline to demonstrate how the WinSMS API works. The code is provided "as is" without any guarantees. The sample code has been tested and works in our environment. Results may vary in different system configurations and software programs, therefore it is expected that you have sufficient technical knowledge and development skills to address any coding issues that may arise from using this sample code.

## SamplePage.html
Static HTML page with form inputs

```html
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>WinSMS Sample Page Front End</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<!--Insert location of SamplePageSend.asp for "action" value-->

<form method="POST" action="SamplePageSend.asp">
   <p>SMS To:<select size="1" name="Recipient">
    <option selected value="1">Web Master</option>
    <option value="2">Marketing Manager</option>
    <option value="3">Sales Consultant</option>
  </select></p>
  <p>Message:</p>
  <p><textarea rows="4" name="Message" cols="25"></textarea></p>
  <p><input type="submit" value="Send" name="B1"></p>
</form>
</body>
</html>
```
