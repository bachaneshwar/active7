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

function majax2(page_to_call)
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

function majax3(page_to_call)
{
var name1 = document.getElementById('district_id').value;
document.getElementById('waitspeci1').style.display="none";
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
document.getElementById('loadspeci1').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","get_area.php?district_id="+name1,true);
xmlHttp.send();
}



function ajax2(page_to_call)
  {
  var name = document.getElementById('employee_code').value;
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
      document.newform.employee_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","employee_fetch.php?employee_code="+name,true);
    xmlHttp.send();
}



function ajax3(page_to_call)
  {
  var name = document.getElementById('manufacturer_code').value;
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
      document.newform.company_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","manufacturer_fetch.php?manufacturer_code="+name,true);
    xmlHttp.send();
}


function najax4(page_to_call)
{
var name1 = document.getElementById('manufacturer_code').value;
document.getElementById('show').style.display="none";
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
document.getElementById('display').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","getcategory.php?manufacturer_code="+name1,true);
xmlHttp.send();
}


function ajax4(page_to_call)
{
var name1 = document.getElementById('category_id').value;
document.getElementById('show1').style.display="none";
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
document.getElementById('display1').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","getsub_category.php?category_id="+name1,true);
xmlHttp.send();
}

function ajax5(page_to_call)
  {
  var name = document.getElementById('product_code').value;
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
      document.newform.product_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","product_name.php?product_code="+name,true);
    xmlHttp.send();
}

function ajax6(page_to_call)
  {
  var name = document.getElementById('product_code').value;
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
      document.newform.product_volume.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","product_volume.php?product_code="+name,true);
    xmlHttp.send();
}

function ajax7(page_to_call)
  {
  var name = document.getElementById('warehouse_code').value;
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
      document.newform.location.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","warehouse_location.php?warehouse_code="+name,true);
    xmlHttp.send();
}

function ajax8(page_to_call)
  {
  var name = document.getElementById('product_code').value;
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
      document.newform.product_cp.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","product_cost.php?product_code="+name,true);
    xmlHttp.send();
}

function ajax9(page_to_call)
  {
  var name = document.getElementById('product_code').value;
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
      document.newform.product_gst.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","product_gst.php?product_code="+name,true);
    xmlHttp.send();
}

function ajax10(page_to_call)
  {
  var name = document.getElementById('product_code').value;
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
      document.newform.company_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","manufacturer_company.php?product_code="+name,true);
    xmlHttp.send();
}

function ajax11(page_to_call)
  {
  var name = document.getElementById('product_code').value;
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
      document.newform.address.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","manufacturer_address.php?product_code="+name,true);
    xmlHttp.send();
}

function ajax12(page_to_call)
  {
  var name = document.getElementById('product_code').value;
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
      document.newform.authorised_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","manufacturer_person.php?product_code="+name,true);
    xmlHttp.send();
}

function ajax13(page_to_call)
  {
  var name = document.getElementById('employee_code').value;
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
      document.newform.employee_mobile.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","employee_mobile.php?employee_code="+name,true);
    xmlHttp.send();
}

function ajax14(page_to_call)
  {
  var name = document.getElementById('warehouse_code').value;
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
      document.newform.address.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","warehouse_address.php?warehouse_code="+name,true);
    xmlHttp.send();
}

function ajax15(page_to_call)
  {
  var name = document.getElementById('warehouse_code').value;
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
      document.newform.inchg_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","inchg_name.php?warehouse_code="+name,true);
    xmlHttp.send();
}

function ajax16(page_to_call)
  {
  var name = document.getElementById('warehouse_code').value;
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
      document.newform.inchg_mobile.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","inchg_mobile.php?warehouse_code="+name,true);
    xmlHttp.send();
}

function ajax17(page_to_call)
{
var name1 = document.getElementById('city_id').value;
document.getElementById('show2').style.display="none";
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
document.getElementById('display2').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","getarea.php?city_id="+name1,true);
xmlHttp.send();
}  

function ajax18()
{
var name1 = document.getElementById('cp_dob').value;
//alert(name1);
//alert(name2);
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
//document.form1.sname.value=xmlHttp.responseText;
document.getElementById('loader').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","age_check.php?cp_dob="+name1,true);
xmlHttp.send();
}

