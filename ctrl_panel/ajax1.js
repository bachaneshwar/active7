

function sponsor_check(page_to_call)
  {
      var name = document.getElementById('sponsorid').value;
     // alert("Hello! I am an alert box!!");
   //alert(name);
  var xmlHttp;
  try
    {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)
      {
      try
        {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      catch (e)
        {
        alert("Your browser does not support AJAX!");
        return false;
        }
      }
    }
    xmlHttp.onreadystatechange=function()
      {
      if(xmlHttp.readyState==4)
        {
      document.newform.spname.value=xmlHttp.responseText;
   //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
  xmlHttp.open("POST","fetch.php?sponsorid="+name,true);
    xmlHttp.send();
 }

function ajax_counter(page_to_call)
  {
  var name = document.getElementById('counter_id').value;
  //alert(name);
  var xmlHttp;
  try
    {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)
      {
      try
        {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      catch (e)
        {
        alert("Your browser does not support AJAX!");
        return false;
        }
      }
    }
    xmlHttp.onreadystatechange=function()
      {
      if(xmlHttp.readyState==4)
        {
      document.newform.counter_name.value=xmlHttp.responseText;
   //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
  xmlHttp.open("POST","fetch_counter.php?counter_id="+name,true);
    xmlHttp.send();
}



function ajax1(page_to_call)
{

var name1 = document.getElementById('country_id').value;
document.getElementById('waitsubcat').style.display="none";




var xmlHttp;
try
{
// Firefox, Opera 8.0+, Safari All
xmlHttp=new XMLHttpRequest();
}
catch (e)
{
// Internet Explorer
try
{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
}
catch (e)
{
try
{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
catch (e)
{
alert("Your browser does not support AJAX!");
return false;
}
}
}
xmlHttp.onreadystatechange=function()
{
if(xmlHttp.readyState==4)
{
document.getElementById('loadsubcat').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","getstate.php?country_id="+name1,true);
xmlHttp.send();
}

function ajax2(page_to_call)
{
var name1 = document.getElementById('state_id').value;
document.getElementById('waitspeci').style.display="none";
var xmlHttp;
try
{
// Firefox, Opera 8.0+, Safari All
xmlHttp=new XMLHttpRequest();
}
catch (e)
{
// Internet Explorer
try
{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
}
catch (e)
{
try
{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
catch (e)
{
alert("Your browser does not support AJAX!");
return false;
}
}
}
xmlHttp.onreadystatechange=function()
{
if(xmlHttp.readyState==4)
{
document.getElementById('loadspeci').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","get_district.php?state_id="+name1,true);
xmlHttp.send();
}
function ajax21(page_to_call)
  {
  var name = document.getElementById('sponsorid').value;
//alert(name);
  var xmlHttp;
  try
    {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)
      {
      try
        {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      catch (e)
        {
        alert("Your browser does not support AJAX!");
        return false;
        }
      }
    }
    xmlHttp.onreadystatechange=function()
      {
      if(xmlHttp.readyState==4)
        {
      document.newform.spname.value=xmlHttp.responseText;
   //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
  xmlHttp.open("POST","fetch.php?sponsorid="+name,true);
    xmlHttp.send();
}
function ajax_em(page_to_call)
  {
alert(hi);    
  var name = document.getElementById('plot_bkId1').value;
alert(name);
  var xmlHttp;
  try
    {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)
      {
      try
        {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      catch (e)
        {
        alert("Your browser does not support AJAX!");
        return false;
        }
      }
    }
    xmlHttp.onreadystatechange=function()
      {
      if(xmlHttp.readyState==4)
        {
      document.newform.emi.value=xmlHttp.responseText;
   //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
  xmlHttp.open("POST","fetch_emi.php?plot_bkId="+name,true);
    xmlHttp.send();
}

function ajax_remain(page_to_call)
  {
   // alert("hiii");
  var name = document.getElementById('sponsorid').value;
  var name1 = document.getElementById('plot_id1').value;
//alert(name1);
//alert(name);
  var xmlHttp;
  try
    {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)
      {
      try
        {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      catch (e)
        {
        alert("Your browser does not support AJAX!");
        return false;
        }
      }
    }
    xmlHttp.onreadystatechange=function()
      {
      if(xmlHttp.readyState==4)
        {
      document.newform.remain_amt.value=xmlHttp.responseText;
   //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
  xmlHttp.open("POST","fetch_remain.php?sponsorid="+name+"&plot_id1="+name1,true);
    xmlHttp.send();
}

function ajax21(page_to_call)
  {
  var name = document.getElementById('customer_mobile').value;
//alert(name);
  var xmlHttp;
  try
    {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)
      {
      try
        {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      catch (e)
        {
        alert("Your browser does not support AJAX!");
        return false;
        }
      }
    }
    xmlHttp.onreadystatechange=function()
      {
      if(xmlHttp.readyState==4)
        {
      document.newform.spname.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","fetch.php?customer_mobile="+name,true);
    xmlHttp.send();
}

function ajax22(page_to_call)
  {
  var name = document.getElementById('parentcustomer_id').value;
//alert(name);
  var xmlHttp;
  try
    {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)
      {
      try
        {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      catch (e)
        {
        alert("Your browser does not support AJAX!");
        return false;
        }
      }
    }
    xmlHttp.onreadystatechange=function()
      {
      if(xmlHttp.readyState==4)
        {
      document.newform.parentname.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","parentfetch.php?parentcustomer_id="+name,true);
    xmlHttp.send();
}

function ajax23(page_to_call)
  {
  var name = document.getElementById('customer_mobile').value;
//alert(name);
  var xmlHttp;
  try
    {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)
      {
      try
        {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      catch (e)
        {
        alert("Your browser does not support AJAX!");
        return false;
        }
      }
    }
    xmlHttp.onreadystatechange=function()
      {
      if(xmlHttp.readyState==4)
        {
      document.newform.mobdet.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","fetchmobile.php?customer_mobile="+name,true);
    xmlHttp.send();
}

function ajax24(page_to_call)
  {
  var name = document.getElementById('customer_mobile').value;
//alert(name);
  var xmlHttp;
  try
    {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)
      {
      try
        {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      catch (e)
        {
        alert("Your browser does not support AJAX!");
        return false;
        }
      }
    }
    xmlHttp.onreadystatechange=function()
      {
      if(xmlHttp.readyState==4)
        {
      document.newform.mobdet.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","fetchmobile1.php?customer_mobile="+name,true);
    xmlHttp.send();
}

function zajax25(page_to_call)
  {
  var name = document.getElementById('sponsor').value;
  //alert(name);
  var xmlHttp;
  try
    {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)
      {
      try
        {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      catch (e)
        {
        alert("Your browser does not support AJAX!");
        return false;
        }
      }
    }
    xmlHttp.onreadystatechange=function()
      {
      if(xmlHttp.readyState==4)
        {
      document.newform.sponsor_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","fetchname.php?sponsor="+name,true);
    xmlHttp.send();
}

