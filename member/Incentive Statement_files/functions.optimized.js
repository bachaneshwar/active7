function RegisterNotificationScripts()
{$(function(){$(".close-message").click(function(){$(".error-text").fadeOut("slow",function(){$(this).remove();});$(".success-text").fadeOut("slow",function(){$(this).remove();});$(".alert-text").fadeOut("slow",function(){$(this).remove();});});});}
function fnHideSuccessMsg()
{$(".success-text").fadeOut("slow",function(){$(this).remove();});}
function fnHideErrorMsg()
{$(".error-text").fadeOut("slow",function(){$(this).remove();});}
function fnHideAlertMsg()
{$(".alert-text").fadeOut("slow",function(){$(this).remove();});}
function round_decimals(original_number,decimals){var result1=original_number*Math.pow(10,decimals)
var result2=Math.round(result1)
var result3=result2/Math.pow(10,decimals)
return pad_with_zeros(result3,decimals)}
function pad_with_zeros(rounded_value,decimal_places){var value_string=rounded_value.toString()
var decimal_location=value_string.indexOf(".")
if(decimal_location==-1){decimal_part_length=0
value_string+=decimal_places>0?".":""}
else{decimal_part_length=value_string.length-decimal_location-1}
var pad_total=decimal_places-decimal_part_length
if(pad_total>0){for(var counter=1;counter<=pad_total;counter++)
value_string+="0"}
return value_string}
function InStr(strSearch,charSearchFor)
{for(i=0;i<strSearch.length;i++)
{if(charSearchFor==Mid(strSearch,i,1))
{return i;}}
return-1;}
function testForObject(Id,Tag)
{var o=document.getElementById(Id);if(o)
{if(Tag)
{if(o.tagName.toLowerCase()==Tag.toLowerCase())
{return o;}}
else
{return o;}}
return null;}
function getSelectedRadio(buttonGroup){if(buttonGroup[0]){for(var i=0;i<buttonGroup.length;i++){if(buttonGroup[i].checked){return i}}}else{if(buttonGroup.checked){return 0;}}
return-1;}
function getSelectedRadioValue(buttonGroup){var i=getSelectedRadio(buttonGroup);if(i==-1){return"";}else{if(buttonGroup[i]){return buttonGroup[i].value;}else{return buttonGroup.value;}}}
function getSelectedCheckbox(buttonGroup){var retArr=new Array();var lastElement=0;if(buttonGroup[0]){for(var i=0;i<buttonGroup.length;i++){if(buttonGroup[i].checked){retArr.length=lastElement;retArr[lastElement]=i;lastElement++;}}}else{if(buttonGroup.checked){retArr.length=lastElement;retArr[lastElement]=0;}}
return retArr;}
function getSelectedCheckboxValue(buttonGroup){var retArr=new Array();var selectedItems=getSelectedCheckbox(buttonGroup);if(selectedItems.length!=0){retArr.length=selectedItems.length;for(var i=0;i<selectedItems.length;i++){if(buttonGroup[selectedItems[i]]){retArr[i]=buttonGroup[selectedItems[i]].value;}else{retArr[i]=buttonGroup.value;}}}
return retArr;}
{}
function createCookie(name,value,days){if(days){var date=new Date();date.setTime(date.getTime()+(days*24*60*60*1000));var expires="; expires="+date.toGMTString();}
else var expires="";document.cookie=name+"="+value+expires+"; path=/";}
function readCookie(name){var nameEQ=name+"=";var ca=document.cookie.split(';');for(var i=0;i<ca.length;i++){var c=ca[i];while(c.charAt(0)==' ')c=c.substring(1,c.length);if(c.indexOf(nameEQ)==0)return c.substring(nameEQ.length,c.length);}
return null;}
function eraseCookie(name){createCookie(name,"",-1);}
function show(ele,cssclass)
{if(!cssclass){cssclass='';}
cssclass=trimString(cssclass);var srcElement=document.getElementById(ele);if(srcElement!=null)
{if(cssclass=='')
{srcElement.className="display-block";}
else
{srcElement.className=cssclass;}
return false;}}
function hide(ele)
{var srcElement=document.getElementById(ele);if(srcElement!=null)
{srcElement.className="display-none";return false;}}
var ListUtil=new Object();ListUtil.add=function(oListbox,sName,sValue)
{var oOption=document.createElement("option");oOption.appendChild(document.createTextNode(sName));if(arguments.length==3)
{oOption.setAttribute("value",sValue);}
oListbox.appendChild(oOption);}
ListUtil.remove=function(oListbox,iIndex){oListbox.remove(iIndex);}
ListUtil.clear=function(oListbox)
{for(var i=oListbox.options.length-1;i>=0;i--)
{ListUtil.remove(oListbox,i);}}
function focusbg(obj)
{obj.style.backgroundColor='#ffd';obj.style.color='black';}
function normalbg(obj)
{obj.style.backgroundColor='white';obj.style.color='black';}
function fnTextCounter(field,countfield,maxlimit)
{var srcElement=field;var destElement=countfield;if((+srcElement.value.length)>(+maxlimit))
{srcElement.value=srcElement.value.substring(0,maxlimit);destElement.value=(+maxlimit)-(+srcElement.value.length);}
else
{destElement.value=(+maxlimit)-(+srcElement.value.length);}}
function textCounter(field,countfield,maxlimit)
{if(field.value.length>maxlimit)
{field.value=field.value.substring(0,maxlimit);}
else
{countfield.value=maxlimit-field.value.length;}}
function isNumeric(obj)
{var val=trimString(obj.value);var len=val.length;if(val.match(/^[0-9,]+$/))
{for(j=0;j<=len;j=j+1)
{if((val.charAt(j))==".")
{obj.value=val.replace('.','');}}
return true;}
else
{return false;}}
function isName(obj)
{var val=trimString(obj.value);if(val.match(/^[a-zA-Z'' '.]+$/))
{return true;}
else
{return false;}}
function isCompany(obj)
{var val=trimString(obj.value);if(val.match(/^[a-z0-9A-Z'' '-]+$/))
{return true;}
else
{return false;}}
function isAddress(obj)
{var val=trimString(obj.value);if(val.match(/^[a-zA-Z0-9'' ',/.-]+$/))
{return true;}
else
{return false;}}
function isAlphabetic(obj)
{var val=trimString(obj.value);if(val.match(/^[a-zA-Z' ']+$/))
{return true;}
else
{return false;}}
function isAlphaNumeric(obj)
{var val=trimString(obj.value);if(val.match(/^[a-zA-Z0-9' ']+$/))
{return true;}
else
{return false;}}
function isMobile(obj)
{obj.value=trimString(obj.value);var mobile=obj.value;var moblen=obj.value.length;if(isNaN(mobile)==true)
{alert("Invalid Mobile No!");obj.focus();return false;}
var iszero=mobile.charAt(0);if((+iszero)==0)
{obj.value=mobile.replace(iszero,'');obj.focus();return false;}
if((+iszero)!=9)
{alert("Mobile No. should start with 9!");obj.focus();return false;}
for(j=0;j<=moblen;j=j+1)
{if((mobile.charAt(j))==".")
{alert("Decimal not allowed!");obj.value=mobile.replace('.','');obj.focus();return false;}}
if((+moblen)!=10)
{alert("Mobile No. should be 10 digits long");obj.focus();return false;}}
function doBlink(){var blink=document.all.tags("BLINK")
for(var i=0;i<blink.length;i++)
blink[i].style.visibility=blink[i].style.visibility==""?"hidden":""}
function startBlink(){if(document.all)
setInterval("doBlink()",2000)}
function capitalizeMe(obj)
{singlespace(obj);var val=obj.value.toLowerCase();var newVal='';val=val.split(' ');for(var c=0;c<val.length;c++)
{newVal+=val[c].substring(0,1).toUpperCase()+val[c].substring(1,val[c].length)+' ';}
obj.value=trimString(newVal);}
function singlespace(obj)
{var str=obj.value;var regEx=new RegExp('  ','gi');str=str.replace(regEx,' ');obj.value=str;}
var win=null;function winpopup(mypage,myname,w,h,pos,infocus,scrollbr)
{if(pos=="random"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
else if((pos!='center'&&pos!="random")||pos==null){myleft=0;mytop=20}
settings="width="+w+",height="+h+",top="+mytop+",left="+myleft+",scrollbars="+scrollbr+",location=no,directories=no,status=yes,menubar=no,toolbar=no,resizable=yes";win=window.open(mypage,myname,settings);win.focus();}
function winpopupresize(mypage,myname,w,h,pos,infocus,scrollbr,resize)
{if(pos=="random"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
else if((pos!='center'&&pos!="random")||pos==null){myleft=0;mytop=20}
settings="width="+w+",height="+h+",top="+mytop+",left="+myleft+",scrollbars="+scrollbr+",location=no,directories=no,status=yes,menubar=no,toolbar=no,resizable="+resize;win=window.open(mypage,myname,settings);win.focus();}
function popupwin(name,width,height,scrollbars)
{var w=width;var h=height;var t=(screen.height-h)/2
var l=(screen.width-w)/2
NewWin=window.open(''+name+'','NewWin','toolbar=no,status=no, width='+w+',height='+h+', scrollbars='+scrollbars+' ,left='+l+',top='+t+'');}
function daysBetween(date1,date2)
{var DSTAdjust=0;oneMinute=1000*60;var oneDay=oneMinute*60*24;date1.setHours(0);date1.setMinutes(0);date1.setSeconds(0);date2.setHours(0);date2.setMinutes(0);date2.setSeconds(0);if(date2>date1){DSTAdjust=(date2.getTimezoneOffset()-date1.getTimezoneOffset())*oneMinute;}else{DSTAdjust=(date1.getTimezoneOffset()-date2.getTimezoneOffset())*oneMinute;}
var diff=Math.abs(date2.getTime()-date1.getTime())-DSTAdjust;return Math.ceil(diff/oneDay);}
function DateDifference(dateA,dateB)
{var l1=dateA.length;var l2=dateB.length;if(l1==10)
{var d1=dateA.substr(0,2);var m1=dateA.substr(3,2);var y1=dateA.substr(6,4);}
if(l2==10)
{var d2=dateB.substr(0,2);var m2=dateB.substr(3,2);var y2=dateB.substr(6,4);}
var lwr_date=new Date(dateA);var gtr_date=new Date(dateB);var lwr_dateD=lwr_date.getDate();var lwr_dateM=lwr_date.getMonth();lwr_dateM++;var lwr_dateY=lwr_date.getFullYear();var gtr_dateD=gtr_date.getDate();var gtr_dateM=gtr_date.getMonth();gtr_dateM++;var gtr_dateY=gtr_date.getFullYear();if(gtr_dateY>=lwr_dateY)
{if(gtr_dateY>lwr_dateY)
{gtr_dateM=gtr_dateM+12;}
if(gtr_dateM>=lwr_dateM)
{if(gtr_dateY>lwr_dateY)
{gtr_dateD=gtr_dateD+30;}
if(gtr_dateD>=lwr_dateD)
{return true;}
else
{return false;}}
else
{return false;}}
else
{return false;}}
function getDateObject(dateString,dateSeperator)
{var curValue=dateString;var sepChar=dateSeperator;var curPos=0;var cDate,cMonth,cYear;curPos=dateString.indexOf(sepChar);cDate=dateString.substring(0,curPos);endPos=dateString.indexOf(sepChar,curPos+1);cMonth=dateString.substring(curPos+1,endPos);curPos=endPos;endPos=curPos+5;cYear=curValue.substring(curPos+1,endPos);dtObject=new Date(cYear,cMonth,cDate);return dtObject;}
function trimString(str)
{str=this!=window?this:str;return str.replace(/^\s+/g,'').replace(/\s+$/g,'');}
function mywin(url)
{var newwin
newwin=window.open(url,'newwin');}
function IsValidNumber(Num,precision,scale)
{var Number
Number=trim(Num)
if(trim(Number)=="")
return false;if(isNaN(Number)==true)
return false;if(Number.split(".").length>2)
return false;if(Number.indexOf(".")>0)
{if((Number.split(".")[0]).length>precision)
return false;if((Number.split(".")[1]).length>scale)
return false;return true;}
else
{if(Number.length>precision)
return false;else
return true;}}
function ValidPercent(dblNum,intDigitsBeforeDecimal,intDigitsAfterDecimal)
{if(IsValidNumber(dblNum,intDigitsBeforeDecimal,intDigitsAfterDecimal)==true)
{if(dblNum<=0)
return false;else
return true;}
else
return false;}
function trim(st)
{var len=st.length;var begin=0,end=len-1;while(st.charAt(begin)==" "&&begin<len)
{begin++;}
while(st.charAt(end)==" "&&begin<end)
{end--;}
return st.substring(begin,end+1);}
function IsValidDate(strDate)
{var year,month,day,strSep,i;for(i=0;i<strDate.length;i++)
{if(strDate.charAt(i)=="/"||strDate.charAt(i)=="-")
{strSep=strDate.charAt(i)
break;}}
day=strDate.split(strSep)[0];month=strDate.split(strSep)[1];year=strDate.split(strSep)[2];var months=new Array(31,28,31,30,31,30,31,31,30,31,30,31);if(year%4==0)
{months[1]=29;}
if(isNaN(day)||isNaN(month)||isNaN(year))
{return false;}
if(day.length==2||day.length==1)
{}
else
{return false;}
if(month.length==2||month.length==1)
{}
else
{return false;}
if(year.length==4)
{if(((+year)>=1900)&&((+year)<=2080))
{}
else
{return false;}}
else
{return false;}
if(month>12||month<1)
{return false;}
if(day<1||day>months[month-1])
{return false;}
for(var i=1;i<=strDate.length;i++)
{if(!((i==3)||(i==6)))
{num=strDate.substring(i,i-1)
if(isNaN(num)==true)
{return false;}}
if(((i==3)||(i==6)))
{if(strDate.substring(i,i-1)!=strSep)
{return false;}}}
if((strDate.charAt(8)=="/")||(strDate.charAt(10)=="/"))
{return false;}
if((strDate.charAt(2)=="/")&&(strDate.charAt(5)=="/"))
{}
else
{if((strDate.charAt(2)=="-")||(strDate.charAt(5)=="-"))
{}
else{return false;}}
return true;}
function emailValidation(entered)
{var intCnt
intCnt=0;apos=entered.indexOf("@");dotpos=entered.lastIndexOf(".");lastpos=entered.length-1;if(apos<1||(dotpos-apos)<2||lastpos-dotpos>3||(lastpos-dotpos)<2){return false}
if(entered.charAt(dotpos-1)=="."){return false}
for(var j=0;j<entered.length;j++){if(entered.charAt(j)=="@"){intCnt++;}}
if(intCnt!=1){return false}
for(var i=0;i<entered.length;i++){if(((entered.charAt(i)>="!")&&(entered.charAt(i)<"-"))||((entered.charAt(i)>="[")&&(entered.charAt(i)<="^"))||((entered.charAt(i)>=":")&&(entered.charAt(i)<="?"))||((entered.charAt(i)>="{")&&(entered.charAt(i)<="~"))){return false}}
return true}
function fClearForm(formName)
{for(var i=0;i<formName.elements.length;i++)
{if(formName.elements(i).type=="text"||formName.elements(i).type=="textarea")
formName.elements(i).value="";else
{if(formName.elements(i).type=="select-one")
formName.elements(i).selectedIndex=0;else
{if(formName.elements(i).type=="radio"||formName.elements(i).type=="checkbox")
formName.elements(i).checked=false;}}}}
function checkPhone(value)
{for(var i=0;i<value.length;i++)
{if(!((value.charAt(i)>="0"&&value.charAt(i)<="9")||(value.charAt(i)=="(")||(value.charAt(i)==")")||(value.charAt(i)=="-")||(value.charAt(i)==" ")||(value.charAt(i)==",")||(value.charAt(i)==" ")))
{return false;}}
return true;}
function checkForAlphabets(value)
{for(var i=0;i<value.length;i++)
{if(!((value.charAt(i)>="A"&&value.charAt(i)<="Z")||(value.charAt(i)>="a"&&value.charAt(i)<="z")))
{return false;}}
return true;}
function Split(Expression,Delimiter)
{var temp=Expression;var a,b=0;var array=new Array();if(Delimiter.length==0)
{array[0]=Expression;return(array);}
if(Expression.length=='')
{array[0]=Expression;return(array);}
Delimiter=Delimiter.charAt(0);for(var i=0;i<Expression.length;i++)
{a=temp.indexOf(Delimiter);if(a==-1)
{array[i]=temp;break;}
else
{b=(b+a)+1;var temp2=temp.substring(0,a);array[i]=temp2;temp=Expression.substr(b,Expression.length-temp2.length);}}
return(array);}
function IsDateGreater(cday,cmonth,cyear,uday,umonth,uyear)
{var cday=cday;var cmonth=cmonth;var cyear=cyear;var uday=uday;var umonth=umonth;var uyear=uyear;if((1*(cyear))<=(1*(uyear)))
{if((1*(cyear))==(1*(uyear)))
{if((1*(cmonth))<=(1*(umonth)))
{if((1*(cmonth))==(1*(umonth)))
{if((1*(cday))<=(1*(uday)))
{return true;}
else
{return false;}}
else
{return true;}}
else
{return false;}}
else
{return true;}}
else
{return false;}}
var win=null;function NewWindow(mypage,myname,w,h,pos,infocus,scrollbr)
{if(pos=="random"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
else if((pos!='center'&&pos!="random")||pos==null){myleft=0;mytop=20}
settings="width="+w+",height="+h+",top="+mytop+",left="+myleft+",scrollbars="+scrollbr+",location=no,directories=no,status=yes,menubar=no,toolbar=no,resizable=no";win=window.open(mypage,myname,settings);win.focus();}
function PageMethod(fn,pagePath,paramArray,successFn,errorFn)
{pagePath='ajaxMethods.aspx';var paramList='';if(paramArray.length>0)
{for(var i=0;i<paramArray.length;i+=2)
{if(paramList.length>0)paramList+=',';paramList+='"'+paramArray[i]+'":"'+paramArray[i+1]+'"';}}
paramList='{'+paramList+'}';$.ajax({type:"POST",url:pagePath+"/"+fn,contentType:"application/json; charset=utf-8",data:paramList,dataType:"json",success:successFn,error:errorFn});}
function PostData(id,paramList,successFn,errorFn){var fn='';if((+id)==1){fn='getDatetime';}
if((+id)==2){fn='UsernameChecker';}
if((+id)==3){fn='CalculatePayout';}
if((+id)==4){fn='GetCalculationStatus';}
if((+id)==5){fn='GetSimulationDetails';}
if((+id)==6){fn='IsMemberExists';}
if((+id)==7){fn='ValidateVoucherName';}
if((+id)==8){fn='ValidateAmount';}
if((+id)==9){fn='ValidateNarration';}
if((+id)==10){fn='ValidateEWalletPwd';}
if((+id)==11){fn='getEwalletBalance';}
if((+id)==12){fn='ValidateUpdateVoucher';}
if((+id)==13){fn='NameSearch';}
if((+id)==14){fn='GetOrderDetails';}
if((+id)==15){fn='MemnoChecker';}
if((+id)==16){fn='IsSupplierExists';}
if((+id)==17){fn='IsCategoryExists';}
if((+id)==19){fn='IsPCRExists';}
if((+id)==18){fn='IsPOExists';}
if((+id)==20){fn='IsStockInCodeExists';}
if((+id)==21){fn='IsStockInCodeAtFRExists';}
if((+id)==22){fn='IsStockOutCodeAtFRExists';}
if((+id)==23){fn='IsProductExists';}
if((+id)==24){fn='IsPCRforStockTransferExist';}
if((+id)==25){fn='IsFranchiseExists';}
if((+id)==26){fn='IsOrderExists';}
if((+id)==27){fn='IsCourierExists';}
if((+id)==28){fn='IsReturnCodeExists';}
if((+id)==29){fn='IsReturnCodeByHOExists';}
if((+id)==30){fn='IsPCRforstockout';}
if((+id)==31){fn='IsPackageExists';}
if((+id)==32){fn='GetPaymodeList';}
if((+id)==33){fn='ProductPackageExists';}
if((+id)==34){fn='IsProdcuctCategoryExists';}
if((+id)==35){fn='ValidateUser';}
if((+id)==36){fn='IsStockInCodeExists_ForSupplier';}
if((+id)==37){fn='GetPlanTypeForPayoutControl';}
if((+id)==38){fn='GetPlanWisePayoutListForPayoutControl';}
if((+id)==39){fn='GetRelatedLinks';}
if((+id)==40){fn='GetFavouriteLinks';}
if((+id)==41){fn='AddFavouriteLinks';}
if((+id)==42){fn='RemoveFavouriteLinks';}
if((+id)==43){fn='GetCategoryForShoppe';}
if((+id)==44){fn='BuildMegaMainMenu';}
if((+id)==45){fn='BuildSuperfishMenu';}
var pagePath='WebService.asmx';if((+id)==3||(+id)==4||(+id)==5){pagePath='ajaxMethods.aspx';}
if(paramList==''){paramList='{'+paramList+'}';}
$.ajax({type:"POST",url:pagePath+"/"+fn,contentType:"application/json; charset=utf-8",data:paramList,dataType:"json",success:successFn,error:errorFn});}