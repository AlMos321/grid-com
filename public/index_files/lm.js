!function(){var n=function(n){var t=typeof n;return"undefined"!==t},t=function(n){return"function"==typeof n},e=function(){var n="testCookie";o(n,"1");var t="1"==a(n);return i(n),t?1:0},r=function(){var n=arguments;return n[0].replace(/{(\d+)}/g,function(t,e){return e++,"undefined"!=typeof n[e]?n[e]:t})},o=function(n,t,e,r,o,a){e instanceof Date?e=e.toGMTString():"number"==typeof e&&(e=new Date(+new Date+1e3*e).toGMTString());var i,u,c=[n+"="+encodeURIComponent(t)];for(u in i={expires:e,path:r,domain:o})i[u]&&c.push(u+"="+i[u]);return a&&c.push("secure"),document.cookie=c.join(";"),!0},a=function(n){var t="; "+document.cookie,e=t.split("; "+n+"=");if(2==e.length)return e.pop().split(";").shift()},i=function(n){o(n,"",-1)},u=function(){var t=document.getElementsByTagName("title");return t&&n(t[0])?t[0].text:""},c=function(){var n="";try{n=window.top.document.referrer}catch(t){if(window.parent)try{n=window.parent.document.referrer}catch(t){n=""}}return""===n&&(n=document.referrer),n},d=function(){try{return!document.hasFocus||document.hasFocus()}catch(n){return!0}},f=function(){if(n(window.frameElement))return window.frameElement&&"iframe"===String(window.frameElement.nodeName).toLowerCase();try{return window.self!==window.top}catch(n){return!0}},s=function(t){var e;e=n(t)?t.split("+").join(" "):document.location.search.split("+").join(" ");for(var r,o={},a=/[?&]?([^=]+)=([^&]*)/g;r=a.exec(e);)o[decodeURIComponent(r[1])]=decodeURIComponent(r[2]);return o},p=function(){var n="&",t=s();for(var e in y)t.hasOwnProperty(y[e])&&(n+=C(y[e],t[y[e]]));return n},m=function(){return window.location.protocol.replace(":","")},l=function(){var r,o,a={},i={pdf:"application/pdf",qt:"video/quicktime",realp:"audio/x-pn-realaudio-plugin",wma:"application/x-mplayer2",dir:"application/x-director",flash:"application/x-shockwave-flash",spl:"application/futuresplash",java:"application/x-java-vm",gears:"application/x-googlegears",ag:"application/x-silverlight"},u=window.devicePixelRatio||1;if(!new RegExp("MSIE").test(window.navigator.userAgent)){if(window.navigator.mimeTypes&&window.navigator.mimeTypes.length)for(r in i)Object.prototype.hasOwnProperty.call(i,r)&&(o=window.navigator.mimeTypes[i[r]],a[r]=o&&o.enabledPlugin?"1":"0");"unknown"!=typeof navigator.javaEnabled&&n(window.navigator.javaEnabled)&&window.navigator.javaEnabled()&&(a.java="1"),t(window.GearsFactory)&&(a.gears="1"),a.cookie=e()}var c=parseInt(screen.width,10)*u,d=parseInt(screen.height,10)*u;return a.res=parseInt(c,10)+"x"+parseInt(d,10),a},w=function(){return window.location.hostname.replace("www.","")},g=function(){return(new Date).getTimezoneOffset()},v=function(){return window.location.toString()},x=function(){return(window.navigator&&(navigator.language||navigator.userLanguage||navigator.browserLanguage||navigator.systemLanguage)||"").toLowerCase()},y=["utm_source","utm_medium","utm_campaign","utm_content","utm_term"],h=function(){var n="xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx";return n.replace(/[xy]/g,function(n){var t=16*Math.random()|0,e="x"==n?t:3&t|8;return e.toString(16)})},E=function(){var t="_lp_uuid",e=a(t);return n(e)||(e=h(),o(t,e,31536e3,"/")),e},S=function(){return Math.random().toString().split(".")[1]},L=function(){return Math.random().toString(36).substring(2)},b=function(n){var t=document.createElement("img");t.id=L(),t.style.display="none",t.src=r("{0}&{1}",n,S()),document.body.appendChild(t)},C=function(n,t){return r("&{0}={1}",n,encodeURIComponent(t))},T=function(n,t,e,o){return r("/{0}/{1}/{2}/{3}/{4}/?{5}&",n,t,e,o,E(),p())},k=function(n){var t,e="&";for(t in n)n.hasOwnProperty(t)&&(e+=r("{0}={1}&",t,encodeURIComponent(n[t])));return e},M=function(){var n=k(l());return n+=C("referer",c()),n+=C("url",v()),n+=C("tz",g()),n+=C("language",x()),n+=C("if",f()?1:0),n+=C("title",u()),n+=C("domain",w()),n+=C("proto",m())},I=function(){var n=function(n){return null!=document.querySelector(n)?1:0},t=C("ym",n('script[src*="yandex.ru"]'));return t+=C("ga",n('script[src*="google-analytics.com"]'))},_=function(){var t="";if(!n(performance)||!n(performance.timing))return t;var e=performance.timing,r=e.loadEventStart-e.navigationStart;if(r=r>0?r:e.domComplete?e.domComplete-e.navigationStart:0,t+=C("plt",r),t+=C("dns",e.domainLookupEnd-e.domainLookupStart),t+=C("tcp",e.connectEnd-e.connectStart),t+=C("ttfb",e.responseStart-e.navigationStart),t+=C("dcl",e.domContentLoadedEventStart-e.domLoading),t+=C("dp",e.domComplete-e.domLoading),t+=C("rd",e.responseStart-e.requestStart),n(window.performance.getEntriesByType)&&window.performance.getEntriesByType("resource")instanceof Array){var o=window.performance.getEntriesByType("resource");t+="&rs="+o.length;var a,i,u=0,c=0,d=0;for(a in o)i=o[a].duration,isNaN(i)||(u=0==u?i:u<i?i:u,c=0==c?i:c<i?c:i,d+=i);t+="&rst="+Math.round(d),t+="&rs_max="+Math.round(u),t+="&rs_min="+Math.round(c)}return t},j=function(){var n=I();try{n+="&"+_()}catch(n){}return n},O=function(n){var t,e,a,i=s();for(t in y)i.hasOwnProperty(y[t])&&(e=r("{0}_{1}",y[t],n),a=i[y[t]],o(e,a,86400,"/"))},P=function(n){var t,e=m(),r=("https"==e?"wss:":"ws:")+n,o=1e3,a=3e3,i=!1,u=!1,c=1,f="";window.onload=function(){f=j()};var s=function(){t=new WebSocket(r),t.onopen=function(){i=!0},t.onclose=function(){i=!1}},p=function(){try{u===!0&&i===!0&&t.send(f+"&duration="+c),i===!0&&setTimeout(p,a)}catch(n){}},l=function(){d()&&c++,setTimeout(l,o)};window.addEventListener("focus",function(){d()&&(u=!0)}),window.addEventListener("blur",function(){d()||(u=!1)}),d()&&(u=!0),s(),setTimeout(l,o),setTimeout(p,a),window.onbeforeunload=function(){t.send(f+"&duration="+c)}},R=function(n){for(var t,e,r=document.getElementsByClassName("page_container")[0],o=25,a=r.offsetWidth,i=r.offsetHeight,u=i/o+1,c=a/o+1,d=[],f=1;f<u;f++)for(var s=1;s<c;s++)t=s*o,e=f*o,d.push([t,e,t*e+t]);var p=function(t){var e=new XMLHttpRequest;e.open("POST",m()+":"+n,!0),e.send('{"'+t+'": 1}')};r.addEventListener("click",function(n){c=n.offsetX,u=n.offsetY;for(var t in d)if(s=d[t][0],f=d[t][1],c<=s&&u<=f){p(d[t][2]);break}})},B=function(n,t,e,o){var a="//mc.lpgenerator.ru/",i=T(n,t,e,o),u=M();b(r("{0}ts{1}&{2}",a,i,u)),O(o),document.addEventListener("DOMContentLoaded",function(){var n=r("{0}ds{1}",a,i);P(n)}),document.addEventListener("DOMContentLoaded",function(){setTimeout(function(){R(r("{0}cs/{1}/",a,o))},1e3)})},D=document.getElementById("lp-tr");if(D&&n(D.src)){var q=s(D.src.replace(/^[^\?]+\??/,"")),N=function(n){return!!q.hasOwnProperty(n)&&q[n]};N("a")&&N("b")&&N("c")&&N("d")&&B(N("a"),N("b"),N("c"),N("d"))}}();