function ajax19(page_to_call)
  {
  var name = document.getElementById('cpreferral_id').value;
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
      document.newform.cpreferral_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","cp_into_fetch.php?cpreferral_id="+name,true);
    xmlHttp.send();
}

function ajax20(page_to_call)
{
var name1 = document.getElementById('cpreferral_id').value;
document.getElementById('show3').style.display="none";
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
document.getElementById('display3').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","getcp_cat.php?cpreferral_id="+name1,true);
xmlHttp.send();
}

function ajax21(page_to_call)
  {
  var name = document.getElementById('cp_code').value;
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
      document.newform.cp_mobile.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","cp_mobile.php?cp_code="+name,true);
    xmlHttp.send();
}

function ajax22(page_to_call)
  {
  var name = document.getElementById('cp_code').value;
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
      document.newform.cp_email.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","cp_email.php?cp_code="+name,true);
    xmlHttp.send();
}

function ajax23(page_to_call)
  {
  var name = document.getElementById('cp_code').value;
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
      document.newform.cp_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","cp_name.php?cp_code="+name,true);
    xmlHttp.send();
}

function ajax24(page_to_call)
  {
  var name = document.getElementById('cp_code').value;
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
      document.newform.cp_cat_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","cp_cat_name.php?cp_code="+name,true);
    xmlHttp.send();
}
   
 function ajax25(page_to_call)
  {
  var name = document.getElementById('cp_code').value;
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
      document.newform.intro_code.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","intro_code.php?cp_code="+name,true);
    xmlHttp.send();
}  

function ajax26(page_to_call)
  {
  var name = document.getElementById('cp_code').value;
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
      document.newform.intro_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","intro_name.php?cp_code="+name,true);
    xmlHttp.send();
}

function ajax27(page_to_call)
  {
  var name = document.getElementById('cp_code').value;
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
      document.newform.intro_cat_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","intro_cat_name.php?cp_code="+name,true);
    xmlHttp.send();
}

function ajax28(page_to_call)
  {
  var name = document.getElementById('desire_code').value;
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
      document.newform.desire_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","desire_intro_name.php?desire_code="+name,true);
    xmlHttp.send();
}
   
function ajax29(page_to_call)
  {
  var name = document.getElementById('desire_code').value;
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
      document.newform.desire_cat_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","desire_cat_name.php?desire_code="+name,true);
    xmlHttp.send();
}   


function ajax30(page_to_call)
  {
  var name = document.getElementById('referral_code').value;
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
      document.newform.referral_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","cons_into_fetch.php?referral_code="+name,true);
    xmlHttp.send();
}

function ajax31(page_to_call)
{
var name1 = document.getElementById('referral_code').value;
document.getElementById('show3').style.display="none";
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
document.getElementById('display3').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","getcons_level.php?referral_code="+name1,true);
xmlHttp.send();
}

function sajax31(page_to_call)
{
var name1 = document.getElementById('referral_code').value;
document.getElementById('show3').style.display="none";
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
document.getElementById('display3').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","getcons_level1.php?referral_code="+name1,true);
xmlHttp.send();
}



function checkage(page_to_call)
  {
  var name = document.getElementById('consumer_dob').value;
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
      document.newform.consumer_age.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","cons_age_check.php?consumer_dob="+name,true);
    xmlHttp.send();
}

function ajax32(page_to_call)
{
var name1 = document.getElementById('billno').value;
//alert(name);
//document.getElementById('show3').style.display="none";
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
document.getElementById('bill_dtls').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","bill_no_chk.php?billno="+name1,true);
xmlHttp.send();
}

function ajax33(page_to_call)
  {
  var name = document.getElementById('billno').value;
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
      document.newform.billnum.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","billnum.php?billno="+name,true);
    xmlHttp.send();
}
   
 function ajax34(page_to_call)
  {
  var name = document.getElementById('billno').value;
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
      document.newform.available_join.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","available_join.php?billno="+name,true);
    xmlHttp.send();
}  

function ajax35(page_to_call)
  {
  var name = document.getElementById('referral_code').value;
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
      document.newform.introducer_code.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","cons_intoducer_code.php?referral_code="+name,true);
    xmlHttp.send();
}

