<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

<!--STYLESHEETS-->
<link href="nvd3-master/src/nv.d3.css" rel="stylesheet" type="text/css">
<link href='//cdn.datatables.net/1.10.2/css/jquery.dataTables.css' rel='stylesheet' />


<style>
path:hover {
  fill-opacity: 0.5;
  stroke: #fff !important;
}

.symbol {
  fill: #ddd;
  fill-opacity: 1;
  stroke: #fff;
}

.land {
  fill: #222;
}

.state {
    fill: #ddd;
}

.state:hover {
    stroke:black;
    cursor:pointer;
}

.state-label{
    cursor:pointer;
}

rect{
border-radius:2px !important;
}

.state-label {
    -webkit-user-select: none;  /* Chrome all / Safari all */
    -moz-user-select: none;     /* Firefox all */
    -ms-user-select: none;      /* IE 10+ */
}

.key text {
    dominant-baseline: central;
    font-size: 12px;
}
.leader {
    stroke: #666;
    shape-rendering: crispEdges;
}

.selectable{
fill:#c0bfeb !important;
background-color:#c0bfeb !important;
}

 #container {
    display: table;
    width:100%;
    }

  #row  {
    display: table-row;
    }

  #left, #right, #middle {
    display: table-cell;
    }

div{
vertical-align: text-top;
}

.nvtooltip{
font-size:16px !important;
font-weight:bold !important;
padding:10px !important;
display: block !important;
margin-left: auto !important;
margin-right: auto !important;
width:auto !important;
border: 1px solid black !important;
}

.nv-axisMaxMin text{
font-weight: normal !important;
}

rect:hover{
stroke-opacity: 1 !important;
stroke: #000 !important;
}

.nv-slice:hover{
stroke-opacity: 1 !important;
stroke: #000 !important;
}

.nvd3 .nv-wrap .nv-multiBarHorizontalChart{
width:100% !important;
}

.nvd3 .nv-wrap .nv-multiBarHorizontalChart g{
width:100% !important;
}

</style>

<style>
.CSSTableGenerator {
	margin:0px;padding:0px;
	width:100%;
	border:1px solid #fff;
	
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}.CSSTableGenerator tr:hover td{
	
}
.CSSTableGenerator tr:nth-child(odd){ background-color:#ddd; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#ddd; }.CSSTableGenerator td{
	vertical-align:middle;
	
	
	border:1px solid #fff;
	border-width:0px 1px 1px 0px;
	text-align:center;
	padding:2px;
	font-size:18px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}

#menu{
width:100%;
float:left;
}

a{
text-decoration:none;
color:#000;
}

a:hover{
text-decoration:none;
color:#000;
}

.active{
background-color: #fff;
color:#000;
}

.active a{
color:#fff;
}

div a{
color:black !important;
}

td:hover{
background-color: #92B28D;
cursor:pointer;
}

.tab-content.active{
display: block;
}
 
.tab-content.hide{
display: none;
}
</style>

<style>

path:hover {
  fill-opacity: 0.5;
  stroke: #fff !important;
}

.symbol {
  fill: #ddd;
  fill-opacity: 1;
  stroke: #fff;
}

.tooltip{ background-color:rgba(255,255,255,1);;
          margin: 10px;
          height: 50px;
          width: 150px;
          padding-left: 10px; 
          padding-top: 10px;
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:3px;
    border: 1px solid black;
        }

label > input{ /* HIDE RADIO */
  display:none;
}
label > input + img{ /* IMAGE STYLES */
  cursor:pointer;
  border:2px solid transparent;
}
label > input:checked + img{ /* (CHECKED) IMAGE STYLES */
  border:2px solid #ddd;
}

#target-leg, #target-leg2, #target-gov, #target-gov2, #target-rep, #target-rep2, #target-sen, #target-sen2, #map-leg, #map-leg2, #map-gov, #map-gov2, #map-sen, #map-sen2, #map-rep, #map-rep2, #table-leg, #table-gov, #table-rep, #table-sen, #table-leg2, #table-gov2, #table-rep3, #table-sen2 {
width:100%;
height:550px;
}

#target-gov, #target-gov2, #target-rep, #target-rep2, #target-sen, #target-sen2, #map-gov, #map-gov2, #map-sen, #map-sen2, #map-rep, #map-rep2, #table-gov, #table-rep, #table-sen, #table-gov2, #table-rep2, #table-sen2 {
display:none;
}

#stateMaps-full, #stateMaps-metro, #stateTables-full, #usTables-full{
display:none;
}

#can1, #can2{
    font-weight: 900;
    font-size: 24px;
}

.list{
width:90% !important;
padding-right:100px;
}
.dataTables_length, .dataTables_filter, .dataTables_info, .dataTables_paginate {
display:none;
}
</style>

<!--SCRIPTS-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.4.9/d3.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.4.9/d3.min.js"></script>
<script src="//cdn.jsdelivr.net/underscorejs/1.6.0/underscore-min.map"></script>
<script src="//cdn.jsdelivr.net/underscorejs/1.6.0/underscore-min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="nvd3-master/lib/d3.v3.js"></script>
<script src="nvd3-master/nv.d3.js"></script>
<script src="nvd3-master/src/utils.js"></script>
<script src="nvd3-master/src/tooltip.js"></script>
<script src="nvd3-master/src/models/legend.js"></script>
<script src="nvd3-master/src/models/axis.js"></script>
<script src="nvd3-master/src/models/multiBarHorizontal.js"></script>
<script src="nvd3-master/src/models/multiBarHorizontalChart.js"></script>
<script src="nvd3-master/examples/stream_layers.js"></script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="http://d3js.org/topojson.v1.min.js" type="text/javascript"></script>
<script src="http://d3js.org/queue.v1.min.js"></script>
<script src="http://datamaps.github.com/scripts/datamaps-all.js"></script>
<script src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

<script>
//LOAD TABLE VIEWS
$(document).ready(function() {
    $('#usleg-table').dataTable( {
        "ajax": 'test.txt',
        "bDeferRender": true
    } );
    $('#mnleg-table').dataTable( {
        "ajax": 'test2.txt',
        "bDeferRender": true
    } );
    $('#mngov-table').dataTable( {
        "ajax": 'test.txt',
        "bDeferRender": true
    } );
    $('#usgov-table').dataTable( {
        "ajax": 'test.txt',
        "bDeferRender": true
    } );
    $('#mnsen-table').dataTable( {
        "ajax": 'test.txt',
        "bDeferRender": true
    } );
    $('#ussen-table').dataTable( {
        "ajax": 'test.txt',
        "bDeferRender": true
    } );
    $('#mnrep-table').dataTable( {
        "ajax": 'test.txt',
        "bDeferRender": true
    } );
    $('#usrep-table').dataTable( {
        "ajax": 'test.txt',
        "bDeferRender": true
    } );
} );
</script>
</head>

<body>
<div id="menu">
<div class="CSSTableGenerator">
                <table class="nav-tabs">
                    <tr class="nav-tabs">
                        <td width="25%">
                            <a href="#tab1" onclick="setVisibility('target-leg', 'none');setVisibility('map-leg', 'none');setVisibility('target-leg2', 'none');setVisibility('map-leg2', 'none');setVisibility('target-rep', 'none');setVisibility('map-rep', 'none');setVisibility('target-rep2', 'none');setVisibility('map-rep2', 'none');setVisibility('target-sen', 'none');setVisibility('map-sen', 'none');setVisibility('target-sen2', 'none');setVisibility('map-sen2', 'none');setVisibility('target-gov', 'block');setVisibility('map-gov', 'block');setVisibility('target-gov2', 'block');setVisibility('map-gov2', 'block');setVisibility('table-leg', 'none');setVisibility('table-leg2', 'none');setVisibility('table-gov', 'block');setVisibility('table-gov2', 'block');setVisibility('table-sen', 'none');setVisibility('table-sen2', 'none');setVisibility('table-rep', 'none');setVisibility('table-rep2', 'none');redrawGraph('mncounties.json',govData,1);">Minnesota Governor</a>
                        </td>
                        <td class="active" width="25%">
                            <a href="#tab1" onclick="setVisibility('target-leg', 'block');setVisibility('map-leg', 'block');setVisibility('target-leg2', 'block');setVisibility('map-leg2', 'block');setVisibility('target-rep', 'none');setVisibility('map-rep', 'none');setVisibility('target-rep2', 'none');setVisibility('map-rep2', 'none');setVisibility('target-sen', 'none');setVisibility('map-sen', 'none');setVisibility('target-sen2', 'none');setVisibility('map-sen2', 'none');setVisibility('target-gov', 'none');setVisibility('map-gov', 'none');setVisibility('target-gov2', 'none');setVisibility('map-gov2', 'none');setVisibility('table-leg', 'block');setVisibility('table-leg2', 'block');setVisibility('table-gov', 'none');setVisibility('table-gov2', 'none');setVisibility('table-sen', 'none');setVisibility('table-sen2', 'none');setVisibility('table-rep', 'none');setVisibility('table-rep2', 'none');redrawGraph('mnleg.json',mnlegData,0);">Minnesota House of Representatives</a>
                        </td>
                        <td width="25%">
                            <a href="#tab1" onclick="setVisibility('target-leg', 'none');setVisibility('map-leg', 'none');setVisibility('target-leg2', 'none');setVisibility('map-leg2', 'none');setVisibility('target-rep', 'none');setVisibility('map-rep', 'none');setVisibility('target-rep2', 'none');setVisibility('map-rep2', 'none');setVisibility('target-sen', 'block');setVisibility('map-sen', 'block');setVisibility('target-sen2', 'block');setVisibility('map-sen2', 'block');setVisibility('target-gov', 'none');setVisibility('map-gov', 'none');setVisibility('target-gov2', 'none');setVisibility('map-gov2', 'none');setVisibility('table-leg', 'none');setVisibility('table-leg2', 'none');setVisibility('table-gov', 'none');setVisibility('table-gov2', 'none');setVisibility('table-sen', 'block');setVisibility('table-sen2', 'block');setVisibility('table-rep', 'none');setVisibility('table-rep2', 'none');redrawGraph('mncounties.json',senData,2);">U.S. Senate</a>
                        </td>
                        <td width="25%">
                           <a href="#tab1" onclick="setVisibility('target-leg', 'none');setVisibility('map-leg', 'none');setVisibility('target-leg2', 'none');setVisibility('map-leg2', 'none');setVisibility('target-rep', 'block');setVisibility('map-rep', 'block');setVisibility('target-rep2', 'block');setVisibility('map-rep2', 'block');setVisibility('target-sen', 'none');setVisibility('map-sen', 'none');setVisibility('target-sen2', 'none');setVisibility('map-sen2', 'none');setVisibility('target-gov', 'none');setVisibility('map-gov', 'none');setVisibility('target-gov2', 'none');setVisibility('map-gov2', 'none');setVisibility('table-leg', 'block');setVisibility('table-leg2', 'block');setVisibility('table-gov', 'none');setVisibility('table-gov2', 'none');setVisibility('table-sen', 'none');setVisibility('table-sen2', 'none');setVisibility('table-rep', 'none');setVisibility('table-rep2', 'none');redrawGraph('usleg.json',repData,0);">U.S House of Representatives</a>
                        </td>
                    </tr>
                </table>
            </div>
</div>

<section id="tab1" class="tab-content">
<div id="buttons">
  <label value="small">
    <input type="radio" name="pickView" id="map-select" onchange="setVisibility('stateMaps-full', 'block');setVisibility('stateMaps-metro', 'block');setVisibility('cartoMaps-full', 'none');setVisibility('cartoMaps-metro', 'none');setVisibility('stateTables-full', 'none');setVisibility('usTables-full', 'none');"" />
    <img src="mnview.png">
  </label>
  
  <label>
    <input type="radio" name="pickView" value="big" id="carto-select" onchange="setVisibility('stateMaps-full', 'none');setVisibility('stateMaps-metro', 'none');setVisibility('cartoMaps-full', 'block');setVisibility('cartoMaps-metro', 'block');setVisibility('stateTables-full', 'none');setVisibility('usTables-full', 'none');" checked />
    <img src="blockview.png">
  </label>

  
