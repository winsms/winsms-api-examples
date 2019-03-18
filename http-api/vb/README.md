# WinSMS HTTP API Visual Basic Example application
Example code for accessing the WinSMS HTTP API using a VB.net / VB6 application

> DISCLAIMER: All sample code is provided as a guideline to demonstrate how the WinSMS API works. The code is provided "as is" without any guarantees. The sample code has been tested and works in our environment. Results may vary in different system configurations and software programs, therefore it is expected that you have sufficient technical knowledge and development skills to address any coding issues that may arise from using this sample code.

## How to use

Add the Microsoft Internet Control to a form.
Add 4 Text boxes called:

 - TBUserName
 - TBPassword
 - TBMessage
 - TBNumber
 
 Add a button

```vb.net
Function readHtmlPage(ByVal url As String) As String
	readHtmlPage = Inet1.OpenURL(url)
	If InStr(readHtmlPage , "(404)") Then
		readHtmlPage = "URL: " & url & " not found."
	End If
End Function
```

```vb.net
Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
	Dim MyString As String
	Dim TxUserName As String
	Dim TxPassword As String
	Dim TxMessage As String
	Dim TxNumber As String
	TxUserName = TBUserName.Text
	TxPassword = TBPassword.Text
	TxMessage = TBMessage.Text
	TxNumber = TBNumber.Text
	MyString = "http://www.winsms.co.za/api/batchmessage.asp?User="
	MyString = MyString & TxUserName & "&Password=" & TxPassword & "&Delivery=No"
	MyString = MyString & "&Message=" & TxMessage & "&Numbers=" & TxNumber & ";"
	MsgBox(readHtmlPage(MyString))
End Sub
```