function ajax36(page_to_call)
  {
  var name = document.getElementById('referral_code').value;
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
      document.newform.introducer_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","cons_intoducer_name.php?referral_code="+name,true);
    xmlHttp.send();
}

function ajax37(page_to_call)
  {
  var name = document.getElementById('referral_code').value;
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
      document.newform.present_level.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","cons_intoducer_level.php?referral_code="+name,true);
    xmlHttp.send();
}

function ajax38(page_to_call)
  {
  var name = document.getElementById('referral_code').value;
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
      document.newform.consumer_pan.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","consumer_pan.php?referral_code="+name,true);
    xmlHttp.send();
}

function ajax39(page_to_call)
  {
  var name = document.getElementById('company_bank').value;
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
      document.newform.bank_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","bank_name_dtls.php?company_bank="+name,true);
    xmlHttp.send();
}

function ajax40(page_to_call)
  {
  var name = document.getElementById('company_bank').value;
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
      document.newform.branch_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","bank_branch_dtls.php?company_bank="+name,true);
    xmlHttp.send();
}

function ajax41(page_to_call)
  {
  var name = document.getElementById('company_bank').value;
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
      document.newform.account_number.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","bank_accno_dtls.php?company_bank="+name,true);
    xmlHttp.send();
}

function ajax42(page_to_call)
  {
  var name = document.getElementById('company_bank').value;
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
      document.newform.ifsc_code.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","bank_ifsc_dtls.php?company_bank="+name,true);
    xmlHttp.send();
}

function ajax43(page_to_call)
  {
   //alert("hello");
  var name = document.getElementById('cp_code').value;
 // alert(name);
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
      document.newform.cp_company_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","cp_company_name.php?cp_code="+name,true);
    xmlHttp.send();
}

function ajax44(page_to_call)
  {
  var name = document.getElementById('cp_code').value;
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
      document.newform.cp_address.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","cp_address.php?cp_code="+name,true);
    xmlHttp.send();
}

function ajax45(page_to_call)
  {
  var name = document.getElementById('cp_code').value;
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
      document.newform.cp_area.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","cp_area.php?cp_code="+name,true);
    xmlHttp.send();
}

function fetchsubcat(val)
   {
	  var done_mat_code=document.getElementById("done_mat_code").value;
	   var curval=document.getElementById(val).value;
	   var last=val.substr(12, 12);
	  var plt="category_id"+last;
	  var category_id=document.getElementById(plt).value;
	   if(category_id=="")
	  {
	  alert("Please Select Category first.");
	  return false;
	  }
      window.open('fsubcategory.php?ftid='+val+'&done_mat_code='+done_mat_code+'&curval='+curval+'&category_id='+category_id,'View','height=500, width=700 pro_st=1, resizable=1, scrollbars=1,screenX=200px,screenY=100px')
   }

function fetchproduct(val)
   {
	  var done_mat_code=document.getElementById("done_mat_code").value;
	   var curval=document.getElementById(val).value;
	   var last=val.substr(7,7);
	  var plt="sub_categoryId"+last;
	  var sub_categoryId=document.getElementById(plt).value;
	   if(sub_categoryId=="")
	  {
	  alert("Please Select Sub Category first.");
	  return false;
	  }
      window.open('fetchproduct.php?ftid='+val+'&done_mat_code='+done_mat_code+'&curval='+curval+'&sub_categoryId='+sub_categoryId,'View','height=500, width=700 pro_st=1, resizable=1, scrollbars=1,screenX=200px,screenY=100px')
   }
   
   function fetchproduct1(val)
   {
	  var done_pcode=document.getElementById("done_pcode").value;
	  var warehouse_code=document.getElementById("warehouse_code").value;
	  var location=document.getElementById("location").value;

	  var curval=document.getElementById(val).value;
	  var last=val.substr(7,7);
	  var plt="sub_categoryId"+last;
	  var sub_categoryId=document.getElementById(plt).value;
	    if(warehouse_code=="")
	  {
	 alert("Please Enter Warehouse ID");
	 document.getElementById("warehouse_code").focus(); 
	 return false;
	  }
	  if(location=="")
	  {
	 alert("Please Enter Correct Warehouse ID");
	 document.getElementById("warehouse_code").focus(); 
	 return false;
	  }
	   if(sub_categoryId=="")
	  {
	  alert("Please Select Sub Category first.");
	  return false;
	  }
      window.open('fetchproduct1.php?ftid='+val+'&done_pcode='+done_pcode+'&curval='+curval+'&sub_categoryId='+sub_categoryId,'View','height=500, width=700 pro_st=1, resizable=1, scrollbars=1,screenX=200px,screenY=100px')
   }
  
