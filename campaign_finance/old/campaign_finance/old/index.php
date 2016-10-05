<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>2016 Campaign Finance</title>
  <meta name="description" content="2016 Campaign Finance">
  <meta name="author" content="Jeff Hargarten - StarTribune">

  <link rel="stylesheet" href="../_common_resources/interfaces/d3.slider-master/d3.slider.css" />
  <link rel="stylesheet" href="../_common_resources/styles/startribune_dataviz_styles.css" />
  <link href="../_common_resources/charts/nvd3-master/build/nv.d3.css" rel="stylesheet" type="text/css">

<!-- load common cdn script and css calls -->
  <?php
  readfile('../_common_resources/cdn.php');
  ?>
  
  <style>
    .state-groups:hover{ opacity:.5 !important; cursor:pointer; }
    .state-groups text{ font-size: 9px !important; fill:#fff !important; }
    .state-groups text:hover{ cursor:pointer; pointer-events: all; }
    text { font-family: sans-serif; font-size: 9px; font-color:#fff !important; fill:#000 !important; cursor:default; }

    .none{ fill:#fff; pointer-events: all; }
    text.none { fill:#000 !important; color:#000 !important; pointer-events: all; }
    .selected { stroke-width:2px; stroke:#333 !important; }
    .faded { opacity:.2 !important; }

    .states text{ color:white !important; font-size: 10px !important; pointer-events: all; }
    .dq1{ background-color:#040506; fill:#040506 !important; color:white !important; pointer-events: all; font-weight:bold; }
    .dq2{ background-color:#22282c; fill:#22282c !important; color:white !important; pointer-events: all; font-weight:bold; }
    .dq3{ background-color:#404b52; fill:#404b52 !important; color:white !important; pointer-events: all; font-weight:bold; }
    .dq4{ background-color:#6c7f8c; fill:#6c7f8c !important; color:white !important; pointer-events: all; font-weight:bold; }
    .mid{ fill:#ccc; }

    #charts { width:45%; float:left; }
    #maps { width:45%; float:right; }

    .column { display:inline-block; width:45%; }
    #dflColumn { float:left; }
    #gopColumn { float:right; }

    #view { margin:10px; text-align:center; }
    .switch { padding:10px; display:inline-block; text-align:center; width:150px; background-color:#ddd; font-weight:900; font-family:"Benton Sans",Helvetica,Arial,sans-serif; }
    .switch:hover, .selected { background-color:#333; color:#fff; cursor:pointer; }

    .nodata { background-color:#777 !important; fill:#777 !important; }

    #dflColumn { border-right:1px solid #aaa; }
    #gopColumn { border-left:1px solid #aaa; }

    .chartTitle { text-align:center; }

    .republican { background-color:#A50F16 !important; fill:#A50F16 !important; }
    .r1 { background-color:#DF4E55 !important; fill:#DF4E55 !important; }
    .r2 { background-color:#CC222A !important; fill:#CC222A !important; }
    .r3 { background-color:#830007 !important; fill:#830007 !important; }
    .r4 { background-color:#590004 !important; fill:#590004 !important; }

    .democrat { background-color:#223C69 !important; fill:#223C69 !important; }
    .d1 { background-color:#61779C !important; fill:#61779C !important; }
    .d2 { background-color:#3A5480 !important; fill:#3A5480 !important; }
    .d3 { background-color:#0E2850 !important; fill:#0E2850 !important; }
    .d4 { background-color:#041736 !important; fill:#041736 !important; }

    .independent { background-color:#AA5902 !important; fill:#AA5902 !important; }
    .i1 { background-color:#E7963D !important; fill:#E7963D !important; }
    .i2 { background-color:#CD7312 !important; fill:#CD7312 !important; }
    .i3 { background-color:#874600 !important; fill:#874600 !important; }
    .i4 { background-color:#5C3000 !important; fill:#5C3000 !important; }

    .zoom { text-align:center; float:none !important; padding:20px; }

    .maps path:hover { fill:#333 !important; cursor:pointer; }

    g.tick.zero text:hover { fill:#f00 !important; color:#f00 !important; cursor:pointer !important; } 

     @media only screen and (max-width:870px) {
      #gopColumn, #dflColumn { width:100%; float:none !important; display:inline-block; }
      .maps { text-align:center; width:100%; }
      .switch { width:100%; }
      #dflColumn, #gopColumn { border:0; }
     }
  </style> 
</head>

<body>
  <div id="wrapper">

<!-- <div class="breaker"></div>

    <div id="sliderDiv"><div id="slider"></div></div> -->

<div id="view">
  <div class="switch" id="presidentB" data="president">President</div>
  <div class="switch" id="ushouseB" data="ushouse">US House</div>
<!--   <div class="switch" id="mnhouseB" data="mnhouse">MN House</div>
  <div class="switch" id="mnsenateB" data="mnsenate">MN Senate</div> -->
</div>

<div class="zoom">Reset View</div> 

<div class="breaker"></div>

<div id="gopColumn" class="column">
<div class="chartTitle">Republican Contributions</div>
<div id="gopChart"><svg></svg></div>

    <div class="legendContainer">
      <span class='legend'>
        <nav class='legend clearfix'>
          <span style='background:#fff;'>Less</span>
          <span class='r1'></span>
          <span class='r2'></span>
          <span class='r3'></span>
          <span class='r4'></span>
          <span style='background:#fff;'>More</span>
        </nav>
      </span>
    </div> 

<div class="ushouse maps" id="mapUSRUSHOUSE"><svg width="550" height="400" viewBox="0 0 650 300" preserveAspectRatio="xMidYMid"></svg></div>
<div class="ushouse maps" id="mapMNRUSHOUSE"><svg width="320" height="350" viewBox="0 0 500 550" preserveAspectRatio="xMidYMid"></svg></div>
<div class="president maps" id="mapUSRPresident"><svg width="550" height="400" viewBox="0 0 650 300" preserveAspectRatio="xMidYMid"></svg></div>
<div class="president maps" id="mapMNRPresident"><svg width="320" height="350" viewBox="0 0 500 550" preserveAspectRatio="xMidYMid"></svg></div>
<div class="mnhouse maps" id="mapUSRMNHOUSE"><svg width="550" height="400" viewBox="0 0 650 300" preserveAspectRatio="xMidYMid"></svg></div>
<div class="mnhouse maps" id="mapMNRMNHOUSE"><svg width="320" height="350" viewBox="0 0 500 550" preserveAspectRatio="xMidYMid"></svg></div>
<div class="mnsenate maps" id="mapUSRMNSENATE"><svg width="550" height="400" viewBox="0 0 650 300" preserveAspectRatio="xMidYMid"></svg></div>
<div class="mnsenate maps" id="mapMNRMNSENATE"><svg width="320" height="350" viewBox="0 0 500 550" preserveAspectRatio="xMidYMid"></svg></div>

</div>


<div id="dflColumn" class="column">
<div class="chartTitle">Democrat Contributions</div>
<div id="dflChart"><svg></svg></div>

    <div class="legendContainer">
      <span class='legend'>
        <nav class='legend clearfix'>
          <span style='background:#fff;'>Less</span>
          <span class='d1'></span>
          <span class='d2'></span>
          <span class='d3'></span>
          <span class='d4'></span>
          <span style='background:#fff;'>More</span>
        </nav>
      </span>
    </div> 

<div class="ushouse maps" id="mapUSDUSHOUSE"><svg width="550" height="400" viewBox="0 0 650 300" preserveAspectRatio="xMidYMid"></svg></div>
<div class="ushouse maps" id="mapMNDUSHOUSE"><svg width="320" height="350" viewBox="0 0 500 550" preserveAspectRatio="xMidYMid"></svg></div>
<div class="president maps" id="mapUSDPresident"><svg width="550" height="400" viewBox="0 0 650 300" preserveAspectRatio="xMidYMid"></svg></div>
<div class="president maps" id="mapMNDPresident"><svg width="320" height="350" viewBox="0 0 500 550" preserveAspectRatio="xMidYMid"></svg></div>
<div class="mnhouse maps" id="mapUSDMNHOUSE"><svg width="550" height="400" viewBox="0 0 650 300" preserveAspectRatio="xMidYMid"></svg></div>
<div class="mnhouse maps" id="mapMNDMNHOUSE"><svg width="320" height="350" viewBox="0 0 500 550" preserveAspectRatio="xMidYMid"></svg></div>
<div class="mnsenate maps" id="mapUSDMNSENATE"><svg width="550" height="400" viewBox="0 0 650 300" preserveAspectRatio="xMidYMid"></svg></div>
<div class="mnsenate maps" id="mapMNDMNSENATE"><svg width="320" height="350" viewBox="0 0 500 550" preserveAspectRatio="xMidYMid"></svg></div>

</div>

</div>

  </div>
</body>

<script src="../_common_resources/interfaces/d3.slider-master/d3.slider.js"></script>
<script src="../_common_resources/charts/nvd3-master/build/nv.d3.js"></script>
<script src="../_common_resources/charts/nvd3-master/src/utils.js"></script>
<script src="../_common_resources/charts/nvd3-master/src/tooltip.js"></script>
<script src="../_common_resources/charts/nvd3-master/src/models/legend.js"></script>
<script src="../_common_resources/charts/nvd3-master/src/models/axis.js"></script>
<script src="../_common_resources/charts/nvd3-master/test/stream_layers.js"></script>
<script src="../_common_resources/interfaces/bxslider-master/jquery.bxslider.min.js"></script>

<script>
//RESPONSIVE SVG
// var aspect = 550 / 300, carto1 = $("#mapUSRPresident svg"), carto2 = $("#mapUSDPresident svg");
// $(document).ready(function() { 
//   var targetWidth = carto1.parent().width();  
//   var targetHeight = carto1.parent().height();
//   carto1.attr("width", targetWidth);   
//   carto1.attr("height", targetHeight);  
//   carto2.attr("width", targetWidth);   
//   carto2.attr("height", targetHeight);
// });
// $(window).on("resize", function() {   
//   var targetWidth = carto1.parent().width();  
//   var targetHeight = carto1.parent().height();
//   carto1.attr("width", targetWidth);   
//   carto1.attr("height", targetHeight);  
//   carto1.attr("viewBox", "0 0 " + targetWidth + " " + targetHeight);  
//   carto2.attr("viewBox", "0 0 " + targetWidth + " " + targetHeight); 
//   carto2.attr("width", targetWidth);   
//   carto2.attr("height", targetHeight);
// });
</script>

<script>
//LIVE JSON MAGIC

//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1qNwLNcSP2D8l8iTEemF9JC4lvpKp-UogxP4htDFwFA0&sheet=us_campaign_finance
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1qNwLNcSP2D8l8iTEemF9JC4lvpKp-UogxP4htDFwFA0&sheet=mn_campaign_finance

//THESE LOAD DIFFERENT TABS OF THE GOOGLE SHEET INTO SEPERATE JSON STRINGS, USING THE ACTUAL URLS
<?php

$jsonDataUS = file_get_contents("https://script.googleusercontent.com/a/macros/umn.edu/echo?user_content_key=aSnxT4ES_WDWBJHf0tsdYRkHKZDuNFXY64ItTXj-pqRq7BCx2JQga6DE6Y9V888D6E19aTSDqy18Pd3qmz3tqjbObrOgGPWfOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMi80zadyHLKASbbMAF6orU02DLGwV8tFzI-mtKRf-8plGOUy-lJCxpF2DQLccfmsBGWAyiujVfWxmelbCou2EhfNg1xV69xW9102aPo2dzOHFFUreli0hhOYpmBjx3ILLKOBPTBeFtzP1qPyR5eY853gQhsRdwb-KjjPLOhaSDCwmp7sOrB5lxDmMr77nZiHrhH_u6V995C0LMPZx9191kg&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonDataMN = file_get_contents("https://script.googleusercontent.com/a/macros/umn.edu/echo?user_content_key=oMSGeXBaXa9erzkptXDlIHdwRdpk4nR1nCOThN8uvN-LTzij8DAPBCLq34umVJxPA56rxLbcxCZ8Pd3qmz3tqhekLUv6aHbsOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMi80zadyHLKASbbMAF6orU02DLGwV8tFzI-mtKRf-8plGOUy-lJCxpF2DQLccfmsBGWAyiujVfWxmelbCou2EhfNg1xV69xW9102aPo2dzOHFFUreli0hhOYpmBjx3ILLKOBPTBeFtzP1qPyR5eY853gQhsRdwb-KjjPLOhaSDCwmp7sOrB5lxJ8zqSC3d7K2hH_u6V995C0LMPZx9191kg&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");

?>

//THESE ADD THEM TO JAVASCRIPT VARIABLES WE CAN ACCESS THROUGHOUT THE DOCUMENT
var dataLoadUS = <?php echo $jsonDataUS; ?>;
var dataLoadMN = <?php echo $jsonDataMN; ?>;

dataUS = dataLoadUS.us_campaign_finance;
dataMN = dataLoadMN.mn_campaign_finance;
</script>

<script>
//YEAR SLIDER
// var slider = d3.slider().axis(true);

// var steps = 6;

// d3.select('#slider').call(slider.min(1993).max(2015).value(1993).axis(d3.svg.axis().tickValues([1993,1999,2003,2008,2015]).tickFormat(d3.format("")).orient("top").ticks(5)).step(1).on("slide", function(evt, value) {
//  slider2.value(value);
//  shiftMap(value);
//   }));
</script>

<script>
//TABLECALYPSE
function tableBuild(container,race,data,state,county,index){

$("#stateLabel").text(state);

d3.select(container).selectAll(".card")
.data(data.filter(function(d){ return d.office == race && d.state == state && d.county_id == county; }).sort(function(a,b) {return b.vote_pct-a.vote_pct;})).enter().append("div")
.attr("class","card")
.html(function (d){ 
  $("#racePrecincts").html(d.precincts_reporting + "/" + d.precincts_total + " (" + d3.format('%')(d.precincts_reporting/d.precincts_total) + ") precincts reporting | " + d3.format(',')(d.votes_total) + " votes counted");
  return "<div class='tableBreak'></div><div class='tableCell partyBar " + d.party_id + "'></div><div class='tableCell'>" + d.candidate + "</div><div class='tableCell'>" + d.party_id + "</div><div class='tableCell'>" + d3.format(',')(d.votes) + "</div><div class='tableCell pct'>" + d.vote_pct + "%</div><div class='tableBreak'></div>";

});

}
</script>

<script>
$(".maps").hide();

var chart = [];

//CHARTAGGEDON
function chartBuild(container,subject,data,county,party,index){
  if (party == "gop"){ var colorArray = ["#A50F16"]; var formatter = d3.format('$,'); }
  if (party == "dfl"){ var colorArray = ["#223C69"]; var formatter = d3.format('$,'); }

nv.addGraph(function() {
  chart[index] = nv.models.multiBarHorizontalChart()
      .x(function(d) { return d.label })
      .y(function(d) { return d.value })
      .margin({top: 30, right: 40, bottom: 20, left: 95})
      .showValues(true)
      .tooltips(true)
      .stacked(true)
      .showLegend(false)
      .color(colorArray)
      // .width($(container).width()).height($(container).height())
      .showControls(false);

  chart[index].yAxis
      .tickFormat(formatter);

  d3.select(container + ' svg')
      .datum(chartData(subject,data,county))
      .transition().duration(500)
      .call(chart[index]);

  nv.utils.windowResize(chart[index].update);

  return chart[index];
});

}

function redrawChart(chart,container,subject,data,county,party,index){
  if (party == "gop"){ var colorArray = ["#A50F16"]; var formatter = d3.format('$,'); }
  if (party == "dfl"){ var colorArray = ["#223C69"]; var formatter = d3.format('$,'); }

    d3.select(container + ' svg').datum(chartData(subject,data,county)).transition().duration(300).call(chart[index].color(colorArray));
     chart[index].yAxis
      .tickFormat(formatter);
    nv.utils.windowResize(chart[index].update);
}

function chartData(subject,data,county) {
if (subject == "dflPresident"){
  for (var i=0; i < data.length; i++){
    if (data[i].county == county) { 
      return [{
        "key": county,
        "values": [
          { 
            "label" : "Hillary Clinton" ,
            "value" : data[i].hillary
          } , 
          { 
            "label" : "Bernie Sanders" ,
            "value" : data[i].sanders
          } , 
          { 
            "label" : "Martin O'Malley" ,
            "value" : data[i].omalley
          }
        ]
      }]
    }
  }
}


if (subject == "gopPresident"){
  for (var i=0; i < data.length; i++){
    if (data[i].county == county) { 
      return [{
        "key": county,
        "values": [
          { 
            "label" : "Donald Trump" ,
            "value" : data[i].trump
          } , 
          { 
            "label" : "Ted Cruz" ,
            "value" : data[i].cruz
          } , 
          { 
            "label" : "Marco Rubio" ,
            "value" : data[i].rubio
          }
        ]
      }]
    }
  }
}

if (subject == "dflUSHouse"){
  for (var i=0; i < data.length; i++){
    if (data[i].county == county) { 
      return [{
        "key": county,
        "values": [
          { 
            "label" : "Hillary Clinton" ,
            "value" : data[i].hillary
          } , 
          { 
            "label" : "Bernie Sanders" ,
            "value" : data[i].sanders
          } , 
          { 
            "label" : "Martin O'Malley" ,
            "value" : data[i].omalley
          }
        ]
      }]
    }
  }
}

if (subject == "gopUSHouse"){
  for (var i=0; i < data.length; i++){
    if (data[i].county == county) { 
      return [{
        "key": county,
        "values": [
          { 
            "label" : "Hillary Clinton" ,
            "value" : data[i].hillary
          } , 
          { 
            "label" : "Bernie Sanders" ,
            "value" : data[i].sanders
          } , 
          { 
            "label" : "Martin O'Malley" ,
            "value" : data[i].omalley
          }
        ]
      }]
    }
  }
}

if (subject == "dflMNHouse"){
  for (var i=0; i < data.length; i++){
    if (data[i].county == county) { 
      return [{
        "key": county,
        "values": [
          { 
            "label" : "Hillary Clinton" ,
            "value" : data[i].hillary
          } , 
          { 
            "label" : "Bernie Sanders" ,
            "value" : data[i].sanders
          } , 
          { 
            "label" : "Martin O'Malley" ,
            "value" : data[i].omalley
          }
        ]
      }]
    }
  }
}

if (subject == "gopMNHouse"){
  for (var i=0; i < data.length; i++){
    if (data[i].county == county) { 
      return [{
        "key": county,
        "values": [
          { 
            "label" : "Hillary Clinton" ,
            "value" : data[i].hillary
          } , 
          { 
            "label" : "Bernie Sanders" ,
            "value" : data[i].sanders
          } , 
          { 
            "label" : "Martin O'Malley" ,
            "value" : data[i].omalley
          }
        ]
      }]
    }
  }
}

if (subject == "dflMNSenate"){
  for (var i=0; i < data.length; i++){
    if (data[i].county == county) { 
      return [{
        "key": county,
        "values": [
          { 
            "label" : "Hillary Clinton" ,
            "value" : data[i].hillary
          } , 
          { 
            "label" : "Bernie Sanders" ,
            "value" : data[i].sanders
          } , 
          { 
            "label" : "Martin O'Malley" ,
            "value" : data[i].omalley
          }
        ]
      }]
    }
  }
}

if (subject == "gopMNSenate"){
  for (var i=0; i < data.length; i++){
    if (data[i].county == county) { 
      return [{
        "key": county,
        "values": [
          { 
            "label" : "Hillary Clinton" ,
            "value" : data[i].hillary
          } , 
          { 
            "label" : "Bernie Sanders" ,
            "value" : data[i].sanders
          } , 
          { 
            "label" : "Martin O'Malley" ,
            "value" : data[i].omalley
          }
        ]
      }]
    }
  }
}

}
</script>

<script>
//MAPAGGEDON
function mapColor(d, race, dataCompare, candidate){
  var where = d;

  if (race == "dflPresident"){
  for (var i = 0; i < dataCompare.length; i++) {
    if (candidate == "Total") { candData = dataCompare[i].hillary; }
    if (candidate == "Hillary") { candData = dataCompare[i].hillary; }
    if (candidate == "Sanders") { candData = dataCompare[i].sanders; }
    if (candidate == "O'Malley") { candData = dataCompare[i].omalley; }

  if (dataCompare[i].county == where){
    if (candData == 0) { return "none"; }
    else if (candData <= 25) { return "dq4"; }
    else if (candData <= 50) { return "dq3"; } 
    else if (candData <= 75) { return "dq2"; }
    else if (candData <= 90) { return "dq1"; }
    }
  }
}

  if (race == "gopPresident"){
  for (var i = 0; i < dataCompare.length; i++) {
    if (candidate == "Total") { candData = dataCompare[i].hillary; }
    if (candidate == "Trump") { candData = dataCompare[i].trump; }
    if (candidate == "Cruz") { candData = dataCompare[i].cruz; }
    if (candidate == "Rubio") { candData = dataCompare[i].rubio; }

  if (dataCompare[i].county == where){
    if (candData == 0) { return "none"; }
    else if (candData <= 25) { return "dq4"; }
    else if (candData <= 50) { return "dq3"; } 
    else if (candData <= 75) { return "dq2"; }
    else if (candData <= 90) { return "dq1"; }
    }
  }
}

  if (race == "dflUSHouse"){
  for (var i = 0; i < dataCompare.length; i++) {
    if (candidate == "Total") { candData = dataCompare[i].hillary; }
    if (candidate == "Hillary") { candData = dataCompare[i].hillary; }
    if (candidate == "Sanders") { candData = dataCompare[i].sanders; }
    if (candidate == "O'Malley") { candData = dataCompare[i].omalley; }

  if (dataCompare[i].county == where){
    if (candData == 0) { return "none"; }
    else if (candData <= 25) { return "dq4"; }
    else if (candData <= 50) { return "dq3"; } 
    else if (candData <= 75) { return "dq2"; }
    else if (candData <= 90) { return "dq1"; }
    }
  }
}

  if (race == "gopUSHouse"){
  for (var i = 0; i < dataCompare.length; i++) {
    if (candidate == "Total") { candData = dataCompare[i].hillary; }
    if (candidate == "Trump") { candData = dataCompare[i].trump; }
    if (candidate == "Cruz") { candData = dataCompare[i].cruz; }
    if (candidate == "Rubio") { candData = dataCompare[i].rubio; }

  if (dataCompare[i].county == where){
    if (candData == 0) { return "none"; }
    else if (candData <= 25) { return "dq4"; }
    else if (candData <= 50) { return "dq3"; } 
    else if (candData <= 75) { return "dq2"; }
    else if (candData <= 90) { return "dq1"; }
    }
  }
}

  if (race == "dflMNHouse"){
  for (var i = 0; i < dataCompare.length; i++) {
    if (candidate == "Total") { candData = dataCompare[i].hillary; }
    if (candidate == "Hillary") { candData = dataCompare[i].hillary; }
    if (candidate == "Sanders") { candData = dataCompare[i].sanders; }
    if (candidate == "O'Malley") { candData = dataCompare[i].omalley; }

  if (dataCompare[i].county == where){
    if (candData == 0) { return "none"; }
    else if (candData <= 25) { return "dq4"; }
    else if (candData <= 50) { return "dq3"; } 
    else if (candData <= 75) { return "dq2"; }
    else if (candData <= 90) { return "dq1"; }
    }
  }
}

  if (race == "gopMNHouse"){
  for (var i = 0; i < dataCompare.length; i++) {
    if (candidate == "Total") { candData = dataCompare[i].hillary; }
    if (candidate == "Trump") { candData = dataCompare[i].trump; }
    if (candidate == "Cruz") { candData = dataCompare[i].cruz; }
    if (candidate == "Rubio") { candData = dataCompare[i].rubio; }

  if (dataCompare[i].county == where){
    if (candData == 0) { return "none"; }
    else if (candData <= 25) { return "dq4"; }
    else if (candData <= 50) { return "dq3"; } 
    else if (candData <= 75) { return "dq2"; }
    else if (candData <= 90) { return "dq1"; }
    }
  }
}

  if (race == "dflMNSenate"){
  for (var i = 0; i < dataCompare.length; i++) {
    if (candidate == "Total") { candData = dataCompare[i].hillary; }
    if (candidate == "Hillary") { candData = dataCompare[i].hillary; }
    if (candidate == "Sanders") { candData = dataCompare[i].sanders; }
    if (candidate == "O'Malley") { candData = dataCompare[i].omalley; }

  if (dataCompare[i].county == where){
    if (candData == 0) { return "none"; }
    else if (candData <= 25) { return "dq4"; }
    else if (candData <= 50) { return "dq3"; } 
    else if (candData <= 75) { return "dq2"; }
    else if (candData <= 90) { return "dq1"; }
    }
  }
}

  if (race == "gopMNSenate"){
  for (var i = 0; i < dataCompare.length; i++) {
    if (candidate == "Total") { candData = dataCompare[i].hillary; }
    if (candidate == "Trump") { candData = dataCompare[i].trump; }
    if (candidate == "Cruz") { candData = dataCompare[i].cruz; }
    if (candidate == "Rubio") { candData = dataCompare[i].rubio; }

  if (dataCompare[i].county == where){
    if (candData == 0) { return "none"; }
    else if (candData <= 25) { return "dq4"; }
    else if (candData <= 50) { return "dq3"; } 
    else if (candData <= 75) { return "dq2"; }
    else if (candData <= 90) { return "dq1"; }
    }
  }
}

}

function mapTips(d, subject, dataCompare){
   var where = d.properties.COUTYNAME;
   return where; 
}

function mapBuild(container, boxContainer, chartContainer, shape, race, geo, dataCompare, index, party) {

var width = 350,
    height = 350,
    centered;

if (geo=="us") { var projection = d3.geo.albersUsa().scale(700).translate([330, 200]); }
else if (geo=="mn") { var projection = d3.geo.albersUsa().scale(5037).translate([50, 970]); }
else if (geo=="metro") { var projection = d3.geo.mercator().scale([80000]).center([-91.9995,44.8637]); }

var path = d3.geo.path()
    .projection(projection);

var svg = d3.select(container + " svg")
    .attr("width", width)
    .attr("height", height);

svg.append("rect")
    .attr("class", "background")
    .attr("width", width)
    .attr("height", height);

var g = svg.append("g");

d3.json("shapefiles/" + shape, function(error, us) {

  g.append("g")
      .attr("id", "states")
    .selectAll("path")
      .data(us.features)
    .enter().append("path")
      .attr("d", path)
      .on("click", clicked)
      .attr("class", function(d){
         return mapColor(d.properties.ZCTA5CE10,race,dataCompare);
        })
       .on("mousedown", function(d, i){   
          $("#target").text("Minnesota: " + d.properties.ZCTA5CE10);
          redrawChart(chart,chartContainer,race,dataCompare,d.properties.ZCTA5CE10,party,index);
       })
      .style("stroke-width", "1.5px")
      .style("stroke", "#fff")
      .call(d3.helper.tooltip(function(d, i){
          return mapTips(d);
      }));

  g.append("path")
      //.datum(topojson.mesh(us, us.features, function(a, b) { return a !== b; }))
      .attr("id", "state-borders")
      .attr("d", path);
});

var zoom = d3.behavior.zoom()
    .on("zoom",function() {
        g.attr("transform","translate("+ 
            d3.event.translate.join(",")+")scale("+d3.event.scale+")");
        g.selectAll("circle")
            .attr("d", path.projection(projection));
        g.selectAll("path")  
            .attr("d", path.projection(projection)); 

  });

$(".zoom").click(function() {
  clicked2();

redrawChart(chart,"#dflChart","dflPresident",dataUS,"Total","dfl",0);
redrawChart(chart,"#gopChart","gopPresident",dataUS,"Total","gop",1);

  $("#target").text("Overview");
    d3.selectAll(".state-groups rect").attr('class', function(d) {
        return mapColor(d.state_full,race,dataUS,"Total");
  });
});

function clicked(d) {
  var x, y, k;

  if (d && centered !== d) {
    var centroid = path.centroid(d);
    x = centroid[0];
    y = centroid[1];
    k = 4;
    centered = d;
  } else {
    x = width / 2;
    y = height / 2;
    k = 1;
    centered = null;
  }

  g.selectAll("path")
      .classed("faded", true)
      .classed("active", centered && function(d) { return d === centered; });

  // g.transition()
  //     .duration(750)
  //     .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")scale(" + k + ")translate(" + -x + "," + -y + ")")
  //     .style("stroke-width", 1.5 / k + "px");
}

function clicked2(d) {
  var x, y, k;

  if (d && centered !== d) {
    var centroid = path.centroid(d);
    x = centroid[0];
    y = centroid[1];
    k = 1;
    centered = d;
  } else {
    x = width / 2;
    y = height / 2;
    k = 1;
    centered = null;
  }

  g.selectAll("path")
      .classed("faded", false)
      .classed("active", centered && function(d) { return d === centered; });

//   g.transition()
//       .duration(750)
// .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")scale(" + k + ")translate(" + -x + "," + -y + ")")
//       .style("stroke-width", 1.5 / k + "px");
}

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
}
</script>
<script>
function cartoBuild(container,chartContainer,race,index,party){
var cartogram = {
    margin: {
        top: 40,
        right: 140,
        bottom: 0,
        left: 60
    },

    selector: container + ' svg',

    init: function() {
        var self = this;

        self.$el = $(self.selector);

        self.width = 550 - self.margin.left - self.margin.right;
        self.height = 400 - self.margin.top - self.margin.bottom;

        self.svg = d3.select(self.selector)
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
                return d.state_postal + "d";
            })
            .attr('class', 'state')
            .attr('class', function(d) {
                return mapColor(d.state_full,race,dataUS,"Total");
            })
            .attr('rx', 0)
            .attr('ry', 0)
            .attr('x', function(d) {
                return d.column * (self.state_size + self.state_padding);
            })
            .attr('y', function(d) {
                return d.row * (self.state_size + self.state_padding);
            })
            .attr('width', self.state_size)
            .attr('height', self.state_size)
            .on('click', function(d) {
                $("#target").text(d.state_full);
                redrawChart(chart,chartContainer,race,dataUS,d.state_full,party,index);
               for (var i=0; i < dataUS.length; i++) {
                    if (d.state_full == dataUS[i].state){
                     $("#cartoMapChatter").html("<div class='stateName'>" + d.state_full + "</div><div class='pct'> | Percent covered: <span class='" +  d3.select(this).attr('class') + "'>" + d3.format('%')(dataUS[i].pct_covered) + "</span> | </div><div class='providers'> Providers: " + dataUS[i].providers + "</div>")
                    }
                  }

              d3.selectAll(".state-groups rect").attr('class', function(d) {
                  return "faded";
            }); 
              d3.select(this).attr('class', function(d) {
                  return mapColor(d.state_full,race,dataUS,"Total");
            });
        });

        var text = states.append('text')
            .attr('class', 'state-label')
            .attr('class', function(d) {
               return mapColor(d.state_full,race,dataUS,"Total");
            })
            .attr('dominant-baseline', 'central')
            .attr('x', function(d) {
                return (d.column * (self.state_size + self.state_padding))
                        + self.state_size / 2; })
            .attr('y', function(d) {
                return (d.row * (self.state_size + self.state_padding))
                    + self.state_size / 2; })
            .style('text-anchor', 'middle')
            .on('click', function(d) { 
              $("#target").text(d.state_full);
              redrawChart(chart,chartContainer,race,dataUS,d.state_full,party,index);
                for (var i=0; i < dataUS.length; i++) {
                    if (d.state_full == dataUS[i].state){
                     $("#cartoMapChatter").html("<div class='stateName'>" + d.state_full + "</div><div class='pct'> | Percent covered: <span class='" +  d3.select(this.parentNode).select("rect").attr('class') + "'>" + d3.format('%')(dataUS[i].pct_covered) + "</span> | </div><div class='providers'> Providers: " + dataUS[i].providers + "</div>")
                    }
                  }

             d3.selectAll(".state-groups rect").attr('class', function(d) {
                return "faded";
            }); 
              d3.select(this.parentNode).select("rect").attr('class', function(d) {
                return mapColor(d.state_full,race,dataUS,"Total");
            });
      })
            .text(function(d) {
                return d.state_postal;
            });
    },

    state_pos_co2: [{'state_full':'Alabama','state_postal':'AL','row':5,'column':6,'state_total_old':'32','state_total_new':'25','state_change':'-63%','color':'dq1'},
        {'state_full':'Alaska','state_postal':'AK','row':6,'column':0,'state_total_old':'0','state_total_new':'0','state_change':'Insufficient data','color':'none'},
        {'state_full':'Arizona','state_postal':'AZ','row':4,'column':1,'state_total_old':'14','state_total_new':'36','state_change':'+36%','color':'dq7'},
        {'state_full':'Arkansas','state_postal':'AR','row':4,'column':4,'state_total_old':'36','state_total_new':'43','state_change':'-33%','color':'dq3'},
        {'state_full':'California','state_postal':'CA','row':3,'column':0,'state_total_old':'358','state_total_new':'267','state_change':'-25%','color':'dq3'},
        {'state_full':'Colorado','state_postal':'CO','row':3,'column':2,'state_total_old':'124','state_total_new':'93','state_change':'-33%','color':'dq3'},
        {'state_full':'Connecticut','state_postal':'CT','row':2,'column':9,'state_total_old':'0','state_total_new':'6','state_change':'Insufficient data','color':'none'},
        {'state_full':'District of Columbia','state_postal':'DC','row':4,'column':8,'state_total_old':'0','state_total_new':'0','state_change':'Insufficient data','color':'none'},
        {'state_full':'Delaware','state_postal':'DE','row':3,'column':9,'state_total_old':'3','state_total_new':'3','state_change':'-100%','color':'dq1'},
        {'state_full':'Florida','state_postal':'FL','row':6,'column':8,'state_total_old':'150','state_total_new':'136','state_change':'-14%','color':'dq4'},
        {'state_full':'Georgia','state_postal':'GA','row':5,'column':7,'state_total_old':'77','state_total_new':'59','state_change':'-38%','color':'dq3'},
        {'state_full':'Hawaii','state_postal':'HI','row':6,'column':-1,'state_total_old':'0','state_total_new':'11','state_change':'Insufficient data','color':'none'},
        {'state_full':'Idaho','state_postal':'ID','row':1,'column':1,'state_total_old':'71','state_total_new':'68','state_change':'-21%','color':'dq3'},
        {'state_full':'Illinois','state_postal':'IL','row':1,'column':6,'state_total_old':'251','state_total_new':'221','state_change':'-14%','color':'dq4'},
        {'state_full':'Indiana','state_postal':'IN','row':2,'column':5,'state_total_old':'216','state_total_new':'220','state_change':'0%','color':'mid'},
        {'state_full':'Iowa','state_postal':'IA','row':2,'column':4,'state_total_old':'228','state_total_new':'295','state_change':'+29%','color':'dq6'},
        {'state_full':'Kansas','state_postal':'KS','row':4,'column':3,'state_total_old':'215','state_total_new':'205','state_change':'-6%','color':'dq4'},
        {'state_full':'Kentucky','state_postal':'KY','row':3,'column':5,'state_total_old':'308','state_total_new':'162','state_change':'-49%','color':'dq2'},
        {'state_full':'Louisiana','state_postal':'LA','row':5,'column':4,'state_total_old':'30','state_total_new':'26','state_change':'-53%','color':'dq1'},
        {'state_full':'Maine','state_postal':'ME','row':-1,'column':10,'state_total_old':'0','state_total_new':'14','state_change':'Insufficient data','color':'none'},
        {'state_full':'Maryland','state_postal':'MD','row':3,'column':8,'state_total_old':'26','state_total_new':'27','state_change':'-46%','color':'dq2'},
        {'state_full':'Massachusetts','state_postal':'MA','row':1,'column':9,'state_total_old':'0','state_total_new':'11','state_change':'Insufficient data','color':'none'},
        {'state_full':'Michigan','state_postal':'MI','row':1,'column':7,'state_total_old':'102','state_total_new':'179','state_change':'+74%','color':'dq8'},
        {'state_full':'Minnesota','state_postal':'MN','row':1,'column':4,'state_total_old':'153','state_total_new':'210','state_change':'+37%','color':'dq7'},
        {'state_full':'Mississippi','state_postal':'MS','row':5,'column':5,'state_total_old':'65','state_total_new':'46','state_change':'-57%','color':'dq1'},
        {'state_full':'Missouri','state_postal':'MO','row':3,'column':4,'state_total_old':'264','state_total_new':'288','state_change':'+5%','color':'dq5'},
        {'state_full':'Montana','state_postal':'MT','row':1,'column':2,'state_total_old':'145','state_total_new':'139','state_change':'-10%','color':'dq4'},
        {'state_full':'Nebraska','state_postal':'NE','row':3,'column':3,'state_total_old':'199','state_total_new':'179','state_change':'-11%','color':'dq4'},
        {'state_full':'Nevada','state_postal':'NV','row':2,'column':1,'state_total_old':'0','state_total_new':'11','state_change':'Insufficient data','color':'none'},
        {'state_full':'New Hampshire','state_postal':'NH','row':0,'column':10,'state_total_old':'0','state_total_new':'4','state_change':'Insufficient data','color':'none'},
        {'state_full':'New Jersey','state_postal':'NJ','row':2,'column':8,'state_total_old':'8','state_total_new':'19','state_change':'+50%','color':'dq8'},
        {'state_full':'New Mexico','state_postal':'NM','row':4,'column':2,'state_total_old':'24','state_total_new':'14','state_change':'-100%','color':'dq1'},
        {'state_full':'New York','state_postal':'NY','row':1,'column':8,'state_total_old':'203','state_total_new':'135','state_change':'-38%','color':'dq3'},
        {'state_full':'North Carolina','state_postal':'NC','row':4,'column':6,'state_total_old':'156','state_total_new':'111','state_change':'-35%','color':'dq3'},
        {'state_full':'North Dakota','state_postal':'ND','row':1,'column':3,'state_total_old':'84','state_total_new':'117','state_change':'+36%','color':'dq7'},
        {'state_full':'Ohio','state_postal':'OH','row':2,'column':6,'state_total_old':'258','state_total_new':'217','state_change':'-18%','color':'dq4'},
        {'state_full':'Oklahoma','state_postal':'OK','row':5,'column':3,'state_total_old':'46','state_total_new':'53','state_change':'-30%','color':'dq3'},
        {'state_full':'Oregon','state_postal':'OR','row':2,'column':0,'state_total_old':'40','state_total_new':'61','state_change':'+20%','color':'dq6'},
        {'state_full':'Pennsylvania','state_postal':'PA','row':2,'column':7,'state_total_old':'276','state_total_new':'182','state_change':'-34%','color':'dq3'},
        {'state_full':'Rhode Island','state_postal':'RI','row':2,'column':10,'state_total_old':'0','state_total_new':'0','state_change':'Insufficient data','color':'none'},
        {'state_full':'South Carolina','state_postal':'SC','row':4,'column':7,'state_total_old':'16','state_total_new':'30','state_change':'+38%','color':'dq7'},
        {'state_full':'South Dakota','state_postal':'SD','row':2,'column':3,'state_total_old':'88','state_total_new':'108','state_change':'+17%','color':'dq6'},
        {'state_full':'Tennessee','state_postal':'TN','row':4,'column':5,'state_total_old':'244','state_total_new':'147','state_change':'-42%','color':'dq2'},
        {'state_full':'Texas','state_postal':'TX','row':6,'column':3,'state_total_old':'223','state_total_new':'159','state_change':'+29%','color':'dq3'},
        {'state_full':'Utah','state_postal':'UT','row':3,'column':1,'state_total_old':'24','state_total_new':'24','state_change':'-67%','color':'dq1'},
        {'state_full':'Vermont','state_postal':'VT','row':0,'column':9,'state_total_old':'7','state_total_new':'15','state_change':'-57%','color':'dq1'},
        {'state_full':'Virginia','state_postal':'VA','row':3,'column':7,'state_total_old':'130','state_total_new':'123','state_change':'-10%','color':'dq4'},
        {'state_full':'Washington','state_postal':'WA','row':1,'column':0,'state_total_old':'88','state_total_new':'63','state_change':'-39%','color':'dq3'},
        {'state_full':'West Virginia','state_postal':'WV','row':3,'column':6,'state_total_old':'9','state_total_new':'22','state_change':'0%','color':'mid'},
        {'state_full':'Wisconsin','state_postal':'WI','row':1,'column':5,'state_total_old':'279','state_total_new':'242','state_change':'-15%','color':'dq4'},
        {'state_full':'Wyoming','state_postal':'WY','row':2,'column':2,'state_total_old':'33','state_total_new':'37','state_change':'-21%','color':'dq3'}]

};

$(document).ready(function() {
cartogram.init();
});
}

$(document).ready(function() {
  $(".president").show();
  $("#presidentB").addClass("selected");
  $(".switch").click(function() {
    $(".switch").removeClass("selected");
    $(this).addClass("selected");
    $(".maps").hide();
    $("." + $(this).attr("data")).show();
  });

  
  $("g.tick.zero text").click(function() {
    console.log($(this).find("text").html());
    });
});


chartBuild("#dflChart","dflPresident",dataUS,"Total","dfl",0);
chartBuild("#gopChart","gopPresident",dataUS,"Total","gop",1);
cartoBuild("#mapUSDPresident","#dflChart","dflPresident",0, "dfl");
cartoBuild("#mapUSRPresident","#gopChart","gopPresident",1, "gop");
mapBuild("#mapMNDPresident", "#infobox", "#dflChart", "counties.json", "dflPresident", "mn", dataMN, 0, "dfl");
mapBuild("#mapMNRPresident", "#infobox", "#gopChart", "counties.json", "gopPresident", "mn", dataMN, 1, "gop");

cartoBuild("#mapUSDUSHOUSE","#dflChart","dflUSHouse",0 ,"dfl");
cartoBuild("#mapUSRUSHOUSE","#gopChart","gopUSHouse",1 ,"gop");
mapBuild("#mapMNDUSHOUSE", "#infobox", "#dflChart", "counties.json", "dflUSHouse", "mn", dataMN, 0, "dfl");
mapBuild("#mapMNRUSHOUSE", "#infobox", "#gopChart", "counties.json", "gopUSHouse", "mn", dataMN, 1, "gop");

cartoBuild("#mapUSDMNSENATE","#dflChart","dflMNSenate",0, "dfl");
cartoBuild("#mapUSRMNSENATE","#gopChart","gopMNSenate",1, "gop");
mapBuild("#mapMNDMNSENATE", "#infobox", "#dflChart", "counties.json", "dflMNSenate", "mn", dataMN, 0, "dfl");
mapBuild("#mapMNRMNSENATE", "#infobox", "#gopChart", "counties.json", "gopMNSenate", "mn", dataMN, 1, "gop");

cartoBuild("#mapUSDMNHOUSE","#dflChart","dflMNHouse",0, "dfl");
cartoBuild("#mapUSRMNHOUSE","#gopChart","dflMNHouse",1, "gop");
mapBuild("#mapMNDMNHOUSE", "#infobox", "#dflChart", "counties.json", "dflMNHouse", "mn", dataMN, 0, "dfl");
mapBuild("#mapMNRMNHOUSE", "#infobox", "#gopChart", "counties.json", "dflMNHouse", "mn", dataMN, 1, "gop");

</script>
</html>