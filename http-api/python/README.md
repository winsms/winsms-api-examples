# WinSMS HTTP API Python example
Example code for accessing the WinSMS HTTP API using Python 2 & 3

> DISCLAIMER: All sample code is provided as a guideline to demonstrate how the WinSMS API works. The code is provided "as is" without any guarantees. The sample code has been tested and works in our environment. Results may vary in different system configurations and software programs, therefore it is expected that you have sufficient technical knowledge and development skills to address any coding issues that may arise from using this sample code.

## Python 2
> This sample code was kindly supplied by Piet Vermeulen (pietv@suidwes.co.za).

Piet is running a Raspberry Pi on which the code is implemented to send environmental sensor data to his cell.

Please note that the following code is supplied merely as an example of how to use Python with the WinSMS API. We do not support this code and we do not offer any Python development services.

```python
#!/bin/python
#
# 
#                   Adapt to run as "python sndsmstest.py $(Sample test message)"
#                   and use sys.argv to parse tokens/parameters
#
import os
import urllib

def main(): 
        msg = "Sample test message" 
        t1 = "http://www.winsms.co.za/api/batchmessage.asp?User=myemail@domain.co.za&Password=mypassword&Deliver=No&Message=RaspberryPi: " + msg
        t2 = "&Numbers=0830838083"
        print t1 + t2
        f = urllib.urlopen(t1 + t2)
        s = f.read()
        f.close()

if __name__ == '__main__':
    main()
```

## Python 3
Python 2 code updated for Python 3

```python
import os
import urllib
import urllib.request
import urllib.parse

def main(): 
        msg = "Sample test message"
        msg = urllib.parse.quote(msg)
        t1 = "https://www.winsms.co.za/api/batchmessage.asp?User=username&Password=password&Message=" + msg
        t2 = "&Numbers=27825555555"
        print (t1 + t2)
        f = urllib.request.urlopen(t1 + t2)        
        s = f.read()
        print(s)
        f.close()
if __name__ == '__main__':
    main()
```
