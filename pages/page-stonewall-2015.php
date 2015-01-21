<?php/*
Template Name: UCLA stonewall
*/ ?>
<?php get_header(); ?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Stonewall</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
<script type='text/javascript' src='/javascripts/jquery.tipsy.js'></script>
<link rel="stylesheet" href="/stylesheets/tipsy.css" type="text/css" />

<style>
h1{
	text-align: center;
	font-size: 40px;
}
h2 {
	text-indent: 70px;
    border: 2px solid #a1a1a1;
    padding: 10px 40px; 
    background: #dddddd;
    width: 1200px;
    border-radius: 25px;
    font-size: 20px;
}

.stone
{    
    float:left;
    width:300px;
    height:120px;
    margin:10px;
    height:120px;
    bottom: 0;
}
.texts
{
	margin: 10 auto;
	position: relative;
	color: white;
	text-align: center;
	bottom: -80px;
}

.popbox {
    display: none;
    position: absolute;
    z-index: 99999;
    width: 400px;
    padding: 10px;
    background: #EEEFEB;
    color: #000000;
    border: 1px solid #4D4F53;
    margin: 0px;
    -webkit-box-shadow: 0px 0px 5px 0px rgba(164, 164, 164, 1);
    box-shadow: 0px 0px 5px 0px rgba(164, 164, 164, 1);
}

</style>
</head> 

<body>
	<h1>Stonewall </h1> 
	<h2>For 96 years, the Daily Bruin has strived to hold UCLA accountable to the community it serves. We take that responsibility seriously. And when the Bruin is unjustly thwarted in its efforts to inform students, we believe you have a right to know. Each time our reporters are stonewalled in their attempts to inform readers, we will record that here, stone by stone. No stonewalling that week, no new stone. Below, you can click on each stone in the wall to read about why it's there. </h2>
	<div id="stonewall">
	</div> 
</body>
</html>

<script type="text/javascript"> 
$(document).ready(function() {	

//source file is https://docs.google.com/spreadsheet/ccc?key=0Ak0qDiMLT3XddHlNempadUs1djdkQ0tFLWF6ci1rUUE	

$(function showstones() {	

$.getJSON( "https://spreadsheets.google.com/feeds/list/13bucW1zrZjEfI2GibmJk6pNOxqNPSKRMOMK3jISLjIY/od6/public/values?alt=json",

	function (data) {	


		//$('div#stonewall').append('<div class="stone"></div>');

		$.each(data.feed.entry, function(i,entry) {	

			var dis = entry.gsx$description.$t
			$('div#stonewall').append('<div id = "s'+i+'" class="stone" title = "'+dis+'">  <div id = "t'+i+'" class = "texts">  </div> </div>');
			//var pic = '<span style="display:none">' + entry.id.$t + '</span>';	
			var pic = '<img src="http://dailybruin.com/images/2015/01/stone'+(i%4+1)+'.png" style="width:300px; height:120px; "/>';

			if (entry.gsx$date.$t)
			{
				var item = '<br/>' + entry.gsx$date.$t;	
				item += '<br/>' + entry.gsx$reason.$t;
			}

			$('#s'+i+'').append(pic);
			$('#t'+i+'').append(item);
			$('#s'+i+'').tipsy({fade: true});

			});
			console.log(data);

		});

	});
	

});
</script>

<?php get_footer(); ?>