</div>

<div id="container">
  <div id="row">

  	<div id="left">
               <div id="cartoMaps-full">
  		<div id="target-leg"></div>
  		<div id="target-rep"></div>
  		<div id="target-sen"></div>
  		<div id="target-gov"></div>
               </div>
               <div id="stateMaps-full">
                <div id="map-leg"></div>
                <div id="map-rep"><svg width="30%" height="500"></svg></div>
                <div id="map-sen"><svg width="30%" height="500"></svg></div>
                <div id="map-gov"><svg width="30%" height="500"></svg></div>
               </div>
               <div id="stateTables-full">
                <div id="table-leg" class="list">
<table id="mnleg-table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Race</th>
                <th>DFL</th>
                <th>Percentage</th>
                <th>GOP</th>
                <th>Percentage</th>
            </tr>
        </thead>
    </table>
</div>
                <div id="table-rep" class="list">
<table id="mnrep-table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Race</th>
                <th>DFL</th>
                <th>Percentage</th>
                <th>GOP</th>
                <th>Percentage</th>
            </tr>
        </thead>
    </table>
                </div>
                <div id="table-sen" class="list">
<table id="mnsen-table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Race</th>
                <th>DFL</th>
                <th>Percentage</th>
                <th>GOP</th>
                <th>Percentage</th>
            </tr>
        </thead>
    </table>
                </div>
                <div id="table-gov" class="list">
<table id="mngov-table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Race</th>
                <th>DFL</th>
                <th>Percentage</th>
                <th>GOP</th>
                <th>Percentage</th>
            </tr>
        </thead>
    </table>
                </div>
               </div>
  	</div>

  	<div id="right">
               <div id="cartoMaps-metro">
  		<div id="target-leg2"></div>
  		<div id="target-rep2"></div>
  		<div id="target-sen2"></div>
  		<div id="target-gov2"></div>
               </div>
               <div id="stateMaps-metro">
                <div id="map-leg2"><svg width="30%" height="500"></svg></div>
                <div id="map-rep2"><svg width="30%" height="500"></svg></div>
                <div id="map-sen2"><svg width="30%" height="500"></svg></div>
                <div id="map-gov2"><svg width="30%" height="500"></svg></div>
               </div>
               <div id="usTables-full">
                <div id="table-leg2" class="list">
<table id="usleg-table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Race</th>
                <th>DFL</th>
                <th>Percentage</th>
                <th>GOP</th>
                <th>Percentage</th>
            </tr>
        </thead>
    </table>
                </div>
                <div id="table-rep2" class="list">
<table id="usrep-table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Race</th>
                <th>DFL</th>
                <th>Percentage</th>
                <th>GOP</th>
                <th>Percentage</th>
            </tr>
        </thead>
    </table>
                </div>
                <div id="table-sen2" class="list">

                </div>
               </div>
  	</div>

</div>
</div>

<div id="container">
  <div id="row">

  	<div id="left" style="width:20%;">
  		<div id="can1">DFL</div>
  		<div id="voteCount">1,000,000</div>
  	</div>

  	<div id="middle" style="width:60%;">
  		<div id="tracker" class="tracking"><svg style="height:130px;width:100%"></svg></div>
  	</div>

  	<div id="right" style="width:20%;">
  		<div id="can2">GOP</div>
  		<div id="voteCount2">1,000,000</div>
  	</div>

</div>
</div>
</section>

<div id="halp" width="100%" height="50px"><p width="100%" height="50px"></p></div>

<script>
//MENU STUFF
function setVisibility(id, visibility) {
document.getElementById(id).style.display = visibility;
}
	$(document).ready(function() {
		$('.nav-tabs > td > a').click(function(event){
		event.preventDefault();//stop browser to take action for clicked anchor

		//get displaying tab content jQuery selector
		var active_tab_selector = $('.nav-tabs > td.active > a').attr('href');					
 
		//find actived navigation and remove 'active' css
		var actived_nav = $('.nav-tabs > td.active');
		actived_nav.removeClass('active');
 
		//add 'active' css into clicked navigation
		$(this).parents('td').addClass('active');
 
		//hide displaying tab content
		$(active_tab_selector).removeClass('active');
		$(active_tab_selector).addClass('hide');
 
		//show target tab content
		var target_tab_selector = $(this).attr('href');
		$(target_tab_selector).removeClass('hide');
		$(target_tab_selector).addClass('active');
	     });
	  });
</script>

<script>
//FULL STATE MNLEG MAP
var projection2 = d3.geo.mercator().scale([18000]).center([-94.3506,45.8288]);
var path2 = d3.geo.path().projection(projection2);

var svg2 = d3.select("#map-leg").append("svg:svg");

var districts = svg2.append("svg:g");

var color1 = "#a7706b";
var color2 = "#79B0C5";
var basecolor = "#ddd";

d3.json("mnleg.json", function(json) {
        districts.selectAll("path")
           .data(json.features)
           .enter()
           .append("path")
           .attr("d", path2)
           .attr("stroke-width", 1.5)
           .style("stroke", "white")
           .style("fill", "black")
           .attr('id', function(d) {
                return d.properties.DISTRICT + "-mnlegmap";
            })
           .text(function(d) { return d.properties.DISTRICT; })
           .style("fill", function(d) {
                                //Get data value
                                var value = update(d.properties.Party);

                               if (value != null && d.properties.DISTRICT == 'R') {
                                       return color1;
                               } else if (value != null && d.properties.Party == "DFL") {
                                        return color2;
                               } else if (value != null && d.properties.Party == "DFL") {
                                        return color2;
                                } else {
                                       return basecolor;
                               }
                  })
             .call(d3.helper.tooltip(
        function(d, i){
          return "<b>"+ d.properties.DISTRICT + "</b>";
        }
        ));
    
 });

var resultsData = "json/mnhouse.json";

d3.select("#halp").selectAll("p").data(resultsData.results).enter().append("p");
d3.selectAll("p").text(function(d ,i) { return d.items.header + "blarg" });

</script>

<script>
//FULL METRO AREA MNLEG MAP
var projection = d3.geo.mercator().scale([130000]).center([-92.9004,45.0968]);

var path = d3.geo.path()
                 .projection(projection);

var svg = d3.select("#map-leg2 svg");

var color1 = "#a7706b";
var color2 = "#79B0C5";
var basecolor = "#ddd";
var blankcolor = "#fff";

d3.json("mnleg.json", function(json) {
   d3.json("json/mnhouse.json", function(mnleg) {
        svg.selectAll("path")
           .data(json.features)
           .enter()
           .append("path")
           .attr("d", path)
           .attr("stroke-width", 1.5)
           .style("stroke", "white")
           .attr('id', function(d) {
                return d.properties.DISTRICT + "-metlegmap";
            })
           .text(function(d) { return d.properties.DISTRICT; })
           .style("fill", function(d) {
                                //Get data value
                                var value = update(d.properties.Party);

                                if (value != null && d.properties.DISTRICT == "14B") {
                                        return blankcolor;
                                }
                                if (value != null && d.properties.DISTRICT == "13A") {
                                        return blankcolor;
                                }
                                if (value != null && d.properties.DISTRICT == "15B") {
                                        return blankcolor;
                                }
                                if (value != null && d.properties.DISTRICT == "15A") {
                                        return blankcolor;
                                }
                                if (value != null && d.properties.DISTRICT == "31A") {
                                        return blankcolor;
                               }
                               if (value != null && d.properties.DISTRICT == "32A") {
                                       return blankcolor;
                                }
                               if (value != null && d.properties.DISTRICT == "29A") {
                                        return blankcolor;
                               }
                                if (value != null && d.properties.DISTRICT == "29B") {
                                       return blankcolor;
                                }
                                if (value != null && d.properties.DISTRICT == "47A") {
                                        return blankcolor;
                                }
                                if (value != null && d.properties.DISTRICT == "18B") {
                                       return blankcolor;
                                }
                                if (value != null && d.properties.DISTRICT == "20A") {
                                        return blankcolor;
                                }
                                if (value != null && d.properties.DISTRICT == "58B") {
                                        return blankcolor;
                               }
                                if (value != null && d.properties.DISTRICT == "21A") {
                                        return blankcolor;
                               }
                                if (value != null && d.properties.DISTRICT == "20B") {
                                       return blankcolor;
                               }
                                if (value != null && d.properties.DISTRICT == "14A") {
                                       return blankcolor;
                               }
                                if (value != null && d.properties.DISTRICT == "13B") {
                                       return blankcolor;
                               }
                                if (value != null && d.properties.DISTRICT == "18A") {
                                       return blankcolor;
                               }
                                if (value != null && d.properties.Party == "R") {
                                        return color1;
                               } else if (value != null && d.properties.Party == "DFL") {
                                        return color2;
                                } else {
                                        return basecolor;
                                }
                   })
             .call(d3.helper.tooltip(
        function(d, i){
          return "<b>"+ d.properties.DISTRICT + "</b>";
        }
        ));
    });
 });

</script>

<script>
//FULL STATE US REP MAP
var projection6 = d3.geo.mercator().scale([18000]).center([-94.3506,45.8288]);
var path6 = d3.geo.path()
                 .projection(projection6);

var svg6 = d3.select("#map-rep svg");

var color1 = "#a7706b";
var color2 = "#79B0C5";
var basecolor = "#ddd";

d3.json("usleg.json", function(json) {
   d3.json("json/mnreps.json", function(ushouse) {
        svg6.selectAll("path")
           .data(json.features)
           .enter()
           .append("path")
           .attr("d", path6)
           .attr("stroke-width", 1.5)
           .style("stroke", "white")
           .style("fill", "black")
           .attr('id', function(d) {
                return d.properties.NAMELSAD00 + "-mnrepmap";
            })
           .text(function(d) { return d.properties.DISTRICT; })
           .style("fill", function(d) {
                                //Get data value
                                var value = update(d.properties.Party);

                              if (value != null && d.properties.Party == "R") {
                                      return color1;
                                } else if (value != null && d.properties.Party == "DFL") {
                                        return color2;
                                } else if (value != null && d.properties.Party == "DFL") {
                                       return color2;
                                } else {
                                       return basecolor;
                               }
                  })
             .call(d3.helper.tooltip(
        function(d, i){
          return "<b>"+ d.properties.NAMELSAD00 + "</b>";
        }
        ));
     });
 });

</script>

<script>
//FULL STATE SENATE MAP
var projection7 = d3.geo.mercator().scale([18000]).center([-94.3506,45.8288]);
var path7 = d3.geo.path()
                 .projection(projection7);

var svg7 = d3.select("#map-sen svg");

var color1 = "#a7706b";
var color2 = "#79B0C5";
var basecolor = "#ddd";

d3.json("mncounties.json", function(json) {
   d3.json("json/mnsenate.json", function(ussen) {
        svg7.selectAll("path")
           .data(json.features)
           .enter()
           .append("path")
           .attr("d", path7)
           .attr("stroke-width", 1.5)
           .style("stroke", "white")
           .style("fill", "black")
           .attr('id', function(d) {
                return d.properties.NAME00 + "-mnsenmap";
            })
           .text(function(d) { return d.properties.DISTRICT; })
           .style("fill", function(d) {
                                //Get data value
                               var value = update(d.properties.Party);

                               if (value != null && d.properties.Party == "R") {
                                    return color1;
                                } else if (value != null && d.properties.Party == "DFL") {
                                       return color2;
                               } else if (value != null && d.properties.Party == "DFL") {
                                        return color2;
                                } else {
                                       return basecolor;
                               }
                  })
             .call(d3.helper.tooltip(
        function(d, i){
          return "<b>"+ d.properties.NAME00 + "</b>";
        }
        ));
    });
 });