function free_cal(val)
{

var warehouse_code=document.getElementById("warehouse_code").value;
var curval=document.getElementById(val).value;
var last=val.substr(13,13);
var plt="product"+last;
var qtydtls="free_quantity"+last;
var qty=0;
var product=document.getElementById(plt).value;


if(warehouse_code=="")
{
alert("Please Enter Warehouse ID");
document.getElementById("warehouse_code").focus(); 
return false;
}
if(location=="")
{
alert("Please Enter Correct Warehouse ID");
document.getElementById("warehouse_code").focus(); 
return false;
}

if(product=="")
{
alert("Please Select Product first.");
document.getElementById(qtydtls).value=0;
}

qty=parseFloat(document.getElementById(qtydtls).value);

if(qty>0)
{

var xmlHttp;
try
{

xmlHttp=new XMLHttpRequest();
}
catch (e)
{

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
if(xmlHttp.responseText==1)
{
alert("Invalid quantity, check current free stock.");
document.getElementById(qtydtls).value="";
}
}
}
var str="fcomparestock.php?product="+product+"&qty="+qty+"&whcode="+warehouse_code;
xmlHttp.open("POST",str,true);
xmlHttp.send(null);
}

}   
  
  
  
function gross_cal(val)
{

var warehouse_code=document.getElementById("warehouse_code").value;
var location=document.getElementById("location").value;
var curval=document.getElementById(val).value;
var last=val.substr(14,14);
var plt="product"+last;
var pmrp="productMrp"+last;
var gross="gross"+last;
var qtydtls="entry_quantity"+last;
var val1=0,qty=0,mrp=0,value=0,totalamt=0,finalamt=0;
var product=document.getElementById(plt).value;
totalamt=parseFloat(document.getElementById("total_amt").value);

if(warehouse_code=="")
{
alert("Please Enter Warehouse ID");
document.getElementById("warehouse_code").focus(); 
return false;
}
if(location=="")
{
alert("Please Enter Correct Warehouse ID");
document.getElementById("warehouse_code").focus(); 
return false;
}

if(product=="")
{
alert("Please Select Product first.");
document.getElementById(qtydtls).value=0;
}


qty=parseFloat(document.getElementById(qtydtls).value);
if(!isNaN(qty)) {
val1 = qty;
}else{
val1 = 0;
document.getElementById(gross).value = 0;
}


mrp=parseFloat(document.getElementById(pmrp).value);
value = parseFloat(qty*mrp);
if(isNaN(value)) {value = 0;}



if(qty>0)
{

var xmlHttp;
try
{

xmlHttp=new XMLHttpRequest();
}
catch (e)
{

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
if(xmlHttp.responseText==1)
{
alert("Invalid quantity, check current stock.");
document.getElementById(qtydtls).value="";
document.getElementById(gross).value = 0;
}else{
document.getElementById(gross).value = value;

var gval = parseFloat(document.getElementById(gross).value);
finalamt=parseFloat(gval+totalamt);
//alert(finalamt);
document.getElementById(total_amt).value = finalamt;

}


}
}
var str="comparestock.php?product="+product+"&qty="+qty+"&whcode="+warehouse_code;
xmlHttp.open("POST",str,true);
xmlHttp.send(null);
}

}  

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function fetchproduct2(val)
   {
	  var done_pcode=document.getElementById("done_pcode").value;
	  var transfer_code=document.getElementById("transfer_code").value;
	  var location=document.getElementById("transfer_name").value;

	  var curval=document.getElementById(val).value;
	  var last=val.substr(7,7);
	  var plt="sub_categoryId"+last;
	  var sub_categoryId=document.getElementById(plt).value;
	    if(transfer_code=="")
	  {
	 alert("Please Enter Transferred From ID");
	 document.getElementById("transfer_code").focus(); 
	 return false;
	  }
	  if(location=="")
	  {
	 alert("Please Enter Correct Transferred From ID");
	 document.getElementById("transfer_code").focus(); 
	 return false;
	  }
	   if(sub_categoryId=="")
	  {
	  alert("Please Select Sub Category first.");
	  return false;
	  }
      window.open('fetchproduct1.php?ftid='+val+'&done_pcode='+done_pcode+'&curval='+curval+'&sub_categoryId='+sub_categoryId,'View','height=500, width=700 pro_st=1, resizable=1, scrollbars=1,screenX=200px,screenY=100px')
   }


    
  
 function cp_free_cal(val)
{

var transfer_code=document.getElementById("transfer_code").value;
var curval=document.getElementById(val).value;
var last=val.substr(13,13);
var plt="product"+last;
var qtydtls="free_quantity"+last;
var qty=0;
var product=document.getElementById(plt).value;


if(transfer_code=="")
{
alert("Please Enter Transferred From ID");
document.getElementById("transfer_code").focus(); 
return false;
}
if(location=="")
{
alert("Please Enter Correct Transferred From ID");
document.getElementById("transfer_code").focus(); 
return false;
}

if(product=="")
{
alert("Please Select Product first.");
document.getElementById(qtydtls).value=0;
}

qty=parseFloat(document.getElementById(qtydtls).value);

if(qty>0)
{

var xmlHttp;
try
{

xmlHttp=new XMLHttpRequest();
}
catch (e)
{

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
if(xmlHttp.responseText==1)
{
alert("Invalid quantity, check current free stock.");
document.getElementById(qtydtls).value="";
}
}
}
var str="cpfcomparestock.php?product="+product+"&qty="+qty+"&whcode="+transfer_code;
xmlHttp.open("POST",str,true);
xmlHttp.send(null);
}

}



