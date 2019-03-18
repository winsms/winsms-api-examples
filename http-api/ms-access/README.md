# WinSMS HTTP API Example using Microsoft Access and VBA
Example code for accessing the WinSMS HTTP API using Microsoft Access and Visual Basic for Applications

> DISCLAIMER: All sample code is provided as a guideline to demonstrate how the WinSMS API works. The code is provided "as is" without any guarantees. The sample code has been tested and works in our environment. Results may vary in different system configurations and software programs, therefore it is expected that you have sufficient technical knowledge and development skills to address any coding issues that may arise from using this sample code.

## WinSMSSample.mdb
Microsoft Access Database with input form for sending SMS messages via WinSMS

## VBA Code used in WinSMSSample.mdb
```vb.net
Option Compare Database



Public Function URLEncode( _
   StringToEncode As String, _
   Optional UsePlusRatherThanHexForSpace As Boolean = False _
) As String

  Dim TempAns As String
  Dim CurChr As Integer
  CurChr = 1

  Do Until CurChr - 1 = Len(StringToEncode)
    Select Case Asc(Mid(StringToEncode, CurChr, 1))
      Case 48 To 57, 65 To 90, 97 To 122
        TempAns = TempAns & Mid(StringToEncode, CurChr, 1)
      Case 32
        If UsePlusRatherThanHexForSpace = True Then
          TempAns = TempAns & "+"
        Else
          TempAns = TempAns & "%" & Hex(32)
        End If
      Case Else
        TempAns = TempAns & "%" & _
          Format(Hex(Asc(Mid(StringToEncode, _
          CurChr, 1))), "00")
    End Select

    CurChr = CurChr + 1
  Loop

  URLEncode = TempAns
End Function

Private Sub BtnSendSMS_Click()
    Dim intStatus, objHTTP, strResponse, ServerID, strMessage, strUserName, strPassword
    strUserName = txtUsername.Value
    strPassword = txtPassword.Value
    
    If (Len(TxtNumber) <> 0) And (Len(TxtMessage) <> 0) Then
        TxtServerID = ""
        strMessage = URLEncode(TxtMessage) ' Replace special characters in the message with http equivalent codes
        Set objHTTP = CreateObject("WinHttp.WinHttpRequest.5.1")
        objHTTP.Open "GET", "http://www.winsms.co.za/api/batchmessage.asp?user=" & strUserName & "&password=" & strPassword & "&message=" & strMessage & "&Numbers=" & TxtNumber & ";", False
        MyStr = objHTTP.Send
        strResponse = objHTTP.ResponseText
        If Left(strResponse, Len(TxtNumber)) <> TxtNumber Then
            MsgBox ("An Error has occurred, the error code is: " & strResponse)
        Else
            strResponse = Mid(strResponse, Len(TxtNumber) + 2, Len(strResponse))
            strResponse = Left(strResponse, Len(strResponse) - 1)
            If IsNumeric(strResponse) Then
                ServerID = strResponse
                TxtServerID = ServerID
            Else
                MsgBox ("An Error has occurred, the error code is: " & strResponse)
            End If
        End If
        Set objHTTP = Nothing
    Else
        MsgBox ("Please enter a number and message.")
    End If
    
End Sub
```