</script>

<script>
//FULL STATE GOV MAP
var projection8 = d3.geo.mercator().scale([18000]).center([-94.3506,45.8288]);
var path8 = d3.geo.path()
                 .projection(projection8);

var svg8 = d3.select("#map-gov svg");

var color1 = "#a7706b";
var color2 = "#79B0C5";
var basecolor = "#ddd";

d3.json("mncounties.json", function(json) {
   d3.json("json/mngov.json", function(mngov) {
        svg8.selectAll("path")
           .data(json.features)
           .enter()
           .append("path")
           .attr("d", path8)
           .attr("stroke-width", 1.5)
           .style("stroke", "white")
           .style("fill", "black")
           .attr('id', function(d) {
                return d.properties.NAME00 + "-mngovmap";
            })
           .text(function(d) { return d.properties.DISTRICT; })
           .style("fill", function(d) {
                                //Get data value
                                var value = update(d.properties.Party);

                              if (value != null && d.properties.Party == "R") {
                                       return color1;
                                } else if (value != null && d.properties.Party == "DFL") {
                                        return color2;
                                } else if (value != null && d.properties.Party == "DFL") {
                                        return color2;
                                } else {
                                        return basecolor;
                               }
                  })
             .call(d3.helper.tooltip(
        function(d, i){
          return "<b>"+ d.properties.NAME00 + "</b>";
        }
        ));
    });
 });

</script>

<script>
//US REP MAP
var projection3 = d3.geo.albersUsa().scale(800);
var path3 = d3.geo.path()
                 .projection(projection3);

var svg3 = d3.select("#map-rep2 svg");

var color1 = "#a7706b";
var color2 = "#79B0C5";
var basecolor = "#ddd";
var blankcolor = "#fff";

d3.json("usdistricts.json", function(json) {
   d3.json("json/usreps.json", function(ushouse) {
        svg3.selectAll("path")
           .data(json.features)
           .enter()
           .append("path")
           .attr("d", path3)
           .attr("stroke-width", 1.5)
           .style("stroke", "white")
           .attr('id', function(d) {
                return d.properties.NAMELSAD + "-usrepmap";
            })
           .text(function(d) { return d.properties.NAMELSAD; })
                      .style("fill", function(d) {
                                //Get data value
                                var value = update(d.properties.NAME);

                                if (value != null && d.properties.NAME == "Puerto Rico") {
                                        return blankcolor;
                                }
                   })
             .call(d3.helper.tooltip(
        function(d, i){
          return "<b>"+ d.properties.NAMELSAD + "</b>";
        }
        ));
    });
 });

</script>

<script>
//US SENATE MAP
var projection4 = d3.geo.albersUsa().scale(800);
var path4 = d3.geo.path()
                 .projection(projection4);

var svg4 = d3.select("#map-sen2 svg");

var color1 = "#a7706b";
var color2 = "#79B0C5";
var basecolor = "#ddd";
var blankcolor = "#fff";

d3.json("states.json", function(json) {
   d3.json("json/ussenate.json", function(ussen) {
        svg4.selectAll("path")
           .data(json.features)
           .enter()
           .append("path")
           .attr("d", path4)
           .attr("stroke-width", 1.5)
           .style("stroke", "white")
           .attr('id', function(d) {
                return d.properties.NAME + "-ussenmap";
            })
           .text(function(d) { return d.properties.NAME; })
           .style("fill", function(d) {
                                //Get data value
                                var value = update(d.properties.NAME);

                                if (value != null && d.properties.NAME == "Puerto Rico") {
                                        return blankcolor;
                                }
                   })
             .call(d3.helper.tooltip(
        function(d, i){
          return "<b>"+ d.properties.NAME + "</b>";
        }
        ));
     });
 });

</script>

<script>
//US GOV MAP
var projection5 = d3.geo.albersUsa().scale(800);
var path5 = d3.geo.path()
                 .projection(projection5);

var svg5 = d3.select("#map-gov2 svg");

var color1 = "#a7706b";
var color2 = "#79B0C5";
var basecolor = "#ddd";
var blankcolor = "#fff";

d3.json("states.json", function(json) {
   d3.json("json/usgov.json", function(mngov) {
        svg5.selectAll("path")
           .data(json.features)
           .enter()
           .append("path")
           .attr("d", path5)
           .attr("stroke-width", 1.5)
           .style("stroke", "white")
           .attr('id', function(d) {
                return d.properties.NAME + "-usgovmap";
            })
           .text(function(d) { return d.properties.DISTRICT; })
           .style("fill", function(d) {
                                //Get data value
                                var value = update(d.properties.NAME);

                                if (value != null && d.properties.NAME == "Puerto Rico") {
                                        return blankcolor;
                                }
                   })
             .call(d3.helper.tooltip(
        function(d, i){
          return "<b>"+ d.properties.NAME + "</b>";
        }
        ));
     });
 });

</script>

<script>
//TOOLTIP STUFF
d3.helper = {};

d3.helper.tooltip = function(accessor){
    return function(selection){
        var tooltipDiv;
        var bodyNode = d3.select('body').node();
        selection.on("mouseover", function(d, i){
            // Clean up lost tooltips
            d3.select('body').selectAll('div.tooltip').remove();
            // Append tooltip
            tooltipDiv = d3.select('body').append('div').attr('class', 'tooltip');
            var absoluteMousePos = d3.mouse(bodyNode);
            tooltipDiv.style('left', (absoluteMousePos[0] + 10)+'px')
                .style('top', (absoluteMousePos[1] - 15)+'px')
                .style('position', 'absolute') 
                .style('z-index', 1001);
            // Add text using the accessor function
            var tooltipText = accessor(d, i) || '';
            // Crop text arbitrarily
            //tooltipDiv.style('width', function(d, i){return (tooltipText.length > 80) ? '300px' : null;})
            //    .html(tooltipText);
        })
        .on('mousemove', function(d, i) {
            // Move tooltip
            var absoluteMousePos = d3.mouse(bodyNode);
            tooltipDiv.style('left', (absoluteMousePos[0] + 10)+'px')
                .style('top', (absoluteMousePos[1] - 15)+'px');
            var tooltipText = accessor(d, i) || '';
            tooltipDiv.html(tooltipText);
        })
        .on("mouseout", function(d, i){
            // Remove tooltip
            tooltipDiv.remove();
        });

    };
};

function update(stuff){
 
var factor3 = stuff;

return factor3;
                               
}
</script>

<script>
//POWER BAR
var chart2;

nv.addGraph(function() {

  chart2 = nv.models.multiBarHorizontalChart()
      .x(function(d) { return d.label })
      .y(function(d) { return d.value })
      .margin({top: 30, right: 20, bottom: 30, left: 20})
      //.showValues(true)
      .tooltips(true)
      .showLegend(true)
      //.barColor(#006d2c,#31a354,#74c476,#bae4b3,#edf8e9)
      .transitionDuration(250)
      .stacked(true)
      .color(['#79B0C5','#dddddd','#A7706B','#92B28D'])
      .showControls(false);

  chart2.yAxis
      .tickFormat(d3.format(','));

  d3.select('#tracker svg')
      .datum(govData)
      .call(chart2);

  nv.utils.windowResize(chart2.update);

  chart2.dispatch.on('stateChange', function(e) { nv.log('New State:', JSON.stringify(e)); });

chart2.tooltip(function(key, x, y, e, graph) {
    return x + ' Seats: ' +  y + ' ' + key;
});

  return chart2;

});


//BAR DATA
govData = [ 
  {
    key: 'Mark Dayton',
    values: [
      { 
        "label" : " " ,
        "value" : 63
      }
    ]
  },
  {
    key: 'Undetermined',
    values: [
      { 
        "label" : " " ,
        "value" : 10
      }
    ]
  },
  {
    key: 'Jeff Johnson',
    values: [
      { 
        "label" : " " ,
        "value" : 30
      }
    ]
  },
  {
    key: 'Hannah Nicollet',
    values: [
      { 
        "label" : " " ,
        "value" : 0
      }
    ]
  }
];

repData = [ 
  {
    key: 'Democrat',
    values: [
      { 
        "label" : " " ,
        "value" : 33
      }
    ]
  },
  {
    key: 'Undetermined',
    values: [
      { 
        "label" : " " ,
        "value" : 40
      }
    ]
  },
  {
    key: 'Republican',
    values: [
      { 
        "label" : " " ,
        "value" : 61
      }
    ]
  }
];

mnlegData = [ 
  {
    key: 'DFL',
    values: [
      { 
        "label" : " " ,
        "value" : 63
      }
    ]
  },
  {
    key: 'Undetermined',
    values: [
      { 
        "label" : " " ,
        "value" : 50
      }
    ]
  },
  {
    key: 'GOP',
    values: [
      { 
        "label" : " " ,
        "value" : 11
      }
    ]
  }
];

senData = [ 
  {
    key: 'Al Franken',
    values: [
      { 
        "label" : " " ,
        "value" : 63
      }
    ]
  },
  {
    key: 'Undetermined',
    values: [
      { 
        "label" : " " ,
        "value" : 50
      }
    ]
  },
  {
    key: 'Mike McFadden',
    values: [
      { 
        "label" : " " ,
        "value" : 11
      }
    ]
  },
  {
    key: 'Steve Carlson',
    values: [
      { 
        "label" : " " ,
        "value" : 11
      }
    ]
  }
];
</script>

<script>
//CARTOGRAPHIC GREATER MINNESOTA MNLEG MAP
$(document).ready(function() {
    cartogram.init();
});

