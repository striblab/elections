<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>How did Minnesota vote in the 2008 Caucus?</title>
  <meta name="description" content="How did Minnesota vote in the 2008 Caucus?">
  <meta name="author" content="Frey Hargarten - StarTribune">

  <link href="../_common_resources/charts/nvd3-master/build/nv.d3.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../_common_resources/styles/startribune_dataviz_styles.css" />
  
  <style>
  body { font-family:"Benton Sans",Helvetica,Arial,sans-serif; }
  #wrapper { width:100%; margin-right:auto; margin-left:auto; }
  #viewSelect { text-align:center; }
  .switch { padding:10px; display:inline-block; text-align:center; width:49%; background-color:#fff; font-weight:900; font-family:"Benton Sans",Helvetica,Arial,sans-serif; border:1px solid black; }
  .switch:hover, .precinctR:hover, .precinctD:hover, .selected { background-color:#4C4C39; color:#fff !important; cursor:pointer; }
  .precinctR, .precinctD { font-size:.73em; }
 
  .toggleTables { text-align:center; font-family:"Benton Sans",Helvetica,Arial,sans-serif; font-weight:900; }
  .toggleTables:hover { cursor:pointer; color:#4C4C39; }

  .tableHead { display:inline-block; padding:3px; border-bottom:1px solid #ddd; width:15.8%; font-weight:900; font-family:"Poynter Serif RE"; vertical-align:top; }
  .rSort:hover, .dSort:hover { cursor:pointer; color:#4C4C39; }
  .tableCell { display:inline-block; padding:3px; border-bottom:1px solid #ddd; width:15.8%; font-family:"Benton Sans"; vertical-align:top; min-height:100%; font-size:.73em; }
  .tableBreak { clear:both; display:block; }
  .table { text-align:center; width:100%; }

  .zoom { text-align:center; float:none !important; padding:15px; }
  .legends { width:390px; height:auto; text-align:center; margin-right:auto; margin-left:auto; }
  #chart svg { height:430px; }

  .states .active { fill: #4C4C39 !important; fill-opacity: 1 !important; }
  .faded { fill-opacity: 0.5 !important; }
  .states path:hover { fill:#4C4C39 !important; cursor:pointer;}

  #precinctName { font-family:"Poynter Serif RE",Georgia,Times,serif; text-align:center; }

  .source { text-align:center; padding:5px; }

  .cell { display:inline-block; width:49%; text-align:center; }
  .bigResults { text-align:center; }

  .breaker_small { padding:5px; clear:both; }

  .republican { color:#9C0004; fill:#9C0004 !important; pointer-events: all; font-weight:bold; }
  .r1 { background-color:#FF8572; fill:#FF8572 !important; color:white !important; pointer-events: all; font-weight:bold; }
  .r2 { background-color:#F2634C; fill:#F2634C !important; color:white !important; pointer-events: all; font-weight:bold; }
  .r3 { background-color:#9C0004; fill:#9C0004 !important; color:white !important; pointer-events: all; font-weight:bold; }
  .r4 { background-color:#4E0002; fill:#4E0002 !important; color:white !important; pointer-events: all; font-weight:bold; }
  .mid { background-color:#ddd; fill:#ddd !important; color:black !important; pointer-events: all; font-weight:bold; }
  .democrat { color:#0D4773; fill:#0D4773 !important; pointer-events: all; font-weight:bold; }
  .d1 { background-color:#67B4C2; fill:#67B4C2 !important; color:white !important; pointer-events: all; font-weight:bold; }
  .d2 { background-color:#4192A1; fill:#4192A1 !important; color:white !important; pointer-events: all; font-weight:bold; }
  .d3 { background-color:#0D4773; fill:#0D4773 !important; color:white !important; pointer-events: all; font-weight:bold; }
  .d4 { background-color:#022642; fill:#022642 !important; color:white !important; pointer-events: all; font-weight:bold; }

  .demSwatch { background-color:#0D4773; fill:#0D4773 !important; pointer-events: all; font-weight:bold; }
  .gopSwatch { background-color:#9C0004; fill:#9C0004 !important; pointer-events: all; font-weight:bold; }

  .president { height:676px; overflow-x:hidden; overflow-y:auto; }

  #leftPane { float:left; width:50%; text-align:center; }
  #rightPane { float:right; width:48%; } 

  #tableR, #tableD, #rTables, div[data='gop'] { display:none; }

  @media (max-width:750px) {
  #leftPane { float:none; width:100%; }
  #rightPane { float:none; width:100%; } 
  .tableHead, .tableCell { font-size:0.6em; } 
  .legends { width:100%; }
  .legend span { width:8.7%; }
  }
  </style> 
</head>

<body>
  <div id="wrapper">

<div id="viewSelect">
<div class="switch selected" party="dfl" id="dSwitch">Democrat</div>
<div class="switch" party="gop" id="rSwitch">Republican</div>
</div>

<div class="breaker_small"></div>

<div id="rTables" data="gop">
<div id="toggleR" class="toggleTables" data="gop">CITY SELECT</div>
<div id="tableR" class="tables">
<div id="filterR" class="table"><input type="search" class="filter_box" placeholder="Search by keyword"></input></div>

      <div id="rtablehere" class="table president"><div class='tableHead rSort selected' candidate="city">City</div><div class='tableHead rSort' candidate="mccain">McCain</div><div class='tableHead rSort' candidate="romney">Romney</div><div class='tableHead rSort' candidate="keyes">Keyes</div><div class='tableHead rSort' candidate="huckabee">Huckabee</div><div class='tableHead rSort' candidate="paul">Paul</div>
      
    </div>
</div>
</div>

<div id="dTables" data="dfl">
<div id="toggleD" class="toggleTables" data="dfl">CITY SELECT</div>
<div id="tableD" class="tables">
<div id="filterD" class="table"><input type="search" class="filter_box" placeholder="Search by keyword"></input></div>

      <div id="dtablehere" class="table president"><div class='tableHead dSort selected' candidate="city">City</div><div class='tableHead dSort' candidate="obama">Obama</div><div class='tableHead dSort' candidate="clinton">Clinton</div><div class='tableHead dSort' candidate="biden">Biden</div><div class='tableHead dSort' candidate="edwards">Edwards</div><div class='tableHead'>Other</div></div>
    </div>
</div>
</div>

<div class="breaker_small"></div>

<div class="legends">
    <div class="legendContainer">
      <span class='legend'>
        <nav class='legend clearfix'>
          <span style='background:#fff;'>D</span>
          <span class='d4'></span>
          <span class='d3'></span>
          <span class='d2'></span>
          <span class='d1'></span>
          <span class='mid'></span>
          <span class='r1'></span>
          <span class='r2'></span>
          <span class='r3'></span>
          <span class='r4'></span>
          <span style='background:#fff;'>R</span>
        </nav>
      </span>
    </div>
    <small>Winning Margin</small>
  </div>

<div id="analysis">
<div id="leftPane">
    <div id="mn_map" class="mn"><svg width="320" height="350" viewBox="0 0 530 550" preserveAspectRatio="xMidYMid"></svg></div>
    <div id="precinctName">Minnesota</div>
</div>

<div id="rightPane">
    <div id="infobox">
      <div id="chart"><svg></svg></div>
    </div>
</div>

<div class="breaker"></div>

<div class="zoom">Reset View</div>

<div class="breaker"></div>

<div class="bigResults" data="gop">
<div class="cell">
<h3>John McCain <span class="republican" id="mMark"></span></h3>
<div class="bigNum r2" id="mNum">22%</div>
</div>
<div class="cell">
<h3>Mitt Romney <span class="republican" id="rMark">&#x2713;</span></h3>
<div class="bigNum r2" id="rNum">41%</div>
</div>
<div class="breaker"></div>
<h3>Total Votes</h3>
<div class="num" id="voteTotalR">62,828</div>
</div>

<div class="bigResults" data="dfl">
<div class="cell">
<h3>Barack Obama <span class="democrat" id="oMark">&#x2713;</span></h3>
<div class="bigNum d3" id="oNum">66%</div>
</div>
<div class="cell">
<h3>Hillary Clinton <span class="democrat" id="cMark"></span></h3>
<div class="bigNum d2" id="cNum">32%</div>
</div>
<div class="breaker"></div>
<h3>Total Votes</h3>
<div class="num" id="voteTotalD">214,066</div>
</div>
</div>

<div class="source">Source: Minnesota Secretary of State</div>
  </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script src="../_common_resources/charts/nvd3-master/build/nv.d3.js"></script>
<script src="../_common_resources/charts/nvd3-master/src/utils.js"></script>
<script src="../_common_resources/charts/nvd3-master/src/tooltip.js"></script>
<script src="../_common_resources/charts/nvd3-master/src/models/legend.js"></script>
<script src="../_common_resources/charts/nvd3-master/src/models/axis.js"></script>
<script src="../_common_resources/charts/nvd3-master/test/stream_layers.js"></script>
<script src="//d3js.org/topojson.v1.min.js"></script>

<script>
// $("#headerDiv").sticky({topSpacing:1});

</script>
<script>
//LIVE JSON MAGIC

//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=19PLxpfLu5GrOdfFQxgILn1rTvT2qI2r9tpcymIWzBCk&sheet=dCaucus_2008
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=19PLxpfLu5GrOdfFQxgILn1rTvT2qI2r9tpcymIWzBCk&sheet=rCaucus_2008

// d3.json("https://script.googleusercontent.com/macros/echo?user_content_key=k1RJddGxkgs3zPUUPTdlPVWuBR1wPdqFiVyPp0mO8mMHH8SHVLd8CRcLzg_xjzIE4jEzJwy1o8zMvQ1u-mOYj5RNQFST8VENOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6T1DOEXJ45pmMl_AsEqNvLSXscPU5mlx1KUhC-d5COvwHK2lEKtrcVV2UZE82h7I153dzJzZTV7GjmGIK4SbY8Pgs14CB_BGiP&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX", function(error, dataLoadD) {
// d3.json("https://script.googleusercontent.com/macros/echo?user_content_key=y-2PxGchMKhCzTvreTXP1GhQBMmWkRePKFTuw8lUl0QgS35jEY_4tr45YvEbze5jC9YBSfXwwgjMvQ1u-mOYj9r0K4OG3xZpOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6T1DOEXJ45pmMl_AsEqNvLSXscPU5mlx1KUhC-d5COvwHK2lEKtrcVV2UZE82h7I15xcG-w52aeuTmGIK4SbY8Pgs14CB_BGiP&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX", function(error, dataLoadR) {

<?php

$jsonDataD = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=k1RJddGxkgs3zPUUPTdlPVWuBR1wPdqFiVyPp0mO8mMHH8SHVLd8CRcLzg_xjzIE4jEzJwy1o8zMvQ1u-mOYj5RNQFST8VENOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6T1DOEXJ45pmMl_AsEqNvLSXscPU5mlx1KUhC-d5COvwHK2lEKtrcVV2UZE82h7I153dzJzZTV7GjmGIK4SbY8Pgs14CB_BGiP&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonDataR = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=y-2PxGchMKhCzTvreTXP1GhQBMmWkRePKFTuw8lUl0QgS35jEY_4tr45YvEbze5jC9YBSfXwwgjMvQ1u-mOYj9r0K4OG3xZpOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6T1DOEXJ45pmMl_AsEqNvLSXscPU5mlx1KUhC-d5COvwHK2lEKtrcVV2UZE82h7I15xcG-w52aeuTmGIK4SbY8Pgs14CB_BGiP&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");

?>

var dataLoadD = <?php echo $jsonDataD; ?>;
var dataLoadR = <?php echo $jsonDataR; ?>;

var dataD = dataLoadD.dCaucus_2008;
var dataR = dataLoadR.rCaucus_2008;

$("[data='gop'], #tableR, #tableD, #rTables").hide();

$(".switch").click(function() {
  $(".switch").removeClass("selected");
  $(this).addClass("selected");
  $("[data='dfl'], [data='gop']").hide();
  $("[data='" + $(this).attr("party") + "']").show();
});

$(".rSort").click(function() {
  $(".rSort").removeClass("selected");
  $(this).addClass("selected");
  if ($(this).hasClass("toggled")) { $(this).removeClass("toggled"); var sorted = "ascend"; }
  else if ($(this).hasClass("selected")) { $(this).addClass("toggled"); var sorted ="descend"; } 
  tableSort("#rtablehere","republican",dataR,$(this).attr("candidate"),sorted);
});

$(".dSort").click(function() {
  $(".dSort").removeClass("selected");
  $(this).addClass("selected");
  if ($(this).hasClass("toggled")) { $(this).removeClass("toggled"); var sorted = "ascend"; }
  else if ($(this).hasClass("selected")) { $(this).addClass("toggled"); var sorted ="descend"; } 
  tableSort("#dtablehere","democrat",dataD,$(this).attr("candidate"),sorted);
});

$("#dSwitch").click(function() {
  mapReshade("#mn_map", "mn_caucus.json", "democrat", dataD);
});
$("#rSwitch").click(function() {
  mapReshade("#mn_map", "mn_caucus.json", "republican", dataR);
});

$("#toggleR").click(function() {
  if ($(this).hasClass("toggled")) { 
    $("#tableR").hide();
    $("#tableD").hide();
    $("#analysis").show();
    $(this).removeClass("toggled");
  } else {
    $("#tableR").show();
    $("#tableD").show();
    $("#analysis").hide();
    $(this).addClass("toggled");
  }
});
$("#toggleD").click(function() {
    if ($(this).hasClass("toggled")) { 
    $("#tableR").hide();
    $("#tableD").hide();
    $("#analysis").show();
    $(this).removeClass("toggled");
  } else {
    $("#tableR").show();
    $("#tableD").show();
    $("#analysis").hide();
    $(this).addClass("toggled");
  }
});

function tableSort(container,party,data,candidate,sorted){
   
  d3.select(container).selectAll(".card").sort(function(a, b) {
      if (candidate == "romney") { 
        if (sorted == "descend") { return d3.descending(a.RomneyPct, b.RomneyPct); }
        if (sorted == "ascend") { return d3.ascending(a.RomneyPct, b.RomneyPct); }
     }
      if (candidate == "mccain") { 
        if (sorted == "descend") { return d3.descending(a.McCainPct, b.McCainPct); }
        if (sorted == "ascend") { return d3.ascending(a.McCainPct, b.McCainPct); }
     }
      if (candidate == "keyes") {
        if (sorted == "descend") { return d3.descending(a.KeyesPct, b.KeyesPct); }
        if (sorted == "ascend") { return d3.ascending(a.KeyesPct, b.KeyesPct); }
     }
      if (candidate == "huckabee") {
        if (sorted == "descend") { return d3.descending(a.HuckabeePct, b.HuckabeePct); }
        if (sorted == "ascend") { return d3.ascending(a.HuckabeePct, b.HuckabeePct); }

     }
      if (candidate == "paul") {
        if (sorted == "descend") { return d3.descending(a.PaulPct, b.PaulPct); }
        if (sorted == "ascend") { return d3.ascending(a.PaulPct, b.PaulPct); }
     }
      if (candidate == "city") {
        if (sorted == "descend") { return d3.descending(a.MCD_name, b.MCD_name); }
        if (sorted == "ascend") { return d3.ascending(a.MCD_name, b.MCD_name); }
     }
      if (candidate == "obama") {
        if (sorted == "descend") { return d3.descending(a.ObamaPct, b.ObamaPct); }
        if (sorted == "ascend") { return d3.ascending(a.ObamaPct, b.ObamaPct); }
     }
      if (candidate == "clinton") {
        if (sorted == "descend") { return d3.descending(a.ClintonPct, b.ClintonPct); }
        if (sorted == "ascend") { return d3.ascending(a.ClintonPct, b.ClintonPct); }
     }
      if (candidate == "biden") {
        if (sorted == "descend") { return d3.descending(a.BidenPct, b.BidenPct); }
        if (sorted == "ascend") { return d3.ascending(a.BidenPct, b.BidenPct); }
     }
      if (candidate == "edwards") {
       if (sorted == "descend") { return d3.descending(a.EdwardsPct, b.EdwardsPct); }
       if (sorted == "ascend") { return d3.ascending(a.EdwardsPct, b.EdwardsPct); }
     }
    })
    .transition().duration(500);
}

function tableBuild(container,party,data,state,county,index){
if (party == "republican") { var precinct = "precinctR"; var result = "resultR"; }
else if (party == "democrat") { var precinct = "precinctD"; var result = "resultD"; }
var compareParty = party;

d3.select(container).selectAll(".card")
.data(data).enter().append("div")
.attr("class","card")
.html(function (d){ 
      if (compareParty == "republican") { 
        var party = "Republican";
        var shade = "republican";  
        if  (d.WinnerPct >= .70) { var swatch = "r4"; }
        else if  (d.WinnerPct >= .50) { var swatch = "r3"; }
        else if  (d.WinnerPct >= .30) { var swatch = "r2"; }
        else if  (d.WinnerPct > 0) { var swatch = "r1"; }

        var candidate1 = d.McCainPct;
        var candidate2 = d.RomneyPct;
        var candidate3 = d.KeyesPct;
        var candidate4 = d.HuckabeePct;
        var candidate5 = d.PaulPct;
    }
    else if (compareParty == "democrat") { 
        var shade="democrat";
        var party = "Democrat"; 
        if  (d.WinnerPct >= .70) { var swatch = "d4"; }
        else if  (d.WinnerPct >= .50) { var swatch = "d3"; }
        else if  (d.WinnerPct >= .30) { var swatch = "d2"; }
        else if  (d.WinnerPct > 0) { var swatch = "d1"; }

        var candidate1 = d.ObamaPct;
        var candidate2 = d.ClintonPct;
        var candidate3 = d.BidenPct;
        var candidate4 = d.EdwardsPct;
        var candidate5 = d.RichardsonPct + d.KucinichPct + d.DoddPct + d.UncommittedPct;
     }

  return "<div class='tableCell " + precinct + "'>" + d.MCD_name + "</div><div class='tableCell " + result + "'>" + candidate1 + "</div><div class='tableCell " + result + "'>" + candidate2 + "</div><div class='tableCell " + result + "'>" + candidate3 + "</div><div class='tableCell " + result + "'>" + candidate4 + "</div><div class='tableCell " + result + "'>" + candidate5 + "</div>";
});

  $("." + result).each(function() {
    if (compareParty == "republican"){
      var num = $(this).text();
      if (num >= .70) { $(this).addClass("r4"); $(this).html(d3.format("%")(num)); }
      else if (num >= .50) { $(this).addClass("r3"); $(this).html(d3.format("%")(num)); } 
      else if (num >= .30) { $(this).addClass("r2"); $(this).html(d3.format("%")(num)); }
      else if (num > 0) { $(this).addClass("r1"); $(this).html(d3.format("%")(num)); }
      else if (num == 0) { $(this).addClass("mid"); $(this).html(d3.format("%")(num)); }
    }
    if (compareParty == "democrat"){
      var num = $(this).text();
      if (num >= .70) { $(this).addClass("d4"); $(this).html(d3.format("%")(num)); }
      else if (num >= .50) { $(this).addClass("d3"); $(this).html(d3.format("%")(num)); } 
      else if (num >= .30) { $(this).addClass("d2"); $(this).html(d3.format("%")(num)); }
      else if (num > 0) { $(this).addClass("d1"); $(this).html(d3.format("%")(num)); }
      else if (num == 0) { $(this).addClass("mid"); $(this).html(d3.format("%")(num)); }
    }
  });

  $("." + precinct).click(function() {

jQuery.fn.d3Click = function () {
  this.each(function (i, e) {
    var evt = document.createEvent("MouseEvents");
    evt.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);

    e.dispatchEvent(evt);
  });
};

jQuery.fn.d3Down = function () {
  this.each(function (i, e) {
    var evt = document.createEvent("MouseEvents");
    evt.initMouseEvent("mousedown", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);

    e.dispatchEvent(evt);
  });
};

jQuery.fn.d3Up = function () {
  this.each(function (i, e) {
    var evt = document.createEvent("MouseEvents");
    evt.initMouseEvent("mouseup", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);

    e.dispatchEvent(evt);
  });
};
    
    $("#tableR").hide();
    $("#tableD").hide();
    $("#analysis").show();

    $("." + precinct).removeClass("selected");
    $(this).addClass("selected");
    $("#precinctName").html($(this).text() + ", " + $(this).parent().find('.county').text() + " County");

    redrawChart(chart,"#chart",$(this).parent().parent().attr("data"),data,$(this).text(),0);

    $("[id='" + $(this).text().replace(new RegExp(" ", "g"),"-") + "']").d3Down();
    $("[id='" + $(this).text().replace(new RegExp(" ", "g"),"-") + "']").d3Up();
    $("[id='" + $(this).text().replace(new RegExp(" ", "g"),"-") + "']").d3Click();
  });

}

//MAPAGGEDON
function mapColor(d, race, dataCompare){
  if (race == "republican"){
  for (var i=0; i < dataCompare.length; i++){
    if (dataCompare[i].MCD_name == d){
      if (dataCompare[i].WinnerPct >= .70){ return "r4"; }
      else if (dataCompare[i].WinnerPct >= .50){ return "r3"; }
      else if (dataCompare[i].WinnerPct >= .30){ return "r2"; }
      else if (dataCompare[i].WinnerPct > 0){ return "r1"; }
    }
  }
}
  if (race == "democrat"){
  for (var i=0; i < dataCompare.length; i++){
    if (dataCompare[i].MCD_name == d){
      if (dataCompare[i].WinnerPct >= .70){ return "d4"; }
      else if (dataCompare[i].WinnerPct >= .50){ return "d3"; }
      else if (dataCompare[i].WinnerPct >= .30){ return "d2"; }
      else if (dataCompare[i].WinnerPct > 0){ return "d1"; }
    }
  }
}
  
}

function mapTips(d, subject, dataCompare){
    for (var i=0; i < dataCompare.length; i++){
    if (dataCompare[i].MCD_name == d.properties.NAME){
      return  "<strong>" + d.properties.MCD_NAME + "</strong><div class='" + mapColor(d.properties.NAME, subject, dataCompare) + "'>" + d3.format("%")(dataCompare[i].WinnerPct) + " win margin</div>";
    }
  }
      return  "<strong>" + d.properties.MCD_NAME + "</strong>"; 
}

function mapBuild(container, boxContainer, chartContainer, shape, race, geo, dataCompare, index) {

var width = 350,
    height = 400,
    centered;

if (geo=="us") { var projection = d3.geo.albersUsa().scale(700).translate([330, 200]); }
else if (geo=="mn") { var projection = d3.geo.albersUsa().scale(5037).translate([50, 970]); }
else if (geo=="metro") { var projection = d3.geo.mercator().scale([16800]).center([-92.263184,44.863656]); }

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
      .attr("class", "states")
    .selectAll("path")
      .data(us.features)
    .enter().append("path")
      .attr("d", path)
      .on("click", clicked)
      .attr("id", function(d) { var str = d.properties.NAME; return str.replace(new RegExp(" ", "g"),"-"); })
      .attr("precinctName", function(d){ return d.properties.MCD_NAME })
      .attr("class", function(d){
         return mapColor(d.properties.NAME, race, dataCompare);
        })
       .on("mousedown", function(d, i){   
          $("#precinctName").html(d.properties.MCD_NAME);
          redrawChart(chart,"#chart",race,dataCompare,d.properties.NAME,0);
       })
      .style("stroke-width", "0")
      .call(d3.helper.tooltip(function(d, i){
        return mapTips(d, race, dataCompare);
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

$(".zoom, .myButton2").click(function() {
  $('.precinctD, .precinctR').removeClass("selected");
  $("#precinctName").html("Minnesota");
  $(".card").show();
  clicked2();
  redrawChart(chart,"#chart",race,dataCompare,"Minnesota",0);
  $("#oNum").html("66%");
  $("#cNum").html("32%");
  $("#mNum").html("22%");
  $("#rNum").html("41%");
  $("#voteTotalR").html("62,828");
  $("#voteTotalD").html("214,066");
  $("#mNum,#rNum").removeClass("r1 r2 r3 r4");    
  $("#mNum,#rNum").addClass("r2"); 
  $("#oNum, #cNum").removeClass("d1 d2 d3 d4");
  $("#oNum").addClass("d3"); 
  $("#cNum").addClass("d2");
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
    k = 10;
    centered = null;
  }

  g.selectAll("path")
      .classed("faded", true)
      .classed("active", centered && function(d) { return d === centered; });

  g.transition()
      .duration(750)
      .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")scale(" + k + ")translate(" + -x + "," + -y + ")")
      .style("stroke-width", 1.5 / k + "px");
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

  g.transition()
      .duration(750)
      .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")scale(" + k + ")translate(" + -x + "," + -y + ")")
      .style("stroke-width", 1.5 / k + "px");
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

function mapReshade(container, shape, race, dataCompare) {

d3.json("shapefiles/" + shape, function(error, us) {

d3.selectAll(container + " svg g path")
      .data(us.features)
      .attr("class", function(d){
          return mapColor(d.properties.NAME, race, dataCompare);
        })
      .call(d3.helper.tooltip(function(d, i){
        return mapTips(d, race, dataCompare);
      }));
  });
}

//CHARTAGGEDON
var chart = [];
var index = 0;
// function chartBuild(container,subject,data,county,index){
  var colorArray = ['#0D4773','#9C0004','#777']; 
  var formatter = d3.format('%');

nv.addGraph(function() {
  chart[index] = nv.models.multiBarHorizontalChart()
      .x(function(d) { return d.label })
      .y(function(d) { return d.value })
      .margin({top: 30, right: 30, bottom: 20, left: 100})
      .showValues(false)
      .tooltips(true)
      .stacked(false)
      .showLegend(false)
      .color(colorArray)
      // .width($(container).width()).height($(container).height())
      .showControls(false);

  chart[index].forceY([0,1]);

   chart[index].yAxis
      .tickFormat(formatter);

  d3.select('#chart svg')
      .datum(chartData("president",dataD,"Minnesota"))
      .transition().duration(500)
      .call(chart[index]);

  nv.utils.windowResize(chart[index].update);

  return chart[index];
});

// }

function redrawChart(chart,container,subject,data,county,index){
  var colorArray = ['#0D4773','#9C0004','#777']; 
  var formatter = d3.format('%');

    d3.select(container + ' svg').datum(chartData(subject,data,county)).transition().duration(300).call(chart[index].color(colorArray));
    // chart[index].yAxistickFormat(formatter);
    nv.utils.windowResize(chart[index].update);
}

function chartData(subject,data,county) {

var romney, mccain, huckabee, paul, keyes, guiliani, others, obama, clinton, edwards, kucinich, biden, richardson, dodd, uncommitted;

for (var i=0; i < dataR.length; i++){
  if (dataR[i].MCD_name == county){
    romney = dataR[i].RomneyPct;
    mccain = dataR[i].McCainPct;
    huckabee = dataR[i].HuckabeePct;
    paul = dataR[i].PaulPct;
    keyes = dataR[i].KeyesPct;
    guiliani = 0;
    others = 0;
    $("#voteTotalR").html(d3.format(",")(dataR[i].TotalVotes));
      if (mccain >= .70){ var shade1 = "r4"; }
      else if (mccain >= .50){ var shade1 = "r3"; }
      else if (mccain >= .30){ var shade1 = "r2"; }
      else if (mccain > 0){ var shade1 = "r1"; }
      if (romney >= .70){ var shade2 = "r4"; }
      else if (romney >= .50){ var shade2 = "r3"; }
      else if (romney >= .30){ var shade2 = "r2"; }
      else if (romney > 0){ var shade2 = "r1"; }
    $("#mNum,#rNum").removeClass("r1 r2 r3 r4");
    $("#mNum").addClass(shade1);
    $("#rNum").addClass(shade2);
    $("#mNum").html(d3.format("%")(mccain));
    $("#rNum").html(d3.format("%")(romney));
    if (mccain < romney) { $("#mMark").html(""); $("#rMark").html("&#x2713;"); }
    else if (romney < mccain) { $("#rMark").html(""); $("#mMark").html("&#x2713;"); }
    break;
  }
}

for (var i=0; i < dataD.length; i++){
    if (dataD[i].MCD_name == county){
    obama = dataD[i].ObamaPct;
    clinton = dataD[i].ClintonPct;
    edwards = dataD[i].EdwardsPct;
    kucinich = dataD[i].KucinichPct;
    biden = dataD[i].BidenPct;
    richardson = dataD[i].RichardsonPct;
    dodd = dataD[i].DoddPct;
    uncommitted = dataD[i].UncommittedPct;
    $("#voteTotalD").html(d3.format(",")(dataD[i].TotalVotes));
      if (obama >= .70){ var shade1 = "d4"; }
      else if (obama >= .50){ var shade1 = "d3"; }
      else if (obama >= .30){ var shade1 = "d2"; }
      else if (obama > 0){ var shade1 = "d1"; }
      if (clinton >= .70){ var shade2 = "d4"; }
      else if (clinton >= .50){ var shade2 = "d3"; }
      else if (clinton >= .30){ var shade2 = "d2"; }
      else if (clinton > 0){ var shade2 = "d1"; }
    $("#oNum, #cNum").removeClass("d1 d2 d3 d4");
    $("#oNum").addClass(shade1);
    $("#cNum").addClass(shade2);
    $("#oNum").html(d3.format("%")(obama));
    $("#cNum").html(d3.format("%")(clinton));
    if (obama < clinton) { $("#oMark").html(""); $("#cMark").html("&#x2713;"); }
    else if (clinton < obama) { $("#cMark").html(""); $("#oMark").html("&#x2713;"); }
    break;
  }
}

if (county == "Minnesota"){
      return [{
        "key": "Democrat Vote %",
        "values": [
          { 
            "label" : "Obama" ,
            "value" : .66
          },
          { 
            "label" : "Clinton" ,
            "value" : .32
          },
          { 
            "label" : "Edwards" ,
            "value" : .05
          },
          { 
            "label" : "Kucinich" ,
            "value" : .02
          },
          { 
            "label" : "Biden" ,
            "value" : .01
          },
          { 
            "label" : "Richardson" ,
            "value" : 0
          },
          { 
            "label" : "Dodd" ,
            "value" : 0
          },
          { 
            "label" : "Uncommitted" ,
            "value" : .06
          }
        ]
      },{
        "key": "Republican Vote %",
        "values": [
          { 
            "label" : "McCain" ,
            "value" : .22
          },
          { 
            "label" : "Romney" ,
            "value" : .41
          },
          { 
            "label" : "Huckabee" ,
            "value" : .20
          },
          { 
            "label" : "Paul" ,
            "value" : .16
          },
          { 
            "label" : "Keyes" ,
            "value" : .06
          },
          { 
            "label" : "Guiliani" ,
            "value" : 0
          },
          { 
            "label" : "Others" ,
            "value" : .05
          }  
        ]
      }]
    }
  else {
    return [{
        "key": "Democrat Vote %",
        "values": [
          { 
            "label" : "Obama" ,
            "value" : obama
          },
          { 
            "label" : "Clinton" ,
            "value" : clinton
          },
          { 
            "label" : "Edwards" ,
            "value" : edwards
          },
          { 
            "label" : "Kucinich" ,
            "value" : kucinich
          },
          { 
            "label" : "Biden" ,
            "value" : biden
          },
          { 
            "label" : "Richardson" ,
            "value" : richardson
          },
          { 
            "label" : "Dodd" ,
            "value" : dodd
          },
          { 
            "label" : "Uncommitted" ,
            "value" : uncommitted
          }
        ]
      },{
        "key": "Republican Vote %",
        "values": [
          { 
            "label" : "McCain" ,
            "value" : mccain
          },
          { 
            "label" : "Romney" ,
            "value" : romney
          },
          { 
            "label" : "Huckabee" ,
            "value" : huckabee
          },
          { 
            "label" : "Paul" ,
            "value" : paul
          },
          { 
            "label" : "Keyes" ,
            "value" : keyes
          },
          { 
            "label" : "Guiliani" ,
            "value" : guiliani
          },
          { 
            "label" : "Others" ,
            "value" : others
          }  
        ]
      }]
  }
}

$( document ).ready(function() {
     $('#filterR input, #filterD input').keyup(function(i){
        $('.card').hide();
        var txt = $(this).val();
        $('.card').each(function(){
           if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
               $(this).show();
           }
        });
    });

});

  tableBuild("#rtablehere","republican",dataR,"mn",null,0);
  tableBuild("#dtablehere","democrat",dataD,"mn",null,0);

  mapBuild("#mn_map", "#infobox", "#chart", "mn_caucus.json", "democrat", "mn", dataD, 0);

// });
// });
</script>

</html>