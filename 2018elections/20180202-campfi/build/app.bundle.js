!function(t){function e(n){if(i[n])return i[n].exports;var r=i[n]={i:n,l:!1,exports:{}};return t[n].call(r.exports,r,r.exports,e),r.l=!0,r.exports}var i={};e.m=t,e.c=i,e.d=function(t,i,n){e.o(t,i)||Object.defineProperty(t,i,{configurable:!1,enumerable:!0,get:n})},e.n=function(t){var i=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(i,"a",i),i},e.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},e.p="",e(e.s=0)}([function(t,e,i){"use strict";var n=i(1);(0,function(t){return t&&t.__esModule?t:{default:t}}(n).default)({}),$.urlParam=function(t){var e=new RegExp("[?&]"+t+"=([^&#]*)").exec(window.location.href);return null!=e?e[1]||0:null};var r=$.urlParam("chart");null!=r&&($(".slide").hide(),$("#"+r).show()),"all"==r&&$(".slide").show(),$("#districtSelectS, #districtSelectH, #districtSelectUS").click(function(){$(this).parent().find(".dropdown, .filter").slideToggle(),$(this).parent().find(".filter_box").val(""),$(this).parent().find(".dropdown").find(".thisSwitch").show(),$(this).find(".directions").toggle()}),d3.csv("./data/races.csv",function(t){return{race:t.district,chamber:t.chamber,district:t.district,democrat:t.democrat,dLast:t.dLast,dI:t.dI,republican:t.republican,rLast:t.rLast,rI:t.rI,candX:t.cand_xpend,indX:t.ind_xpend,totalX:t.total,control:t.control,incumbant:t.incumbant,party:t.party}},function(t,e){d3.csv("./data/candidates_master.csv",function(t){return{id:t.CandRegistrationNumber,district:t.District,out:+t.out,party:t.Party,first:t.CandFirstName,last:t.CandLastName,total:+t.TotReceipts,office:t.OfficeSought,endcash:+t.EndCash,indcontrib:+t.IndContrib,ppcontrib:+t.PPContrib,pfcontrib:+t.PFContrib,lbcontrib:+t.LbContrib,pubfin:+t.PubFin,miscinc:+t.MiscInc,notepayinc:+t.NotePayInc,noterecinc:+t.NoteRecInc,expend:+t.TotalExpend,begin:+t.BeginCash,photo:t.photo}},function(t,i){function n(t){for(var e=0;e<a.length;e++)"senate"==t&&"Senate"==a[e].chamber?$("#listedS").append("<li class='thisSwitch "+a[e].control+"' district='"+a[e].district+"' chamber='"+a[e].chamber+"'>District "+a[e].district+"</li>"):"house"==t&&"House"==a[e].chamber?$("#listedH").append("<li class='thisSwitch "+a[e].control+"' district='"+a[e].district+"' chamber='"+a[e].chamber+"'>District "+a[e].district+"</li>"):"us"==t&&"US"==a[e].chamber&&$("#listedUS").append("<li class='thisSwitch "+a[e].control+"' district='"+a[e].district+"' chamber='"+a[e].chamber+"'>U.S. District MN"+a[e].district+"</li>")}function r(t,e,i){for(var n=0,r=0;r<s.length;r++)String(s[r].office).toUpperCase()==i.toUpperCase()&&s[r].district==e&&0==s[r].out&&(n+=s[r].total);$(t+" .divide").html(""),$(t+" .d").append('<div class="topline democrat">DFL</div>'),$(t+" .r").append('<div class="topline republican">GOP</div>');for(var r=0;r<s.length;r++){var o="",a="",c="",d="";if(String(s[r].office).toUpperCase()==i.toUpperCase()&&s[r].district==e&&0==s[r].out){"DFL"==s[r].party?(o="d",a="democrat",c="dfl",d="dem"):"GOP"==s[r].party?(o="r",a="republican",c="gop",d="rep"):(o="i",a="independent",c="ind",d="indy");var l=[];l[0]=Number(s[r].total),l[1]=Number(s[r].indcontrib),l[2]=Number(s[r].ppcontrib),l[3]=Number(s[r].pfcontrib),l[4]=Number(s[r].lbcontrib),l[5]=Number(s[r].pubfin),l[6]=Number(s[r].miscinc),l[7]=Number(s[r].notepayinc),l[8]=Number(s[r].noterecinc),l[9]=Number(s[r].expend),l[10]=Number(s[r].endcash),l[11]=Number(s[r].begin);var u=d3.format("%")(l[0]/n+.2),p=d3.format("%")(l[1]/l[0]),f=d3.format("%")(l[2]/l[0]),h=d3.format("%")(l[3]/l[0]),m=d3.format("%")(l[4]/l[0]-.1),v=d3.format("%")(l[5]/l[0]),b=d3.format("%")(l[6]/l[0]),g=d3.format("%")(l[7]/l[0]),y=d3.format("%")(l[8]/l[0]);$(t+" ."+o).append('<div class="topline '+a+'"><span class="hideMe">'+s[r].party+": +"+d3.format("$,")(s[r].total)+'</span></div>                                 <div class="label">'+s[r].first+" "+s[r].last+' </div>                                <div class="line '+c+'"><div class="photo"><img src="img/'+s[r].photo+'" width="98%" /></div><div class="bar"><div class="bigBar"><div class="inBar" style="width:'+u+'"><div class="ind" title="'+d3.format("$,.0f")(l[1])+' independent contributions" style="width:'+p+'"></div><div class="pp" title="'+d3.format("$,.0f")(l[2])+' political party" style="width:'+f+'"></div><div class="pf" title="'+d3.format("$,.0f")(l[3])+' PAC contributions" style="width:'+h+'"></div><div class="lb" title="'+d3.format("$,.0f")(l[4])+' lobbyist contributions" style="width:'+m+'"></div><div class="pubfin" title="'+d3.format("$,.0f")(l[5])+' public financing" style="width:'+v+'"></div><div class="misc" title="'+d3.format("$,.0f")(l[6])+' miscellaneous" style="width:'+b+'"></div><div class="notepay" title="'+d3.format("$,.0f")(l[7])+' receipts loans payable" style="width:'+g+'"></div><div class="noterec" title="'+d3.format("$,.0f")(l[8])+' noterec" style="width:'+y+'"></div></div></div></div></div>                                <div class="subtotal">                                    <div class="begin">'+d3.format("$,")(s[r].begin)+'</div>                                    <div class="raised '+d+'">+'+d3.format("$,")(s[r].total)+'</div>                                    <div class="spent">-'+d3.format("$,")(s[r].expend)+'</div>                                    <div class="end">'+d3.format("$,")(s[r].endcash)+'</div>                            </div><div class="spacer"></div>')}}$(function(){$(document).tooltip({tooltipClass:"tooltip"})})}function o(t,e,i,n,o,s,c,d){function l(t){if(t&&u!==t){var e=m.centroid(t);e[0],e[1],6,u=t}else p/2,f/2,3,u=null;"house"==o&&d3.selectAll("#mapMetroH path, #mapStateH path").classed("activeB",!1),"senate"==o&&d3.selectAll("#mapMetroS path, #mapStateS path").classed("activeB",!1),b.selectAll("path").classed("activeB",u&&function(t){return t===u})}var u,p=400,f=400;if("us"==s)var h=d3.geo.albersUsa().scale(700).translate([330,200]);else if("mn"==s)var h=d3.geo.albersUsa().scale(5037).translate([20,970]);else if("metro"==s)var h=d3.geo.mercator().scale([14800]).center([-92.384033,45.209134]);var m=d3.geo.path().projection(h),v=d3.select(t+" svg").attr("width",p).attr("height",f);v.append("rect").attr("class","background").attr("width",p).attr("height",f);var b=v.append("g");d3.json("shapefiles/"+n,function(t,e){b.append("g").attr("class","states").selectAll("path").data(e.features).enter().append("path").attr("d",m).on("click",l).attr("id",function(t){return(s+"_"+t.properties.DISTRICT).replace(new RegExp(" ","g"),"-")}).attr("precinctName",function(t){return t.properties.DISTRICT}).attr("class",function(t){var e="";"01"==t.properties.DISTRICT&&(e="activeB "),"01A"==t.properties.DISTRICT&&(e="activeB ");var i="",n="";"house"==o?n=t.properties.DISTRICT:"senate"==o?n=Number(t.properties.DISTRICT):"us"==o&&(n=Number(t.properties.DISTRICT));for(var r=0;r<a.length;r++)a[r].district==n&&(i=a[r].control);return e+" "+i}).on("mousedown",function(t,e){var i="",n="";"house"==o?($("#districtSelectH .thisDistrict").html("District "+t.properties.DISTRICT),n=t.properties.DISTRICT,i="#houseChart"):"senate"==o?($("#districtSelectS .thisDistrict").html("District "+t.properties.DISTRICT),i="#senateChart",n=Number(t.properties.DISTRICT)):"us"==o&&($("#districtSelectUS .thisDistrict").html("U.S. District MN"+t.properties.DISTRICT),i="#usChart",n=Number(t.properties.DISTRICT)),r(i,n,o)}).style("stroke-width",function(t,e){return"mn"==s?"0.5px":"metro"==s?"0.3px":void 0}).style("stroke","#fff").call(d3.helper.tooltip(function(t,e){var i="",n="",r="",s="";"house"==o?s=t.properties.DISTRICT:"senate"==o?s=Number(t.properties.DISTRICT):"us"==o&&(s=Number(t.properties.DISTRICT));for(var e=0;e<a.length;e++)a[e].district==s&&o.toUpperCase()==String(a[e].chamber).toUpperCase()&&(i=a[e].control,n=a[e].incumbant,r=a[e].party);return"<div class='districtName'> District "+t.properties.DISTRICT+"</div><div class='"+i+"'>"+n+" ("+r+")</div>"})),b.append("path").attr("id","state-borders").attr("d",m)});d3.behavior.zoom().on("zoom",function(){b.attr("transform","translate("+d3.event.translate.join(",")+")scale("+d3.event.scale+")"),b.selectAll("circle").attr("d",m.projection(h)),b.selectAll("path").attr("d",m.projection(h))});$(".mapSwitch").click(function(){$(".filter input").val("")})}var a=e,s=i;d3.helper={},d3.helper.tooltip=function(t){return function(e){var i,n=d3.select("body").node();e.on("mouseover",function(e,r){d3.select("body").selectAll("div.tooltip").remove(),i=d3.select("body").append("div").attr("class","tooltip");var o=d3.mouse(n);i.style("left",o[0]+10+"px").style("top",o[1]-15+"px").style("position","absolute").style("z-index",1001);t(e,r)}).on("mousemove",function(e,r){var o=d3.mouse(n);i.style("left",o[0]+10+"px").style("top",o[1]-15+"px");var a=t(e,r)||"";i.html(a)}).on("mouseout",function(t,e){i.remove()})}},n("senate"),n("house"),n("us"),jQuery.fn.d3Click=function(){this.each(function(t,e){var i=document.createEvent("MouseEvents");i.initMouseEvent("click",!0,!0,window,0,0,0,0,0,!1,!1,!1,!1,0,null),e.dispatchEvent(i)})},jQuery.fn.d3Down=function(){this.each(function(t,e){var i=document.createEvent("MouseEvents");i.initMouseEvent("mousedown",!0,!0,window,0,0,0,0,0,!1,!1,!1,!1,0,null),e.dispatchEvent(i)})},jQuery.fn.d3Up=function(){this.each(function(t,e){var i=document.createEvent("MouseEvents");i.initMouseEvent("mouseup",!0,!0,window,0,0,0,0,0,!1,!1,!1,!1,0,null),e.dispatchEvent(i)})},$(".thisSwitch").click(function(){$(".thisSwitch").removeClass("selected"),$(this).addClass("selected"),$(this).parent().parent().find(".dropdown, .filter").slideToggle(),$(this).parent().parent().find(".thisDistrict").html($(this).text()),$(this).parent().parent().find(".directions").toggle();var t="mn_"+$(this).attr("district"),e="metro_"+$(this).attr("district");return r("#"+$(this).parent().parent().parent().find(".chart").attr("id"),$(this).attr("district"),$(this).attr("chamber")),$("[id='"+t.replace(new RegExp(" ","g"),"-")+"']").d3Down(),$("[id='"+t.replace(new RegExp(" ","g"),"-")+"']").d3Up(),$("[id='"+t.replace(new RegExp(" ","g"),"-")+"']").d3Click(),$("[id='"+e.replace(new RegExp(" ","g"),"-")+"']").d3Down(),$("[id='"+e.replace(new RegExp(" ","g"),"-")+"']").d3Up(),$("[id='"+e.replace(new RegExp(" ","g"),"-")+"']").d3Click(),null}),$(".filter_box").keyup(function(t){$(this).parent().parent().find(".dropdown .thisSwitch").hide();var e=$(this).val();$(this).parent().parent().find(".dropdown .thisSwitch").each(function(){-1!=$(this).text().toUpperCase().indexOf(e.toUpperCase())&&$(this).show()})}),r("#govChart","mn","GC"),r("#agChart","mn","AG"),r("#sosChart","mn","SS"),r("#saChart","mn","sa"),r("#usChart","1","US"),r("#houseChart","01A","House"),r("#senateChart","1","Senate"),o("#mapState","#infobox","#chart","us_cd_mn_2012.json","us","mn",a,0),o("#mapMetroS","#infobox","#chart","mnsenate_metro.json","senate","metro",a,0),o("#mapStateS","#infobox","#chart","mnsenate.json","senate","mn",a,0),o("#mapMetroH","#infobox","#chart","mnleg_metro.json","house","metro",a,0),o("#mapStateH","#infobox","#chart","mnleg.json","house","mn",a,0)})}),function(){var t={top:20,right:0,bottom:20,left:0};c3.generate({bindto:"#partyChart",padding:t,data:{x:"x",columns:[["x","DFL","GOP"],["Fundraising",2504520,455567]],type:"bar",labels:{format:{Fundraising:d3.format("$,")}},colors:{Fundraising:function(t){return 0==t.index?"#3585BC":"#d34A44"}}},legend:{show:!1},tooltip:{show:!1},axis:{y:{max:3e6,min:0,padding:{bottom:0,top:0},tick:{count:4,values:[0,1e6,2e6,3e6],format:d3.format("$,")}},x:{type:"category",tick:{multiline:!1}}}})}()},function(t,e,i){"use strict";function n(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(e,"__esModule",{value:!0});var r=function(){function t(t,e){for(var i=0;i<e.length;i++){var n=e[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}return function(e,i,n){return i&&t(e.prototype,i),n&&t(e,n),e}}(),o=i(2),a=function(t){return t&&t.__esModule?t:{default:t}}(o),s=function(){function t(e){n(this,t),this.options=e||{},this.options.pym=void 0===this.options.pym||this.options.pym,this.options.useView=void 0===this.options.useView||this.options.useView,this.options.views=this.options.views||{develop:/localhost.*|127\.0\.0\.1.*/i,staging:/staging/i},this.parseQuery(),this.setView(),this.options.pym&&(this.pym=_.isUndefined(window.pym)?void 0:new pym.Child({polling:500}))}return r(t,[{key:"setView",value:function(){if(this.options.useView){var t=void 0;if(_.find(this.options.views,function(e,i){return t=i,window.location.href.match(e)?i:void 0}),t){var e=document.createElement("div"),i=document.getElementsByTagName("body")[0];e.className="site-view site-view-"+t,i.insertBefore(e,i.childNodes[0])}}}},{key:"parseQuery",value:function(){this.query=a.default.parse(document.location.search),this.query.pym&&"true"===this.query.pym&&(this.options.pym=!0)}},{key:"deepClone",value:function(t){return JSON.parse(JSON.stringify(t))}},{key:"isEmbedded",value:function(){if(!_.isUndefined(this.embedded))return this.embedded;try{this.embedded=window.self!==window.top}catch(t){this.embedded=!0}return this.embedded}},{key:"hasLocalStorage",value:function(){if(!_.isUndefined(this.localStorage))return this.localStorage;try{window.localStorage.setItem("test","test"),window.localStorage.removeItem("test"),this.localStorage=!0}catch(t){this.localStorage=!1}return this.localStorage}},{key:"hasGeolocate",value:function(){return window.navigator&&"geolocation"in window.navigator}},{key:"geolocate",value:function(t){this.hasGeolocate()?window.navigator.geolocation.getCurrentPosition(function(e){t(null,{lat:e.coords.latitude,lng:e.coords.longitude})},function(){t("Unable to find your position.")}):t("Geolocation not available")}},{key:"goTo",value:function(t){var e=_.isElement(t)?t:t[0]&&_.isElement(t[0])?t[0]:document.getElementById(t);e&&(this.isEmbedded()&&this.pym?this.pym.scrollParentToChildEl(e):e.scrollIntoView({behavior:"smooth"}))}},{key:"gaPageUpdate",value:function(t){t=t||document.location.pathname+document.location.search+document.location.hash,window.ga&&(window.ga("set","page",t),window.ga("send","pageview"))}}]),t}();e.default=function(t){return new s(t)}},function(t,e,i){"use strict";function n(t){switch(t.arrayFormat){case"index":return function(e,i,n){return null===i?[o(e,t),"[",n,"]"].join(""):[o(e,t),"[",o(n,t),"]=",o(i,t)].join("")};case"bracket":return function(e,i){return null===i?o(e,t):[o(e,t),"[]=",o(i,t)].join("")};default:return function(e,i){return null===i?o(e,t):[o(e,t),"=",o(i,t)].join("")}}}function r(t){var e;switch(t.arrayFormat){case"index":return function(t,i,n){if(e=/\[(\d*)\]$/.exec(t),t=t.replace(/\[\d*\]$/,""),!e)return void(n[t]=i);void 0===n[t]&&(n[t]={}),n[t][e[1]]=i};case"bracket":return function(t,i,n){return e=/(\[\])$/.exec(t),t=t.replace(/\[\]$/,""),e?void 0===n[t]?void(n[t]=[i]):void(n[t]=[].concat(n[t],i)):void(n[t]=i)};default:return function(t,e,i){if(void 0===i[t])return void(i[t]=e);i[t]=[].concat(i[t],e)}}}function o(t,e){return e.encode?e.strict?s(t):encodeURIComponent(t):t}function a(t){return Array.isArray(t)?t.sort():"object"==typeof t?a(Object.keys(t)).sort(function(t,e){return Number(t)-Number(e)}).map(function(e){return t[e]}):t}var s=i(3),c=i(4);e.extract=function(t){return t.split("?")[1]||""},e.parse=function(t,e){e=c({arrayFormat:"none"},e);var i=r(e),n=Object.create(null);return"string"!=typeof t?n:(t=t.trim().replace(/^(\?|#|&)/,""))?(t.split("&").forEach(function(t){var e=t.replace(/\+/g," ").split("="),r=e.shift(),o=e.length>0?e.join("="):void 0;o=void 0===o?null:decodeURIComponent(o),i(decodeURIComponent(r),o,n)}),Object.keys(n).sort().reduce(function(t,e){var i=n[e];return Boolean(i)&&"object"==typeof i&&!Array.isArray(i)?t[e]=a(i):t[e]=i,t},Object.create(null))):n},e.stringify=function(t,e){e=c({encode:!0,strict:!0,arrayFormat:"none"},e);var i=n(e);return t?Object.keys(t).sort().map(function(n){var r=t[n];if(void 0===r)return"";if(null===r)return o(n,e);if(Array.isArray(r)){var a=[];return r.slice().forEach(function(t){void 0!==t&&a.push(i(n,t,a.length))}),a.join("&")}return o(n,e)+"="+o(r,e)}).filter(function(t){return t.length>0}).join("&"):""}},function(t,e,i){"use strict";t.exports=function(t){return encodeURIComponent(t).replace(/[!'()*]/g,function(t){return"%"+t.charCodeAt(0).toString(16).toUpperCase()})}},function(t,e,i){"use strict";function n(t){if(null===t||void 0===t)throw new TypeError("Object.assign cannot be called with null or undefined");return Object(t)}/*
object-assign
(c) Sindre Sorhus
@license MIT
*/
var r=Object.getOwnPropertySymbols,o=Object.prototype.hasOwnProperty,a=Object.prototype.propertyIsEnumerable;t.exports=function(){try{if(!Object.assign)return!1;var t=new String("abc");if(t[5]="de","5"===Object.getOwnPropertyNames(t)[0])return!1;for(var e={},i=0;i<10;i++)e["_"+String.fromCharCode(i)]=i;if("0123456789"!==Object.getOwnPropertyNames(e).map(function(t){return e[t]}).join(""))return!1;var n={};return"abcdefghijklmnopqrst".split("").forEach(function(t){n[t]=t}),"abcdefghijklmnopqrst"===Object.keys(Object.assign({},n)).join("")}catch(t){return!1}}()?Object.assign:function(t,e){for(var i,s,c=n(t),d=1;d<arguments.length;d++){i=Object(arguments[d]);for(var l in i)o.call(i,l)&&(c[l]=i[l]);if(r){s=r(i);for(var u=0;u<s.length;u++)a.call(i,s[u])&&(c[s[u]]=i[s[u]])}}return c}}]);
//# sourceMappingURL=app.bundle.js.map