var cartogram = {
    margin: {
        top: 70,
        right: 0,
        bottom: 0,
        left: 60
    },

    selector: '#target-leg',

    init: function() {
        var self = this;

        self.$el = $(self.selector);

        self.width = 350 - self.margin.left - self.margin.right;
        self.height = 350 - self.margin.top - self.margin.bottom;

        self.svg = d3.select(self.selector).append('svg')
            .attr('height', self.height + self.margin.top + self.margin.bottom)
            .attr('width', self.width + self.margin.left + self.margin.right)

        self.state_size = self.width / 12;
        self.state_padding = 2;

        self.map = self.svg.append('g')
            .attr('transform', 'translate(' + self.margin.left + ','
                  + self.margin.top + ')')

        self.drawMap();
    },

    drawMap: function() {
        var self = this;

        var states = self.map.selectAll('.states')
            .data(self.state_pos)
            .enter().append('g')
            .attr('class', 'state-groups');

        var state = states.append('rect')
            .attr('id', function(d) {
                return d.state_postal + "-mnleg";
            })
            .attr('class', 'state')
            .attr('rx', 2)
            .attr('ry', 2)
            .attr('x', function(d) {
                return d.column * (self.state_size + self.state_padding);
            })
            .attr('y', function(d) {
                return d.row * (self.state_size + self.state_padding);
            })
            .attr('width', self.state_size)
            .attr('height', self.state_size)
            .call(d3.helper.tooltip(
        function(d, i){
          return "<b>" + d.state_full + "</b>";
       }
        ));

        var text = states.append('text')
            .attr('class', 'state-label')
            .attr('dominant-baseline', 'central')
            .attr('x', function(d) {
                return (d.column * (self.state_size + self.state_padding))
                        + self.state_size / 2; })
            .attr('y', function(d) {
                return (d.row * (self.state_size + self.state_padding))
                    + self.state_size / 2; })
            .style('text-anchor', 'middle')
            .text(function(d) {
                return d.state_postal;
            });
    },

    state_pos: [{'state_full':'District 1A','state_postal':'1A','row':0,'column':0,'color_value':' '},
        {'state_full':'District 1A','state_postal':'2A','row':-1,'column':1,'color_value':' '},
        {'state_full':'District 1B','state_postal':'1B','row':0,'column':1,'color_value':' '},
        {'state_full':'District 2B','state_postal':'2B','row':0,'column':2,'color_value':' '},
        {'state_full':'District 6A','state_postal':'6A','row':0,'column':3,'color_value':' '},
        {'state_full':'District 6B','state_postal':'6B','row':0,'column':4,'color_value':' '},
        {'state_full':'District 3B','state_postal':'3B','row':0,'column':5,'color_value':' '},
        {'state_full':'District 3A','state_postal':'3A','row':0,'column':6,'color_value':' '},
        {'state_full':'District 4A','state_postal':'4A','row':1,'column':0,'color_value':' '},
        {'state_full':'District 4B','state_postal':'4B','row':1,'column':1,'color_value':' '},
        {'state_full':'District 5A','state_postal':'5A','row':1,'column':2,'color_value':' '},
        {'state_full':'District 5B','state_postal':'5B','row':1,'column':3,'color_value':' '},
        {'state_full':'District 7B','state_postal':'7B','row':1,'column':4,'color_value':' '},
        {'state_full':'District 7A','state_postal':'7A','row':1,'column':5,'color_value':' '},
        {'state_full':'District 8A','state_postal':'8A','row':2,'column':0,'color_value':' '},
        {'state_full':'District 8B','state_postal':'8B','row':2,'column':1,'color_value':' '},
        {'state_full':'District 10A','state_postal':'10A','row':2,'column':2,'color_value':' '},
        {'state_full':'District 10B','state_postal':'10B','row':2,'column':3,'color_value':' '},
        {'state_full':'District 11A','state_postal':'11A','row':2,'column':4,'color_value':' '},
        {'state_full':'District 12A','state_postal':'12A','row':3,'column':0,'color_value':' '},
        {'state_full':'District 9A','state_postal':'9A','row':3,'column':1,'color_value':' '},
        {'state_full':'District 9B','state_postal':'9B','row':3,'column':2,'color_value':' '},
        {'state_full':'District 15B','state_postal':'15B','row':3,'column':3,'color_value':' '},
        {'state_full':'District 11B','state_postal':'11B','row':3,'column':4,'color_value':' '},
        {'state_full':'District 12B','state_postal':'12B','row':4,'column':0,'color_value':' '},
        {'state_full':'District 13A','state_postal':'13A','row':4,'column':1,'color_value':' '},
        {'state_full':'District 13B','state_postal':'13B','row':4,'column':2,'color_value':' '},
        {'state_full':'District 15A','state_postal':'15A','row':4,'column':3,'color_value':' '},
        {'state_full':'District 32A','state_postal':'32A','row':4,'column':4,'color_value':' '},
        {'state_full':'District 17A','state_postal':'17A','row':5,'column':0,'color_value':' '},
        {'state_full':'District 17B','state_postal':'17B','row':5,'column':1,'color_value':' '},
        {'state_full':'District 14A','state_postal':'14A','row':5,'column':2,'color_value':' '},
        {'state_full':'District 14B','state_postal':'14B','row':5,'column':3,'color_value':' '},
        {'state_full':'District 31A','state_postal':'31A','row':5,'column':4,'color_value':' '},
        {'state_full':'District 15A','state_postal':'15A','row':6,'column':0,'color_value':' '},
        {'state_full':'District 18A','state_postal':'18A','row':6,'column':1,'color_value':' '},
        {'state_full':'District 29A','state_postal':'29A','row':6,'column':2,'color_value':' '},
        {'state_full':'District 29B','state_postal':'29B','row':6,'column':3,'color_value':' '},
        {'state_full':'District 16B','state_postal':'16B','row':7,'column':0,'color_value':' '},
        {'state_full':'District 18B','state_postal':'18B','row':7,'column':1,'color_value':' '},
        {'state_full':'District 47A','state_postal':'47A','row':7,'column':2,'color_value':' '},
        {'state_full':'District 33A','state_postal':'33A','row':7,'column':3,'color_value':' '},
        {'state_full':'District 19A','state_postal':'19A','row':8,'column':0,'color_value':' '},
        {'state_full':'District 20A','state_postal':'20A','row':8,'column':1,'color_value':' '},
        {'state_full':'District 20B','state_postal':'20B','row':8,'column':2,'color_value':' '},
        {'state_full':'District 58B','state_postal':'58B','row':8,'column':3,'color_value':' '},
        {'state_full':'District 21A','state_postal':'21A','row':8,'column':4,'color_value':' '},
        {'state_full':'District 21B','state_postal':'21B','row':8,'column':5,'color_value':' '},
        {'state_full':'District 22B','state_postal':'22B','row':9,'column':0,'color_value':' '},
        {'state_full':'District 19B','state_postal':'19B','row':9,'column':1,'color_value':' '},
        {'state_full':'District 23B','state_postal':'23B','row':9,'column':2,'color_value':' '},
        {'state_full':'District 25B','state_postal':'25B','row':9,'column':3,'color_value':' '},
        {'state_full':'District 25A','state_postal':'24B','row':9,'column':4,'color_value':' '},
        {'state_full':'District 25A','state_postal':'25A','row':9,'column':5,'color_value':' '},
        {'state_full':'District 28A','state_postal':'28A','row':9,'column':6,'color_value':' '},
        {'state_full':'District 22A','state_postal':'22A','row':10,'column':0,'color_value':' '},
        {'state_full':'District 23B','state_postal':'23B','row':10,'column':1,'color_value':' '},
        {'state_full':'District 24A','state_postal':'24A','row':10,'column':2,'color_value':' '},
        {'state_full':'District 26A','state_postal':'26B','row':10,'column':3,'color_value':' '},
        {'state_full':'District 26A','state_postal':'26A','row':10,'column':4,'color_value':' '},
        {'state_full':'District 27A','state_postal':'27A','row':10,'column':5,'color_value':' '},
        {'state_full':'District 27A','state_postal':'27B','row':10,'column':6,'color_value':' '},
        {'state_full':'District 28A','state_postal':'28B','row':10,'column':7,'color_value':' '}
        ]

};
</script>



<script>
//CARTOGRAPHIC METRO AREA MNLEG MAP
$(document).ready(function() {
    cartogram2.init();
});

var cartogram2 = {
    margin: {
        top: 70,
        right: 0,
        bottom: 0,
        left: 60
    },

    selector: '#target-leg2',

    init: function() {
        var self = this;

        self.$el = $(self.selector);

        self.width = 350 - self.margin.left - self.margin.right;
        self.height = 350 - self.margin.top - self.margin.bottom;

        self.svg = d3.select(self.selector).append('svg')
            .attr('height', self.height + self.margin.top + self.margin.bottom)
            .attr('width', self.width + self.margin.left + self.margin.right)

        self.state_size = self.width / 12;
        self.state_padding = 2;

        self.map = self.svg.append('g')
            .attr('transform', 'translate(' + self.margin.left + ','
                  + self.margin.top + ')')

        self.drawMap();
    },

    drawMap: function() {
        var self = this;

        var states = self.map.selectAll('.states')
            .data(self.state_pos2)
            .enter().append('g')
            .attr('class', 'state-groups');

        var state = states.append('rect')
            .attr('id', function(d) {
                return d.state_postal + "-metleg";
            })
            .attr('class', 'state')
            .attr('rx', 2)
            .attr('ry', 2)
            .attr('x', function(d) {
                return d.column * (self.state_size + self.state_padding);
            })
            .attr('y', function(d) {
                return d.row * (self.state_size + self.state_padding);
            })
            .attr('width', self.state_size)
            .attr('height', self.state_size)
            .call(d3.helper.tooltip(
        function(d, i){
          return "<b>" + d.state_full + "</b>";
       }
        ));

        var text = states.append('text')
            .attr('class', 'state-label')
            .attr('dominant-baseline', 'central')
            .attr('x', function(d) {
                return (d.column * (self.state_size + self.state_padding))
                        + self.state_size / 2; })
            .attr('y', function(d) {
                return (d.row * (self.state_size + self.state_padding))
                    + self.state_size / 2; })
            .style('text-anchor', 'middle')
            .text(function(d) {
                return d.state_postal;
            });
    },

    state_pos2: [{'state_full':'30A','state_postal':'30A','row':0,'column':2,'color_value':' '},
        {'state_full':'District 30B','state_postal':'30B','row':0,'column':3,'color_value':' '},
        {'state_full':'District 35A','state_postal':'35A','row':0,'column':4,'color_value':' '},
        {'state_full':'District 35B','state_postal':'35B','row':0,'column':5,'color_value':' '},
        {'state_full':'District 31B','state_postal':'31B','row':0,'column':6,'color_value':' '},
        {'state_full':'District 32B','state_postal':'32B','row':0,'column':7,'color_value':' '},
        {'state_full':'District 34A','state_postal':'34A','row':1,'column':1,'color_value':' '},
        {'state_full':'District 36A','state_postal':'36A','row':1,'column':2,'color_value':' '},
        {'state_full':'District 36B','state_postal':'36B','row':1,'column':3,'color_value':' '},
        {'state_full':'District 37A','state_postal':'37A','row':1,'column':4,'color_value':' '},
        {'state_full':'District 37B','state_postal':'37B','row':1,'column':5,'color_value':' '},
        {'state_full':'District 38A','state_postal':'38A','row':1,'column':6,'color_value':' '},
        {'state_full':'District 38B','state_postal':'38B','row':1,'column':7,'color_value':' '},
        {'state_full':'District 39A','state_postal':'39A','row':1,'column':8,'color_value':' '},
        {'state_full':'District 34B','state_postal':'34B','row':2,'column':1,'color_value':' '},
        {'state_full':'District 40A','state_postal':'40A','row':2,'column':2,'color_value':' '},
        {'state_full':'District 40B','state_postal':'40B','row':2,'column':3,'color_value':' '},
        {'state_full':'District 41A','state_postal':'41A','row':2,'column':4,'color_value':' '},
        {'state_full':'District 41B','state_postal':'41B','row':2,'column':5,'color_value':' '},
        {'state_full':'District 42A','state_postal':'42A','row':2,'column':6,'color_value':' '},
        {'state_full':'District 42B','state_postal':'42B','row':2,'column':7,'color_value':' '},
        {'state_full':'District 43A','state_postal':'43A','row':2,'column':8,'color_value':' '},
        {'state_full':'District 44A','state_postal':'44A','row':3,'column':0,'color_value':' '},
        {'state_full':'District 45A','state_postal':'45A','row':3,'column':1,'color_value':' '},
        {'state_full':'District 45B','state_postal':'45B','row':3,'column':2,'color_value':' '},
        {'state_full':'District 59A','state_postal':'59A','row':3,'column':3,'color_value':' '},
        {'state_full':'District 60A','state_postal':'60A','row':3,'column':4,'color_value':' '},
        {'state_full':'District 66A','state_postal':'66A','row':3,'column':5,'color_value':' '},
        {'state_full':'District 66B','state_postal':'66B','row':3,'column':6,'color_value':' '},
        {'state_full':'District 67A','state_postal':'67A','row':3,'column':7,'color_value':' '},
        {'state_full':'District 43B','state_postal':'43B','row':3,'column':8,'color_value':' '},
        {'state_full':'District 39B','state_postal':'39B','row':3,'column':9,'color_value':' '},
        {'state_full':'District 44B','state_postal':'44B','row':4,'column':1,'color_value':' '},
        {'state_full':'District 46A','state_postal':'46A','row':4,'column':2,'color_value':' '},
        {'state_full':'District 59B','state_postal':'59B','row':4,'column':3,'color_value':' '},
        {'state_full':'District 60B','state_postal':'60B','row':4,'column':4,'color_value':' '},
        {'state_full':'District 64A','state_postal':'64A','row':4,'column':5,'color_value':' '},
        {'state_full':'District 65A','state_postal':'65A','row':4,'column':6,'color_value':' '},
        {'state_full':'District 67B','state_postal':'67B','row':4,'column':7,'color_value':' '},
        {'state_full':'District 53A','state_postal':'53A','row':4,'column':8,'color_value':' '},
        {'state_full':'District 33B','state_postal':'33B','row':5,'column':1,'color_value':' '},
        {'state_full':'District 46B','state_postal':'46B','row':5,'column':2,'color_value':' '},
        {'state_full':'District 61A','state_postal':'61A','row':5,'column':3,'color_value':' '},
        {'state_full':'District 62A','state_postal':'62A','row':5,'column':4,'color_value':' '},
        {'state_full':'District 63A','state_postal':'63A','row':5,'column':5,'color_value':' '},
        {'state_full':'District 65B','state_postal':'65B','row':5,'column':6,'color_value':' '},
        {'state_full':'District 53B','state_postal':'53B','row':5,'column':7,'color_value':' '},
        {'state_full':'District 54B','state_postal':'54B','row':5,'column':8,'color_value':' '},
        {'state_full':'District 48A','state_postal':'48A','row':6,'column':1,'color_value':' '},
        {'state_full':'District 49A','state_postal':'49A','row':6,'column':2,'color_value':' '},
        {'state_full':'District 61B','state_postal':'61B','row':6,'column':3,'color_value':' '},
        {'state_full':'District 62B','state_postal':'62B','row':6,'column':4,'color_value':' '},
        {'state_full':'District 63B','state_postal':'63B','row':6,'column':5,'color_value':' '},
        {'state_full':'District 64B','state_postal':'64B','row':6,'column':6,'color_value':' '},
        {'state_full':'District 52A','state_postal':'52A','row':6,'column':7,'color_value':' '},
        {'state_full':'District 54A','state_postal':'54A','row':6,'column':8,'color_value':' '},
        {'state_full':'District 47B','state_postal':'47B','row':7,'column':1,'color_value':' '},
        {'state_full':'District 48B','state_postal':'48B','row':7,'column':2,'color_value':' '},
        {'state_full':'District 49B','state_postal':'49B','row':7,'column':3,'color_value':' '},
        {'state_full':'District 50A','state_postal':'50A','row':7,'column':4,'color_value':' '},
        {'state_full':'District 50B','state_postal':'50B','row':7,'column':5,'color_value':' '},
        {'state_full':'District 51A','state_postal':'51A','row':7,'column':6,'color_value':' '},
        {'state_full':'District 51B','state_postal':'51B','row':7,'column':7,'color_value':' '},
        {'state_full':'District 52B','state_postal':'52B','row':7,'column':8,'color_value':' '},
        {'state_full':'District 55A','state_postal':'55A','row':8,'column':2,'color_value':' '},
        {'state_full':'District 55B','state_postal':'55B','row':8,'column':3,'color_value':' '},
        {'state_full':'District 56A','state_postal':'56A','row':8,'column':4,'color_value':' '},
        {'state_full':'District 56B','state_postal':'56B','row':8,'column':5,'color_value':' '},
        {'state_full':'District 58A','state_postal':'58A','row':8,'column':6,'color_value':' '},
        {'state_full':'District 57A','state_postal':'57A','row':8,'column':7,'color_value':' '},
        {'state_full':'District 57B','state_postal':'57B','row':8,'column':8,'color_value':' '}
        ]

};
</script>

