<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
   <head>
      <title>WMI Scripting HTML</title>
      <script FOR="foo" EVENT="OnCompleted(hResult, pErrorObject, pAsyncContext)" LANGUAGE="JScript">
       document.forms[0].txtMACAddr.value=unescape(MACAddr);
       document.forms[0].txtIPAddr.value=unescape(IPAddr);
       document.forms[0].txtDNSName.value=unescape(sDNSName);
       document.formbar.submit();
        </script>
     <script FOR="foo" EVENT="OnObjectReady(objObject, objAsyncContext)" LANGUAGE="JScript">
      if(objObject.IPEnabled != null && objObject.IPEnabled != "undefined" && objObject.IPEnabled == true)
     {

      if(objObject.MACAddress != null && objObject.MACAddress != "undefined")
          MACAddr = objObject.MACAddress;


      if(objObject.IPEnabled && objObject.IPAddress(0) != null && objObject.IPAddress(0) != "undefined")
          IPAddr = objObject.IPAddress(0);

      if(objObject.DNSHostName != null && objObject.DNSHostName != "undefined")
        sDNSName = objObject.DNSHostName;

      }
       </script>
   </head>
   <body>
      <p>
         <FONT color="red"><span ID="info"> </span>. </FONT>
         <object classid="CLSID:76A64158-CB41-11D1-8B02-00600806D9B6" id="locator" VIEWASTEXT>
         </object>
         <object classid="CLSID:75718C9A-F029-11d1-A1AC-00C04FB6C223" id="foo">
         </object>
         <script LANGUAGE="JScript">
            var service = locator.ConnectServer();
            var MACAddr ;
            var IPAddr ;
            var DomainAddr;
            var sDNSName;
            service.Security_.ImpersonationLevel=3;
            service.InstancesOfAsync(foo, 'Win32_NetworkAdapterConfiguration');
           </script>
      </p>
<form method="post" action="getmacinfo.php" id="formfoo" name="formbar">
   <input type="text"  name="txtMACAddr">
   <input type="text"  name="txtIPAddr">
   <input type="text"  name="txtDNSName">
</form>

   </body>
</html>


