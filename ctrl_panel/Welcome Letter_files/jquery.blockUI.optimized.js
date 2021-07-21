﻿
;(function($){if(/1\.(0|1|2)\.(0|1|2)/.test($.fn.jquery)||/^1.1/.test($.fn.jquery)){alert('blockUI requires jQuery v1.2.3 or later!  You are using v'+$.fn.jquery);return;}
$.blockUI=function(opts){install(window,opts);};$.unblockUI=function(opts){remove(window,opts);};$.fn.block=function(opts){return this.each(function(){if($.css(this,'position')=='static')
this.style.position='relative';if($.browser.msie)
this.style.zoom=1;install(this,opts);});};$.fn.unblock=function(opts){return this.each(function(){remove(this,opts);});};$.blockUI.version=2.09;$.blockUI.defaults={message:'<h1>Please wait...</h1>',css:{padding:0,margin:0,width:'30%',top:'40%',left:'35%',textAlign:'center',color:'#000',border:'3px solid #aaa',backgroundColor:'#fff',cursor:'wait'},overlayCSS:{backgroundColor:'#000',opacity:'0.6'},baseZ:1000,centerX:true,centerY:true,allowBodyStretch:true,constrainTabKey:true,fadeOut:400,focusInput:true,applyPlatformOpacityRules:true,onUnblock:null};var ie6=$.browser.msie&&/MSIE 6.0/.test(navigator.userAgent);var pageBlock=null;var pageBlockEls=[];function install(el,opts){var full=(el==window);var msg=opts&&opts.message!==undefined?opts.message:undefined;opts=$.extend({},$.blockUI.defaults,opts||{});opts.overlayCSS=$.extend({},$.blockUI.defaults.overlayCSS,opts.overlayCSS||{});var css=$.extend({},$.blockUI.defaults.css,opts.css||{});msg=msg===undefined?opts.message:msg;if(full&&pageBlock)
remove(window,{fadeOut:0});if(msg&&typeof msg!='string'&&(msg.parentNode||msg.jquery)){var node=msg.jquery?msg[0]:msg;var data={};$(el).data('blockUI.history',data);data.el=node;data.parent=node.parentNode;data.display=node.style.display;data.position=node.style.position;data.parent.removeChild(node);}
var z=opts.baseZ;var lyr1=($.browser.msie)?$('<iframe class="blockUI" style="z-index:'+z++ +';border:none;margin:0;padding:0;position:absolute;width:100%;height:100%;top:0;left:0" src="javascript:false;"></iframe>')
:$('<div class="blockUI" style="display:none"></div>');var lyr2=$('<div class="blockUI blockOverlay" style="z-index:'+z++ +';cursor:wait;border:none;margin:0;padding:0;width:100%;height:100%;top:0;left:0"></div>');var lyr3=full?$('<div class="blockUI blockMsg blockPage" style="z-index:'+z+';position:fixed"></div>')
:$('<div class="blockUI blockMsg blockElement" style="z-index:'+z+';display:none;position:absolute"></div>');if(msg)
lyr3.css(css);if(!opts.applyPlatformOpacityRules||!($.browser.mozilla&&/Linux/.test(navigator.platform)))
lyr2.css(opts.overlayCSS);lyr2.css('position',full?'fixed':'absolute');if($.browser.msie)
lyr1.css('opacity','0.0');$([lyr1[0],lyr2[0],lyr3[0]]).appendTo(full?'body':el);var expr=$.browser.msie&&(!$.boxModel||$('object,embed',full?null:el).length>0);if(ie6||expr){if(full&&opts.allowBodyStretch&&$.boxModel)
$('html,body').css('height','100%');if((ie6||!$.boxModel)&&!full){var t=sz(el,'borderTopWidth'),l=sz(el,'borderLeftWidth');var fixT=t?'(0 - '+t+')':0;var fixL=l?'(0 - '+l+')':0;}
$.each([lyr1,lyr2,lyr3],function(i,o){var s=o[0].style;s.position='absolute';if(i<2){full?s.setExpression('height','document.body.scrollHeight > document.body.offsetHeight ? document.body.scrollHeight : document.body.offsetHeight + "px"')
:s.setExpression('height','this.parentNode.offsetHeight + "px"');full?s.setExpression('width','jQuery.boxModel && document.documentElement.clientWidth || document.body.clientWidth + "px"')
:s.setExpression('width','this.parentNode.offsetWidth + "px"');if(fixL)s.setExpression('left',fixL);if(fixT)s.setExpression('top',fixT);}
else if(opts.centerY){if(full)s.setExpression('top','(document.documentElement.clientHeight || document.body.clientHeight) / 2 - (this.offsetHeight / 2) + (blah = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "px"');s.marginTop=0;}});}
lyr3.append(msg).show();if(msg&&(msg.jquery||msg.nodeType))
$(msg).show();bind(1,el,opts);if(full){pageBlock=lyr3[0];pageBlockEls=$(':input:enabled:visible',pageBlock);if(opts.focusInput)
setTimeout(focus,20);}
else
center(lyr3[0],opts.centerX,opts.centerY);};function remove(el,opts){var full=el==window;var data=$(el).data('blockUI.history');opts=$.extend({},$.blockUI.defaults,opts||{});bind(0,el,opts);var els=full?$('body').children().filter('.blockUI'):$('.blockUI',el);if(full)
pageBlock=pageBlockEls=null;if(opts.fadeOut){els.fadeOut(opts.fadeOut);setTimeout(function(){reset(els,data,opts,el);},opts.fadeOut);}
else
reset(els,data,opts,el);};function reset(els,data,opts,el){els.each(function(i,o){if(this.parentNode)
this.parentNode.removeChild(this);});if(data&&data.el){data.el.style.display=data.display;data.el.style.position=data.position;data.parent.appendChild(data.el);$(data.el).removeData('blockUI.history');}
if(typeof opts.onUnblock=='function')
opts.onUnblock(el,opts);};function bind(b,el,opts){var full=el==window,$el=$(el);if(!b&&(full&&!pageBlock||!full&&!$el.data('blockUI.isBlocked')))
return;if(!full)
$el.data('blockUI.isBlocked',b);var events='mousedown mouseup keydown keypress click';b?$(document).bind(events,opts,handler):$(document).unbind(events,handler);};function handler(e){if(e.keyCode&&e.keyCode==9){if(pageBlock&&e.data.constrainTabKey){var els=pageBlockEls;var fwd=!e.shiftKey&&e.target==els[els.length-1];var back=e.shiftKey&&e.target==els[0];if(fwd||back){setTimeout(function(){focus(back)},10);return false;}}}
if($(e.target).parents('div.blockMsg').length>0)
return true;return $(e.target).parents().children().filter('div.blockUI').length==0;};function focus(back){if(!pageBlockEls)
return;var e=pageBlockEls[back===true?pageBlockEls.length-1:0];if(e)
e.focus();};function center(el,x,y){var p=el.parentNode,s=el.style;var l=((p.offsetWidth-el.offsetWidth)/2)-sz(p,'borderLeftWidth');var t=((p.offsetHeight-el.offsetHeight)/2)-sz(p,'borderTopWidth');if(x)s.left=l>0?(l+'px'):'0';if(y)s.top=t>0?(t+'px'):'0';};function sz(el,p){return parseInt($.css(el,p))||0;};})(jQuery);