<script>
//CARTOGRAPHIC US GOV MAP
$(document).ready(function() {
    cartogram6.init();
});

var cartogram6 = {
    margin: {
        top: 70,
        right: 0,
        bottom: 0,
        left: 60
    },

    selector: '#target-gov2',

    init: function() {
        var self = this;

        self.$el = $(self.selector);

        self.width = 350 - self.margin.left - self.margin.right;
        self.height = 350 - self.margin.top - self.margin.bottom;

        self.svg = d3.select(self.selector).append('svg')
            .attr('height', self.height + self.margin.top + self.margin.bottom)
            .attr('width', self.width + self.margin.left + self.margin.right)

        self.state_size = self.width / 12;
        self.state_padding = 2;

        self.map = self.svg.append('g')
            .attr('transform', 'translate(' + self.margin.left + ','
                  + self.margin.top + ')')

        self.drawMap();
    },

    drawMap: function() {
        var self = this;

        var states = self.map.selectAll('.states')
            .data(self.state_pos_co22)
            .enter().append('g')
            .attr('class', 'state-groups');

        var state = states.append('rect')
            .attr('id', function(d) {
                return d.state_postal + "-usgov";
            })
            .attr('class', 'state')
            .attr('rx', 2)
            .attr('ry', 2)
            .attr('x', function(d) {
                return d.column * (self.state_size + self.state_padding);
            })
            .attr('y', function(d) {
                return d.row * (self.state_size + self.state_padding);
            })
            .attr('width', self.state_size)
            .attr('height', self.state_size)
            .call(d3.helper.tooltip(
        function(d, i){
          return "<b>" + d.state_full + "</b>";
       }
        ));

        var text = states.append('text')
            .attr('class', 'state-label')
            .attr('dominant-baseline', 'central')
            .attr('x', function(d) {
                return (d.column * (self.state_size + self.state_padding))
                        + self.state_size / 2; })
            .attr('y', function(d) {
                return (d.row * (self.state_size + self.state_padding))
                    + self.state_size / 2; })
            .style('text-anchor', 'middle')
            .text(function(d) {
                return d.state_postal;
            });
    },

    state_pos_co22: [{'state_full':'Alabama','state_postal':'AL','row':5,'column':6,'color_value':' '},
        {'state_full':'Alaska','state_postal':'AK','row':6,'column':0,'color_value':' '},
        {'state_full':'Arizona','state_postal':'AZ','row':4,'column':1,'color_value':' '},
        {'state_full':'Arkansas','state_postal':'AR','row':4,'column':4,'color_value':' '},
        {'state_full':'California','state_postal':'CA','row':2,'column':0,'color_value':' '},
        {'state_full':'Colorado','state_postal':'CO','row':3,'column':2,'color_value':' '},
        {'state_full':'Connecticut','state_postal':'CT','row':2,'column':9,'color_value':' '},
        {'state_full':'D.C.','state_postal':'DC','row':4,'column':8,'color_value':' '},
        {'state_full':'Delaware','state_postal':'DE','row':3,'column':9,'color_value':' '},
        {'state_full':'Florida','state_postal':'FL','row':6,'column':8,'color_value':' '},
        {'state_full':'Georgia','state_postal':'GA','row':5,'column':7,'color_value':' '},
        {'state_full':'Hawaii','state_postal':'HI','row':6,'column':-1,'color_value':' '},
        {'state_full':'Idaho','state_postal':'ID','row':1,'column':1,'color_value':' '},
        {'state_full':'Illinois','state_postal':'IL','row':1,'column':6,'color_value':' '},
        {'state_full':'Indiana','state_postal':'IN','row':2,'column':5,'color_value':' '},
        {'state_full':'Iowa','state_postal':'IA','row':2,'column':4,'color_value':' '},
        {'state_full':'Kansas','state_postal':'KS','row':4,'column':3,'color_value':' '},
        {'state_full':'Kentucky','state_postal':'KY','row':3,'column':5,'color_value':' '},
        {'state_full':'Louisiana','state_postal':'LA','row':5,'column':4,'color_value':' '},
        {'state_full':'Maine','state_postal':'ME','row':-1,'column':10,'color_value':' '},
        {'state_full':'Maryland','state_postal':'MD','row':3,'column':8,'color_value':' '},
        {'state_full':'Massachusetts','state_postal':'MA','row':1,'column':9,'color_value':' '},
        {'state_full':'Michigan','state_postal':'MI','row':1,'column':7,'color_value':' '},
        {'state_full':'Minnesota','state_postal':'MN','row':1,'column':4,'color_value':' '},
        {'state_full':'Mississippi','state_postal':'MS','row':5,'column':5,'color_value':' '},
        {'state_full':'Missouri','state_postal':'MO','row':3,'column':4,'color_value':' '},
        {'state_full':'Montana','state_postal':'MT','row':1,'column':2,'color_value':' '},
        {'state_full':'Nebraska','state_postal':'NE','row':3,'column':3,'color_value':' '},
        {'state_full':'Nevada','state_postal':'NV','row':2,'column':1,'color_value':' '},
        {'state_full':'New Hampshire','state_postal':'NH','row':0,'column':10,'color_value':' '},
        {'state_full':'New Jersey','state_postal':'NJ','row':2,'column':8,'color_value':' '},
        {'state_full':'New Mexico','state_postal':'NM','row':4,'column':2,'color_value':' '},
        {'state_full':'New York','state_postal':'NY','row':1,'column':8,'color_value':' '},
        {'state_full':'North Carolina','state_postal':'NC','row':4,'column':6,'color_value':' '},
        {'state_full':'North Dakota','state_postal':'ND','row':1,'column':3,'color_value':' '},
        {'state_full':'Ohio','state_postal':'OH','row':2,'column':6,'color_value':' '},
        {'state_full':'Oklahoma','state_postal':'OK','row':5,'column':3,'color_value':' '},
        {'state_full':'Oregon','state_postal':'OR','row':1,'column':0,'color_value':' '},
        {'state_full':'Pennsylvania','state_postal':'PA','row':2,'column':7,'color_value':' '},
        {'state_full':'Rhode Island','state_postal':'RI','row':2,'column':10,'color_value':' '},
        {'state_full':'South Carolina','state_postal':'SC','row':4,'column':7,'color_value':' '},
        {'state_full':'South Dakota','state_postal':'SD','row':2,'column':3,'color_value':' '},
        {'state_full':'Tennessee','state_postal':'TN','row':4,'column':5,'color_value':' '},
        {'state_full':'Texas','state_postal':'TX','row':6,'column':3,'color_value':' '},
        {'state_full':'Utah','state_postal':'UT','row':3,'column':1,'color_value':' '},
        {'state_full':'Vermont','state_postal':'VT','row':0,'column':9,'color_value':' '},
        {'state_full':'Virginia','state_postal':'VA','row':3,'column':7,'color_value':' '},
        {'state_full':'Washington','state_postal':'WA','row':0,'column':0,'color_value':' '},
        {'state_full':'West Virginia','state_postal':'WV','row':3,'column':6,'color_value':' '},
        {'state_full':'Wisconsin','state_postal':'WI','row':1,'column':5,'color_value':' '},
        {'state_full':'Wyoming','state_postal':'WY','row':2,'column':2,'color_value':' '}]

};
</script>

<script>
//CARTOGRAPHIC US SENATE MAP
$(document).ready(function() {
    cartogram5.init();
});

