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

## SamplePageSend.asp
The server-side classic ASP script called by the form submit of *SamplePage.html*
```vb.net
<%SendURL = "http://www.winsms.co.za/api/batchmessage.asp?user=MyLoginName&password=MyPassword&message=" & Request("Message")

' The following If - Then Statements can be replaced with a database lookup to determine the recipients Cell No based on Unique Identifier

' Note that the cell numbers must be in International format, i.e. 2783 as opposed to 083

If Request("Recipient") = "1" then
  CellNo = "27831111111;" 
end if 
If Request("Recipient") = "2" then
  CellNo = "27822222222;" 
end if 
If Request("Recipient") = "3" then
  CellNo = "27831111111;27822222222;" 
end if 

' Note the Trailing ";" semi-colon at the end of the cell number. This is essential.
' A single selection by the user eg "Marketing Manager" could result in multiple SMS's being send, eg Marketing Manager and Sales ' Consultant - Note the last If - Then Statement 


SendURL = SendURL & "&Numbers=" & CellNo

' We use an XMLObject - easisest way to get response from another .asp page - don't be thrown by the fact that it is an XML object not
' http object

' Create an xmlhttp object:

Set xml = Server.CreateObject("Microsoft.XMLHTTP")

' Opens the connection to the WinSMS Gateway.
 xml.Open "GET", SendURL, False 

' Actually Sends the request and returns the result:
  xml.Send

  strBuffer=xml.ResponseText

' Parse response for error messages

If (Instr(strBuffer,"NOCREDITS") = 0) AND (Instr(strBuffer,"FAIL") = 0) AND (Instr(strBuffer,"INVALID") = 0) then
    Response.write("SENT")
else
    Response.write("FAILED:  " & strBuffer)
end if
  %>
```
