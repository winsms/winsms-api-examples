
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