var cartogram5 = {
    margin: {
        top: 70,
        right: 0,
        bottom: 0,
        left: 60
    },

    selector: '#target-sen2',

    init: function() {
        var self = this;

        self.$el = $(self.selector);

        self.width = 350 - self.margin.left - self.margin.right;
        self.height = 350 - self.margin.top - self.margin.bottom;

        self.svg = d3.select(self.selector).append('svg')
            .attr('height', self.height + self.margin.top + self.margin.bottom)
            .attr('width', self.width + self.margin.left + self.margin.right)

        self.state_size = self.width / 12;
        self.state_padding = 2;

        self.map = self.svg.append('g')
            .attr('transform', 'translate(' + self.margin.left + ','
                  + self.margin.top + ')')

        self.drawMap();
    },

    drawMap: function() {
        var self = this;

        var states = self.map.selectAll('.states')
            .data(self.state_pos_co2)
            .enter().append('g')
            .attr('class', 'state-groups');

        var state = states.append('rect')
            .attr('id', function(d) {
                return d.state_postal + "-ussen";
            })
            .attr('class', 'state')
            .attr('rx', 2)
            .attr('ry', 2)
            .attr('x', function(d) {
                return d.column * (self.state_size + self.state_padding);
            })
            .attr('y', function(d) {
                return d.row * (self.state_size + self.state_padding);
            })
            .attr('width', self.state_size)
            .attr('height', self.state_size)
            .call(d3.helper.tooltip(
        function(d, i){
          return "<b>" + d.state_full + "</b>";
       }
        ));

        var text = states.append('text')
            .attr('class', 'state-label')
            .attr('dominant-baseline', 'central')
            .attr('x', function(d) {
                return (d.column * (self.state_size + self.state_padding))
                        + self.state_size / 2; })
            .attr('y', function(d) {
                return (d.row * (self.state_size + self.state_padding))
                    + self.state_size / 2; })
            .style('text-anchor', 'middle')
            .text(function(d) {
                return d.state_postal;
            });
    },

    state_pos_co2: [{'state_full':'Alabama','state_postal':'AL','row':5,'column':6,'color_value':' '},
        {'state_full':'Alaska','state_postal':'AK','row':6,'column':0,'color_value':' '},
        {'state_full':'Arizona','state_postal':'AZ','row':4,'column':1,'color_value':' '},
        {'state_full':'Arkansas','state_postal':'AR','row':4,'column':4,'color_value':' '},
        {'state_full':'California','state_postal':'CA','row':2,'column':0,'color_value':' '},
        {'state_full':'Colorado','state_postal':'CO','row':3,'column':2,'color_value':' '},
        {'state_full':'Connecticut','state_postal':'CT','row':2,'column':9,'color_value':' '},
        {'state_full':'D.C.','state_postal':'DC','row':4,'column':8,'color_value':' '},
        {'state_full':'Delaware','state_postal':'DE','row':3,'column':9,'color_value':' '},
        {'state_full':'Florida','state_postal':'FL','row':6,'column':8,'color_value':' '},
        {'state_full':'Georgia','state_postal':'GA','row':5,'column':7,'color_value':' '},
        {'state_full':'Hawaii','state_postal':'HI','row':6,'column':-1,'color_value':' '},
        {'state_full':'Idaho','state_postal':'ID','row':1,'column':1,'color_value':' '},
        {'state_full':'Illinois','state_postal':'IL','row':1,'column':6,'color_value':' '},
        {'state_full':'Indiana','state_postal':'IN','row':2,'column':5,'color_value':' '},
        {'state_full':'Iowa','state_postal':'IA','row':2,'column':4,'color_value':' '},
        {'state_full':'Kansas','state_postal':'KS','row':4,'column':3,'color_value':' '},
        {'state_full':'Kentucky','state_postal':'KY','row':3,'column':5,'color_value':' '},
        {'state_full':'Louisiana','state_postal':'LA','row':5,'column':4,'color_value':' '},
        {'state_full':'Maine','state_postal':'ME','row':-1,'column':10,'color_value':' '},
        {'state_full':'Maryland','state_postal':'MD','row':3,'column':8,'color_value':' '},
        {'state_full':'Massachusetts','state_postal':'MA','row':1,'column':9,'color_value':' '},
        {'state_full':'Michigan','state_postal':'MI','row':1,'column':7,'color_value':' '},
        {'state_full':'Minnesota','state_postal':'MN','row':1,'column':4,'color_value':' '},
        {'state_full':'Mississippi','state_postal':'MS','row':5,'column':5,'color_value':' '},
        {'state_full':'Missouri','state_postal':'MO','row':3,'column':4,'color_value':' '},
        {'state_full':'Montana','state_postal':'MT','row':1,'column':2,'color_value':' '},
        {'state_full':'Nebraska','state_postal':'NE','row':3,'column':3,'color_value':' '},
        {'state_full':'Nevada','state_postal':'NV','row':2,'column':1,'color_value':' '},
        {'state_full':'New Hampshire','state_postal':'NH','row':0,'column':10,'color_value':' '},
        {'state_full':'New Jersey','state_postal':'NJ','row':2,'column':8,'color_value':' '},
        {'state_full':'New Mexico','state_postal':'NM','row':4,'column':2,'color_value':' '},
        {'state_full':'New York','state_postal':'NY','row':1,'column':8,'color_value':' '},
        {'state_full':'North Carolina','state_postal':'NC','row':4,'column':6,'color_value':' '},
        {'state_full':'North Dakota','state_postal':'ND','row':1,'column':3,'color_value':' '},
        {'state_full':'Ohio','state_postal':'OH','row':2,'column':6,'color_value':' '},
        {'state_full':'Oklahoma','state_postal':'OK','row':5,'column':3,'color_value':' '},
        {'state_full':'Oregon','state_postal':'OR','row':1,'column':0,'color_value':' '},
        {'state_full':'Pennsylvania','state_postal':'PA','row':2,'column':7,'color_value':' '},
        {'state_full':'Rhode Island','state_postal':'RI','row':2,'column':10,'color_value':' '},
        {'state_full':'South Carolina','state_postal':'SC','row':4,'column':7,'color_value':' '},
        {'state_full':'South Dakota','state_postal':'SD','row':2,'column':3,'color_value':' '},
        {'state_full':'Tennessee','state_postal':'TN','row':4,'column':5,'color_value':' '},
        {'state_full':'Texas','state_postal':'TX','row':6,'column':3,'color_value':' '},
        {'state_full':'Utah','state_postal':'UT','row':3,'column':1,'color_value':' '},
        {'state_full':'Vermont','state_postal':'VT','row':0,'column':9,'color_value':' '},
        {'state_full':'Virginia','state_postal':'VA','row':3,'column':7,'color_value':' '},
        {'state_full':'Washington','state_postal':'WA','row':0,'column':0,'color_value':' '},
        {'state_full':'West Virginia','state_postal':'WV','row':3,'column':6,'color_value':' '},
        {'state_full':'Wisconsin','state_postal':'WI','row':1,'column':5,'color_value':' '},
        {'state_full':'Wyoming','state_postal':'WY','row':2,'column':2,'color_value':' '}]
};
</script>

<script>
//CARTOGRAPHIC US REP MAP

    var margin = {top: 10, left: 10, bottom: 10, right: 10}
    , width = 600
    , width = width - margin.left - margin.right
    , mapRatio = .5
    , height = 300;

    var projection10 = d3.geo.equirectangular()
              .scale(width/1.3)//this makes it larger or smaller for the space you have
              .translate([width / 4, height / 2.5]) 
              .center([-102, 47 ]); //move the map center to fit in the spsace

    var path10 = d3.geo.path()
          .projection(projection10);

    var svg10 = d3.select("#target-rep2").append('svg')
          .attr("width", width)
          .attr("height", height);

    var g = svg10.append("g").attr('transform',"translate(150,25)");

    makeCartogram();

    function makeCartogram() {
        d3.json("cartogram.json", function(error, us) {

            g.append("g").attr("id", "districts").selectAll("path")
            .data(topojson.feature(us, us.objects['cart113']).features)
            .enter().append("path")
                .attr("d", path10)
                .attr("id", function(d){return d.properties.State + '-' + d.properties['d']})
                .attr("class", function(d){return 'district ' + d.properties.State + '-' + d.properties['d'] + '-House'})
                .attr('data-hash-key',function(d){ return (d.properties.State + '-' + addZero(d.properties['d']))});
            g.append("g")
            .attr("id", "states")
            .selectAll("path")
            .data(topojson.feature(us, us.objects.states).features)
            .enter().append("path")
            .attr("d", path10)
            .attr('class', function(d){return 'state ' + d.properties.State.replace(/ /g,'')})
            .attr('data-hash-key', function(d){ return d.properties.State});      
        })
    }
</script>

<script>
//CARTOGRAPHIC GREATER MINNESOTA US REP MAP
$(document).ready(function() {
    cartogram4.init();
});

var cartogram4 = {
    margin: {
        top: 70,
        right: 0,
        bottom: 0,
        left: 60
    },

    selector: '#target-rep',

    init: function() {
        var self = this;

        self.$el = $(self.selector);

        self.width = 500 - self.margin.left - self.margin.right;
        self.height = 500 - self.margin.top - self.margin.bottom;

        self.svg = d3.select(self.selector).append('svg')
            .attr('height', self.height + self.margin.top + self.margin.bottom)
            .attr('width', self.width + self.margin.left + self.margin.right)

        self.state_size = self.width / 12;
        self.state_padding = 2;

        self.map = self.svg.append('g')
            .attr('transform', 'translate(' + self.margin.left + ','
                  + self.margin.top + ')')

        self.drawMap();
    },

    drawMap: function() {
        var self = this;

        var states = self.map.selectAll('.states')
            .data(self.state_pos_c1)
            .enter().append('g')
            .attr('class', 'state-groups');

        var state = states.append('rect')
            .attr('id', function(d) {
                return d.state_postal + "-mnrep";
            })
            .attr('class', 'state')
            .attr('rx', 2)
            .attr('ry', 2)
            .attr('x', function(d) {
                return d.column * (self.state_size + self.state_padding);
            })
            .attr('y', function(d) {
                return d.row * (self.state_size + self.state_padding);
            })
            .attr('width', self.state_size)
            .attr('height', self.state_size)
            .call(d3.helper.tooltip(
        function(d, i){
          return "<b>" + d.state_full + "</b>";
       }
        ));

        var text = states.append('text')
            .attr('class', 'state-label')
            .attr('dominant-baseline', 'central')
            .attr('x', function(d) {
                return (d.column * (self.state_size + self.state_padding))
                        + self.state_size / 2; })
            .attr('y', function(d) {
                return (d.row * (self.state_size + self.state_padding))
                    + self.state_size / 2; })
            .style('text-anchor', 'middle')
            .text(function(d) {
                return d.state_postal;
            });
    },

    state_pos_c1: [{'state_full':'Congressional District 7','state_postal':'7','row':0,'column':0,'color_value':' '},
        {'state_full':'Congressional District 8','state_postal':'8','row':0,'column':1,'color_value':' '},
        {'state_full':'Congressional District 6','state_postal':'6','row':1,'column':0,'color_value':' '},
        {'state_full':'Congressional District 3','state_postal':'3','row':1,'column':1,'color_value':' '},
        {'state_full':'Congressional District 5','state_postal':'5','row':2,'column':0,'color_value':' '},
        {'state_full':'Congressional District 4','state_postal':'4','row':2,'column':1,'color_value':' '},
        {'state_full':'Congressional District 1','state_postal':'1','row':3,'column':0,'color_value':' '},
        {'state_full':'Congressional District 2','state_postal':'2','row':3,'column':1,'color_value':' '}
        ]
};
</script>

<script>
//CARTOGRAPHIC GREATER MINNESOTA SENATE MAP
$(document).ready(function() {
    cartogram7.init();
});