function cp_gross_cal(val)
{

var transfer_code=document.getElementById("transfer_code").value;
var location=document.getElementById("transfer_name").value;
var curval=document.getElementById(val).value;
var last=val.substr(14,14);
var plt="product"+last;
var pmrp="productMrp"+last;
var gross="gross"+last;
var qtydtls="entry_quantity"+last;
var val1=0,qty=0,mrp=0,value=0,totalamt=0,finalamt=0;
var product=document.getElementById(plt).value;
totalamt=parseFloat(document.getElementById("total_amt").value);

if(transfer_code=="")
{
alert("Please Enter Transferred From ID");
document.getElementById("transfer_code").focus(); 
return false;
}
if(location=="")
{
alert("Please Enter Correct Transferred From ID");
document.getElementById("transfer_code").focus(); 
return false;
}

if(product=="")
{
alert("Please Select Product first.");
document.getElementById(qtydtls).value=0;
}


qty=parseFloat(document.getElementById(qtydtls).value);
if(!isNaN(qty)) {
val1 = qty;
}else{
val1 = 0;
document.getElementById(gross).value = 0;
}


mrp=parseFloat(document.getElementById(pmrp).value);
value = parseFloat(qty*mrp);
if(isNaN(value)) {value = 0;}



if(qty>0)
{

var xmlHttp;
try
{

xmlHttp=new XMLHttpRequest();
}
catch (e)
{

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
if(xmlHttp.responseText==1)
{
alert("Invalid quantity, check current stock.");
document.getElementById(qtydtls).value="";
document.getElementById(gross).value = 0;
}else{
document.getElementById(gross).value = value;

var gval = parseFloat(document.getElementById(gross).value);
finalamt=parseFloat(gval+totalamt);
//alert(finalamt);
document.getElementById(total_amt).value = finalamt;

}


}
}
var str="cpcomparestock.php?product="+product+"&qty="+qty+"&whcode="+transfer_code;
xmlHttp.open("POST",str,true);
xmlHttp.send(null);
}

}   
  

   
   
   
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



function ajax46(page_to_call)
  {
  var name = document.getElementById('company_bank_id').value;
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
      document.newform.branch_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","branch_fetch.php?company_bank_id="+name,true);
    xmlHttp.send();
}

function ajax47(page_to_call)
  {
  var name = document.getElementById('transfer_code').value;
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
      document.newform.transfer_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","transfer_name_fetch.php?transfer_code="+name,true);
    xmlHttp.send();
}