var cartogram7 = {
    margin: {
        top: 70,
        right: 0,
        bottom: 0,
        left: 60
    },

    selector: '#target-sen',

    init: function() {
        var self = this;

        self.$el = $(self.selector);

        self.width = 350 - self.margin.left - self.margin.right;
        self.height = 350 - self.margin.top - self.margin.bottom;

        self.svg = d3.select(self.selector).append('svg')
            .attr('height', self.height + self.margin.top + self.margin.bottom)
            .attr('width', self.width + self.margin.left + self.margin.right)

        self.state_size = self.width / 12;
        self.state_padding = 2;

        self.map = self.svg.append('g')
            .attr('transform', 'translate(' + self.margin.left + ','
                  + self.margin.top + ')')

        self.drawMap();
    },

    drawMap: function() {
        var self = this;

        var states = self.map.selectAll('.states')
            .data(self.state_pos_co)
            .enter().append('g')
            .attr('class', 'state-groups');

        var state = states.append('rect')
            .attr('id', function(d) {
                return d.state_postal + "-mnsen";
            })
            .attr('class', 'state')
            .attr('rx', 2)
            .attr('ry', 2)
            .attr('x', function(d) {
                return d.column * (self.state_size + self.state_padding);
            })
            .attr('y', function(d) {
                return d.row * (self.state_size + self.state_padding);
            })
            .attr('width', self.state_size)
            .attr('height', self.state_size)
            .call(d3.helper.tooltip(
        function(d, i){
          return "<b>" + d.state_full + "</b>";
       }
        ));

        var text = states.append('text')
            .attr('class', 'state-label')
            .attr('dominant-baseline', 'central')
            .attr('x', function(d) {
                return (d.column * (self.state_size + self.state_padding))
                        + self.state_size / 2; })
            .attr('y', function(d) {
                return (d.row * (self.state_size + self.state_padding))
                    + self.state_size / 2; })
            .style('text-anchor', 'middle')
            .text(function(d) {
                return d.state_postal;
            });
    },

    state_pos_co: [{'state_full':'Kittson','state_postal':'KITT','row':0,'column':0,'color_value':' '},
        {'state_full':'Lake of the Woods','state_postal':'LW','row':-1,'column':1,'color_value':' '},
        {'state_full':'Roseau','state_postal':'ROS','row':0,'column':1,'color_value':' '},
        {'state_full':'Koochiching','state_postal':'KOO','row':0,'column':2,'color_value':' '},
        {'state_full':'Saint Louis','state_postal':'STL','row':0,'column':3,'color_value':' '},
        {'state_full':'Lake','state_postal':'LAKE','row':0,'column':4,'color_value':' '},
        {'state_full':'Cook','state_postal':'COOK','row':0,'column':5,'color_value':' '},
        {'state_full':'Marshall','state_postal':'MAR','row':1,'column':0,'color_value':' '},
        {'state_full':'Beltrami','state_postal':'BEL','row':1,'column':1,'color_value':' '},
        {'state_full':'Itasca','state_postal':'ITAS','row':1,'column':2,'color_value':' '},
        {'state_full':'Aitkin','state_postal':'AITK','row':1,'column':3,'color_value':' '},
        {'state_full':'Carlton','state_postal':'CARL','row':1,'column':4,'color_value':' '},
        {'state_full':'Polk','state_postal':'POLK','row':2,'column':0,'color_value':' '},
        {'state_full':'Pennington','state_postal':'PENN','row':2,'column':1,'color_value':' '},
        {'state_full':'Red Lake','state_postal':'RL','row':2,'column':2,'color_value':' '},
        {'state_full':'Clearwater','state_postal':'CW','row':2,'column':3,'color_value':' '},
        {'state_full':'Hubbard','state_postal':'HUB','row':2,'column':4,'color_value':' '},
        {'state_full':'Norman','state_postal':'NORM','row':3,'column':0,'color_value':' '},
        {'state_full':'Mahnomen','state_postal':'MAHN','row':3,'column':1,'color_value':' '},
        {'state_full':'Cass','state_postal':'CASS','row':3,'column':2,'color_value':' '},
        {'state_full':'Crow Wing','state_postal':'CROW','row':3,'column':3,'color_value':' '},
        {'state_full':'Pine','state_postal':'PINE','row':3,'column':4,'color_value':' '},
        {'state_full':'Clay','state_postal':'CLAY','row':4,'column':0,'color_value':' '},
        {'state_full':'Becker','state_postal':'BECK','row':4,'column':1,'color_value':' '},
        {'state_full':'Wadena','state_postal':'WAD','row':4,'column':2,'color_value':' '},
        {'state_full':'Mille Lacs','state_postal':'ML','row':4,'column':3,'color_value':' '},
        {'state_full':'Kanabec','state_postal':'KANA','row':4,'column':4,'color_value':' '},
        {'state_full':'Wilkin','state_postal':'WILK','row':5,'column':0,'color_value':' '},
        {'state_full':'Ottertail','state_postal':'OT','row':5,'column':1,'color_value':' '},
        {'state_full':'Todd','state_postal':'TODD','row':5,'column':2,'color_value':' '},
        {'state_full':'Morrison','state_postal':'MORR','row':5,'column':3,'color_value':' '},
        {'state_full':'Benton','state_postal':'BEN','row':5,'column':4,'color_value':' '},
        {'state_full':'Traverse','state_postal':'TRAV','row':6,'column':0,'color_value':' '},
        {'state_full':'Grant','state_postal':'GRANT','row':6,'column':1,'color_value':' '},
        {'state_full':'Douglas','state_postal':'DOUG','row':6,'column':2,'color_value':' '},
        {'state_full':'Stearns','state_postal':'STRNS','row':6,'column':3,'color_value':' '},
        {'state_full':'Isanti','state_postal':'ISA','row':6,'column':4,'color_value':' '},
        {'state_full':'Big Stone','state_postal':'BIG','row':7,'column':0,'color_value':' '},
        {'state_full':'Stevens','state_postal':'STEVE','row':7,'column':1,'color_value':' '},
        {'state_full':'Pope','state_postal':'POP','row':7,'column':2,'color_value':' '},
        {'state_full':'Sherburne','state_postal':'SB','row':7,'column':3,'color_value':' '},
        {'state_full':'Anoka','state_postal':'AK','row':7,'column':4,'color_value':' '},
        {'state_full':'Chisago','state_postal':'CHIS','row':7,'column':5,'color_value':' '},
        {'state_full':'Swift','state_postal':'SWIFT','row':8,'column':0,'color_value':' '},
        {'state_full':'Kandiyohi','state_postal':'KAN','row':8,'column':1,'color_value':' '},
        {'state_full':'Meeker','state_postal':'MEEK','row':8,'column':2,'color_value':' '},
        {'state_full':'Wright','state_postal':'WR','row':8,'column':3,'color_value':' '},
        {'state_full':'Hennepin','state_postal':'HENN','row':8,'column':4,'color_value':' '},
        {'state_full':'Ramsey','state_postal':'RAM','row':8,'column':5,'color_value':' '},
        {'state_full':'Washington','state_postal':'WA','row':8,'column':6,'color_value':' '},
        {'state_full':'Yellow Medicine','state_postal':'YM','row':9,'column':0,'color_value':' '},
        {'state_full':'Renville','state_postal':'REN','row':9,'column':1,'color_value':' '},
        {'state_full':'McLeod','state_postal':'MCL','row':9,'column':2,'color_value':' '},
        {'state_full':'Sibley','state_postal':'SIB','row':9,'column':3,'color_value':' '},
        {'state_full':'Carver','state_postal':'CV','row':9,'column':4,'color_value':' '},
        {'state_full':'Scott','state_postal':'SCT','row':9,'column':5,'color_value':' '},
        {'state_full':'Dakota','state_postal':'DAK','row':9,'column':6,'color_value':' '},
        {'state_full':'Goodhue','state_postal':'GOOD','row':9,'column':7,'color_value':' '},
        {'state_full':'Lincoln','state_postal':'LIN','row':10,'column':0,'color_value':' '},
        {'state_full':'Lyon','state_postal':'LYON','row':10,'column':1,'color_value':' '},
        {'state_full':'Redwood','state_postal':'RW','row':10,'column':2,'color_value':' '},
        {'state_full':'Brown','state_postal':'BR','row':10,'column':3,'color_value':' '},
        {'state_full':'Nicollet','state_postal':'NIC','row':10,'column':4,'color_value':' '},
        {'state_full':'BlueEarth','state_postal':'BLUE','row':10,'column':5,'color_value':' '},
        {'state_full':'Le Sueur','state_postal':'LS','row':10,'column':6,'color_value':' '},
        {'state_full':'Rice','state_postal':'RICE','row':10,'column':7,'color_value':' '},
        {'state_full':'Wabasha','state_postal':'WAB','row':10,'column':8,'color_value':' '},
        {'state_full':'Pipestone','state_postal':'PS','row':11,'column':0,'color_value':' '},
        {'state_full':'Murray','state_postal':'MURR','row':11,'column':1,'color_value':' '},
        {'state_full':'Cottonwood','state_postal':'CW','row':11,'column':2,'color_value':' '},
        {'state_full':'Watonwan','state_postal':'WTW','row':11,'column':3,'color_value':' '},
        {'state_full':'Waseca','state_postal':'WAS','row':11,'column':4,'color_value':' '},
        {'state_full':'Steele','state_postal':'ST','row':11,'column':5,'color_value':' '},
        {'state_full':'Dodge','state_postal':'DG','row':11,'column':6,'color_value':' '},
        {'state_full':'Olmsted','state_postal':'OLM','row':11,'column':7,'color_value':' '},
        {'state_full':'Winona','state_postal':'WIN','row':11,'column':8,'color_value':' '},
        {'state_full':'Rock','state_postal':'ROCK','row':12,'column':0,'color_value':' '},
        {'state_full':'Nobles','state_postal':'NOB','row':12,'column':1,'color_value':' '},
        {'state_full':'Jackson','state_postal':'JACK','row':12,'column':2,'color_value':' '},
        {'state_full':'Martin','state_postal':'MART','row':12,'column':3,'color_value':' '},
        {'state_full':'Faribault','state_postal':'FB','row':12,'column':4,'color_value':' '},
        {'state_full':'Freeborn','state_postal':'FREE','row':12,'column':5,'color_value':' '},
        {'state_full':'Mower','state_postal':'MOW','row':12,'column':6,'color_value':' '},
        {'state_full':'Fillmore','state_postal':'FILL','row':12,'column':7,'color_value':' '},
        {'state_full':'Houston','state_postal':'HOU','row':12,'column':8,'color_value':' '}
        ]

};
</script>

<script>
//CARTOGRAPHIC GREATER MINNESOTA GOV MAP
$(document).ready(function() {
    cartogram8.init();
});

var cartogram8 = {
    margin: {
        top: 70,
        right: 0,
        bottom: 0,
        left: 60
    },

    selector: '#target-gov',

    init: function() {
        var self = this;

        self.$el = $(self.selector);

        self.width = 350 - self.margin.left - self.margin.right;
        self.height = 350 - self.margin.top - self.margin.bottom;

        self.svg = d3.select(self.selector).append('svg')
            .attr('height', self.height + self.margin.top + self.margin.bottom)
            .attr('width', self.width + self.margin.left + self.margin.right)

        self.state_size = self.width / 12;
        self.state_padding = 2;

        self.map = self.svg.append('g')
            .attr('transform', 'translate(' + self.margin.left + ','
                  + self.margin.top + ')')

        self.drawMap();
    },

    drawMap: function() {
        var self = this;

        var states = self.map.selectAll('.states')
            .data(self.state_pos_co1)
            .enter().append('g')
            .attr('class', 'state-groups');

        var state = states.append('rect')
            .attr('id', function(d) {
                return d.state_postal + "-mngov";
            })
            .attr('class', 'state')
            .attr('rx', 2)
            .attr('ry', 2)
            .attr('x', function(d) {
                return d.column * (self.state_size + self.state_padding);
            })
            .attr('y', function(d) {
                return d.row * (self.state_size + self.state_padding);
            })
            .attr('width', self.state_size)
            .attr('height', self.state_size)
            .call(d3.helper.tooltip(
        function(d, i){
          return "<b>" + d.state_full + "</b>";
       }
        ));

        var text = states.append('text')
            .attr('class', 'state-label')
            .attr('dominant-baseline', 'central')
            .attr('x', function(d) {
                return (d.column * (self.state_size + self.state_padding))
                        + self.state_size / 2; })
            .attr('y', function(d) {
                return (d.row * (self.state_size + self.state_padding))
                    + self.state_size / 2; })
            .style('text-anchor', 'middle')
            .text(function(d) {
                return d.state_postal;
            });
    },

    state_pos_co1: [{'state_full':'Kittson','state_postal':'KITT','row':0,'column':0,'color_value':' '},
        {'state_full':'Lake of the Woods','state_postal':'LW','row':-1,'column':1,'color_value':' '},
        {'state_full':'Roseau','state_postal':'ROS','row':0,'column':1,'color_value':' '},
        {'state_full':'Koochiching','state_postal':'KOO','row':0,'column':2,'color_value':' '},
        {'state_full':'Saint Louis','state_postal':'STL','row':0,'column':3,'color_value':' '},
        {'state_full':'Lake','state_postal':'LAKE','row':0,'column':4,'color_value':' '},
        {'state_full':'Cook','state_postal':'COOK','row':0,'column':5,'color_value':' '},
        {'state_full':'Marshall','state_postal':'MAR','row':1,'column':0,'color_value':' '},
        {'state_full':'Beltrami','state_postal':'BEL','row':1,'column':1,'color_value':' '},
        {'state_full':'Itasca','state_postal':'ITAS','row':1,'column':2,'color_value':' '},
        {'state_full':'Aitkin','state_postal':'AITK','row':1,'column':3,'color_value':' '},
        {'state_full':'Carlton','state_postal':'CARL','row':1,'column':4,'color_value':' '},
        {'state_full':'Polk','state_postal':'POLK','row':2,'column':0,'color_value':' '},
        {'state_full':'Pennington','state_postal':'PENN','row':2,'column':1,'color_value':' '},
        {'state_full':'Red Lake','state_postal':'RL','row':2,'column':2,'color_value':' '},
        {'state_full':'Clearwater','state_postal':'CW','row':2,'column':3,'color_value':' '},
        {'state_full':'Hubbard','state_postal':'HUB','row':2,'column':4,'color_value':' '},
        {'state_full':'Norman','state_postal':'NORM','row':3,'column':0,'color_value':' '},
        {'state_full':'Mahnomen','state_postal':'MAHN','row':3,'column':1,'color_value':' '},
        {'state_full':'Cass','state_postal':'CASS','row':3,'column':2,'color_value':' '},
        {'state_full':'Crow Wing','state_postal':'CROW','row':3,'column':3,'color_value':' '},
        {'state_full':'Pine','state_postal':'PINE','row':3,'column':4,'color_value':' '},
        {'state_full':'Clay','state_postal':'CLAY','row':4,'column':0,'color_value':' '},
        {'state_full':'Becker','state_postal':'BECK','row':4,'column':1,'color_value':' '},
        {'state_full':'Wadena','state_postal':'WAD','row':4,'column':2,'color_value':' '},
        {'state_full':'Mille Lacs','state_postal':'ML','row':4,'column':3,'color_value':' '},
        {'state_full':'Kanabec','state_postal':'KANA','row':4,'column':4,'color_value':' '},
        {'state_full':'Wilkin','state_postal':'WILK','row':5,'column':0,'color_value':' '},
        {'state_full':'Ottertail','state_postal':'OT','row':5,'column':1,'color_value':' '},
        {'state_full':'Todd','state_postal':'TODD','row':5,'column':2,'color_value':' '},
        {'state_full':'Morrison','state_postal':'MORR','row':5,'column':3,'color_value':' '},
        {'state_full':'Benton','state_postal':'BEN','row':5,'column':4,'color_value':' '},
        {'state_full':'Traverse','state_postal':'TRAV','row':6,'column':0,'color_value':' '},
        {'state_full':'Grant','state_postal':'GRANT','row':6,'column':1,'color_value':' '},
        {'state_full':'Douglas','state_postal':'DOUG','row':6,'column':2,'color_value':' '},
        {'state_full':'Stearns','state_postal':'STRNS','row':6,'column':3,'color_value':' '},
        {'state_full':'Isanti','state_postal':'ISA','row':6,'column':4,'color_value':' '},
        {'state_full':'Big Stone','state_postal':'BIG','row':7,'column':0,'color_value':' '},
        {'state_full':'Stevens','state_postal':'STEVE','row':7,'column':1,'color_value':' '},
        {'state_full':'Pope','state_postal':'POP','row':7,'column':2,'color_value':' '},
        {'state_full':'Sherburne','state_postal':'SB','row':7,'column':3,'color_value':' '},
        {'state_full':'Anoka','state_postal':'AK','row':7,'column':4,'color_value':' '},
        {'state_full':'Chisago','state_postal':'CHIS','row':7,'column':5,'color_value':' '},
        {'state_full':'Swift','state_postal':'SWIFT','row':8,'column':0,'color_value':' '},
        {'state_full':'Kandiyohi','state_postal':'KAN','row':8,'column':1,'color_value':' '},
        {'state_full':'Meeker','state_postal':'MEEK','row':8,'column':2,'color_value':' '},
        {'state_full':'Wright','state_postal':'WR','row':8,'column':3,'color_value':' '},
        {'state_full':'Hennepin','state_postal':'HENN','row':8,'column':4,'color_value':' '},
        {'state_full':'Ramsey','state_postal':'RAM','row':8,'column':5,'color_value':' '},
        {'state_full':'Washington','state_postal':'WA','row':8,'column':6,'color_value':' '},
        {'state_full':'Yellow Medicine','state_postal':'YM','row':9,'column':0,'color_value':' '},
        {'state_full':'Renville','state_postal':'REN','row':9,'column':1,'color_value':' '},
        {'state_full':'McLeod','state_postal':'MCL','row':9,'column':2,'color_value':' '},
        {'state_full':'Sibley','state_postal':'SIB','row':9,'column':3,'color_value':' '},
        {'state_full':'Carver','state_postal':'CV','row':9,'column':4,'color_value':' '},
        {'state_full':'Scott','state_postal':'SCT','row':9,'column':5,'color_value':' '},
        {'state_full':'Dakota','state_postal':'DAK','row':9,'column':6,'color_value':' '},
        {'state_full':'Goodhue','state_postal':'GOOD','row':9,'column':7,'color_value':' '},
        {'state_full':'Lincoln','state_postal':'LIN','row':10,'column':0,'color_value':' '},
        {'state_full':'Lyon','state_postal':'LYON','row':10,'column':1,'color_value':' '},
        {'state_full':'Redwood','state_postal':'RW','row':10,'column':2,'color_value':' '},
        {'state_full':'Brown','state_postal':'BR','row':10,'column':3,'color_value':' '},
        {'state_full':'Nicollet','state_postal':'NIC','row':10,'column':4,'color_value':' '},
        {'state_full':'BlueEarth','state_postal':'BLUE','row':10,'column':5,'color_value':' '},
        {'state_full':'Le Sueur','state_postal':'LS','row':10,'column':6,'color_value':' '},
        {'state_full':'Rice','state_postal':'RICE','row':10,'column':7,'color_value':' '},
        {'state_full':'Wabasha','state_postal':'WAB','row':10,'column':8,'color_value':' '},
        {'state_full':'Pipestone','state_postal':'PS','row':11,'column':0,'color_value':' '},
        {'state_full':'Murray','state_postal':'MURR','row':11,'column':1,'color_value':' '},
        {'state_full':'Cottonwood','state_postal':'CW','row':11,'column':2,'color_value':' '},
        {'state_full':'Watonwan','state_postal':'WTW','row':11,'column':3,'color_value':' '},
        {'state_full':'Waseca','state_postal':'WAS','row':11,'column':4,'color_value':' '},
        {'state_full':'Steele','state_postal':'ST','row':11,'column':5,'color_value':' '},
        {'state_full':'Dodge','state_postal':'DG','row':11,'column':6,'color_value':' '},
        {'state_full':'Olmsted','state_postal':'OLM','row':11,'column':7,'color_value':' '},
        {'state_full':'Winona','state_postal':'WIN','row':11,'column':8,'color_value':' '},
        {'state_full':'Rock','state_postal':'ROCK','row':12,'column':0,'color_value':' '},
        {'state_full':'Nobles','state_postal':'NOB','row':12,'column':1,'color_value':' '},
        {'state_full':'Jackson','state_postal':'JACK','row':12,'column':2,'color_value':' '},
        {'state_full':'Martin','state_postal':'MART','row':12,'column':3,'color_value':' '},
        {'state_full':'Faribault','state_postal':'FB','row':12,'column':4,'color_value':' '},
        {'state_full':'Freeborn','state_postal':'FREE','row':12,'column':5,'color_value':' '},
        {'state_full':'Mower','state_postal':'MOW','row':12,'column':6,'color_value':' '},
        {'state_full':'Fillmore','state_postal':'FILL','row':12,'column':7,'color_value':' '},
        {'state_full':'Houston','state_postal':'HOU','row':12,'column':8,'color_value':' '}
        ]

};
</script>

<script>
//MORPHING AND REDRAWING FUNCTION
redrawGraph = function(data1, data2, theline) {

    d3.select('#tracker svg').datum(data2).transition().duration(500).call(chart2);
    nv.utils.windowResize(chart2.update);

  var mappage = [
   'mncounties.json',
   'mncounties.json',
   'usleg.json',
   'mnleg.json'
  ];

  var d1Text= [
   'DFL',
   'Mark Dayton',
   'Al Franken'
  ];

  $("#can1").text(d1Text[theline]);

  var d2Text= [
   "GOP",
   "Jeff Johnson",
   "Mike McFadden"
  ];

  $("#can2").text(d2Text[theline]);

  var voteCountText = [
   "1,000,000",
   "2,000,000",
   "3,000,000"
  ];

  $("#voteCount1").text(voteCountText[theline]);

  var voteCount2Text = [
   "1,000,000",
   "2,000,000",
   "4,000,000"
  ];

  $("#voteCount2").text(voteCount2Text[theline]);

};
</script>

<script>
//LIVE DATA AND COLORATION FUNCTIONS FOR CARTOGRAMS

var govRace = 'http://data-layer-elections.startribune.com/api/v1/summary/governor';
var senRace = 'http://data-layer-elections.startribune.com/api/v1/summary/ussenate';
var repRace = 'http://data-layer-elections.startribune.com/api/v1/summary/ushouse';
var mnhouse = 'http://data-layer-elections.startribune.com/api/v1/summary/mnhouse';

$(document).ready(function(){
 $("#AZ").css("fill","#c0bfeb");
 $("#AR").css("fill","#c0bfeb");
 $("#CA").css("fill","#c0bfeb"); 
 $("#CO").css("fill","#c0bfeb");
 $("#CT").css("fill","#c0bfeb");
 $("#DE").css("fill","#c0bfeb");
 $("#HI").css("fill","#c0bfeb");
 $("#ME").css("fill","#c0bfeb");
 $("#MI").css("fill","#c0bfeb");
 $("#MN").css("fill","#c0bfeb");
 $("#MT").css("fill","#c0bfeb");
 $("#NH").css("fill","#c0bfeb");
 $("#NM").css("fill","#c0bfeb");
 $("#RI").css("fill","#c0bfeb");
 $("#TX").css("fill","#c0bfeb");
 $("#VA").css("fill","#c0bfeb");
 $("#WI").css("fill","#c0bfeb");
 $("#WY").css("fill","#c0bfeb");
 $("#AZ").css("fill","#c0bfeb");
 $("#AR").css("fill","#c0bfeb");
 $("#CA").css("fill","#c0bfeb"); 
 $("#CO").css("fill","#c0bfeb");
 $("#CT").css("fill","#c0bfeb");
 $("#DE").css("fill","#c0bfeb");
 $("#HI").css("fill","#c0bfeb");
 $("#ME").css("fill","#c0bfeb");
 $("#MI").css("fill","#c0bfeb");
 $("#MN").css("fill","#c0bfeb");
 $("#MT").css("fill","#c0bfeb");
 $("#NH").css("fill","#c0bfeb");
 $("#NM").css("fill","#c0bfeb");
 $("#RI").css("fill","#c0bfeb");
 $("#TX").css("fill","#c0bfeb");
 $("#VA").css("fill","#c0bfeb");
 $("#WI").css("fill","#c0bfeb");
 $("#WY").css("fill","#c0bfeb");

});

</script>