function ajax48(page_to_call)
  {
  var name = document.getElementById('transfer_code').value;
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
      document.newform.transfer_location.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","transfer_area_fetch.php?transfer_code="+name,true);
    xmlHttp.send();
}

function ajax49(page_to_call)
  {
  var name = document.getElementById('retailer_code').value;
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
      document.newform.retailer_name.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","retailer_name_fetch.php?retailer_code="+name,true);
    xmlHttp.send();
}

 function ajax50(page_to_call)
{
var name1 = document.getElementById('consumer_code').value;
document.getElementById('show1').style.display="none";
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
document.getElementById('display1').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","consumer_name.php?consumer_code="+name1,true);
xmlHttp.send();
}  
   
   
function ajax51(page_to_call)
{
var name1 = document.getElementById('period_id').value;
var name2 = document.getElementById('cp_cat_id').value;
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
document.getElementById('display').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","cp_reward_fetch.php?period_id="+name1+"&cp_cat_id="+name2,true);
xmlHttp.send();
}   
   
   
function ajax52(page_to_call)
{
var name1 = document.getElementById('period_id').value;
var name2 = document.getElementById('reward_type_id').value;
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
document.getElementById('display').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","consumer_reward_fetch.php?period_id="+name1+"&reward_type_id="+name2,true);
xmlHttp.send();
}   

function ajax32(page_to_call)
{
var name1 = document.getElementById('billno').value;
//alert(name);
//document.getElementById('show3').style.display="none";
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
document.getElementById('bill_dtls').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","bill_no_chk.php?billno="+name1,true);
xmlHttp.send();
}


function ajax53()
{
	
alert("hi");/*
var name1 = document.getElementById('consumer_mobile').value;
alert(name1);
//document.getElementById('show3').style.display="none";
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
document.getElementById('mob_check').innerHTML = xmlHttp.responseText;
}
}
xmlHttp.open("POST","mobile_no_chk.php?mobileno="+name1,true);
xmlHttp.send();*/
}
   
   
   

function mobile_check(page_to_call)
  {
	 // alert("hi");
  var name = document.getElementById('mobile_no').value;
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
      document.newform.mobile_chk.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","mobile_no_chk.php?mobile_no="+name,true);
    xmlHttp.send();
}   

function mobile_check1(page_to_call)
  {
	 // alert("hi");
  var name = document.getElementById('mobile_no1').value;
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
      document.newform.mobile_chk.value=xmlHttp.responseText;
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","mobile_no_chk1.php?mobile_no="+name,true);
    xmlHttp.send();
}   


function intowords(page_to_call)
  {
	 // alert("hi");
  var name = document.getElementById('voucher_amt').value;
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
      //document.newform.mobile_chk.value=xmlHttp.responseText;
	 document.getElementById('amtinwords').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","into_words.php?amt="+name,true);
    xmlHttp.send();
}   

function product_check(page_to_call)
  {
	 //alert("hi");
  var name = document.getElementById('product_code').value;
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
	//alert(xmlHttp.responseText);
      //document.newform.product_chk.value=xmlHttp.responseText;
	  document.getElementById('product_chk').value=xmlHttp.responseText;
	  
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","product_chk.php?product_code="+name,true);
    xmlHttp.send();
}   

function qty_check(page_to_call)
  {
	 //alert("hi");
  var qty = document.getElementById('qty').value;
  var product_code = document.getElementById('product_code').value;
  var retailer_code = document.getElementById('retailer_code').value;


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
	//alert(xmlHttp.responseText);
	  document.getElementById('qty_chk').value=xmlHttp.responseText;
	  
	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","quantity_chk.php?qty="+qty+"&rcode="+retailer_code+"&pcode="+product_code,true);
    xmlHttp.send();
} 

function ajaxr(page_to_call)
  {
  var name = document.getElementById('employee_code').value;
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
	//alert(xmlHttp.responseText);
	var mystr = xmlHttp.responseText;
	var myarr = mystr.split(":");
	document.newform.employee_name.value=myarr[0];
	document.newform.employee_designation.value=myarr[1];

	 //document.getElementById('loader').innerHTML = xmlHttp.responseText;
       }
      }
	xmlHttp.open("POST","employee_fetch1.php?employee_code="+name,true);
    xmlHttp.send();
}  