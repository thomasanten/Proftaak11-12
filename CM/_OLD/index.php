 <?php
	include('modules/connection.php');
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <title>MONITOR</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Quantico:400,400italic,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="style.css" />
<script src="js/jquery.desknoty.js"></script>
  <script>
 //VOOR HET EERST ALLES OPHALEN 
$.ajax({
      url: 'haalop.php',
      success: function(data) 
      {
            $("#allecolumns").html(data);
      }

      });
</script>
<script>
// GLOBALE VARIABELES DEFINEREN VOOR DE INKLAPKNOP

$(window).load(function() {
var oudehoek = 0;
var schakel = 1;
var responsiveschakelmid = 1;
$( "#toggleknop" ).html("<div id='pijltje'></div><span>Alles inklappen</span></div>");
console.log("running");
    $(".column1" ).sortable({
      connectWith: ".column1"
    });
  $( ".column2" ).sortable({
      connectWith: ".column2"
    });
    $( ".column3" ).sortable({
      connectWith: ".column3"
    });
    $( ".column4" ).sortable({
      connectWith: ".column4"
    });
    $( ".portlet" ).addClass( "" )
      .find( ".portlet-header" )
        .prepend( "<span class='ui-icon ui-icon-minusthick'></span>")
        .end()
      .find( ".portlet-content" );
 console.log("running2");
    $( ".portlet-header .ui-icon" ).click(function() {
      $( this ).toggleClass( "ui-icon-minusthick" ).toggleClass( "ui-icon-plusthick" );
      $( this ).parents( ".portlet:first" ).find( ".portlet-content, .bar" ).toggle();
      
    });
        $( "#toggleknop" ).click(function() {
        

        console.log(schakel);
        if(schakel == 1){
	     
 
      $('.ui-icon').removeClass( "ui-icon-minusthick" ).addClass( "ui-icon-plusthick" );
      $('.ui-icon').parents( ".portlet" ).find( ".portlet-content, .bar" ).hide();
 
  
    var nieuwehoek = oudehoek + 180;
    oudehoek = oudehoek + 180;
    $("#pijltje")
    .css("-webkit-transition", "-webkit-transform 0.20s ease-in-out");
    
         $("#pijltje").css("-webkit-transform", "rotateZ(" + nieuwehoek + "deg)");
	 $('#toggleknop>span').html("Alles uitklappen")
	 schakel++;
		return true;
     }else if(schakel == 2){

      $('.ui-icon').addClass( "ui-icon-minusthick" ).removeClass( "ui-icon-plusthick" );
      $('.ui-icon').parents( ".portlet" ).find( ".portlet-content, .bar" ).show();
 
  
    var nieuwehoek = oudehoek + 180;
    oudehoek = oudehoek + 180;
    $("#pijltje")
    .css("-webkit-transition", "-webkit-transform 0.20s ease-in-out");
    
         $("#pijltje").css("-webkit-transform", "rotateZ(" + nieuwehoek + "deg)");
	 $('#toggleknop>span').html("Alles inklappen");
            
            schakel = 1;
            }
            });            
            
            
           
    $( "#settings, #counter" ).disableSelection();
    
    setInterval(function(){
    $('.prio1').fadeOut(2000, function() {
    $('.prio1').show();
       });
    
   
}, 2800);

$('#refreshknop').click(function(){
	window.location.reload();
});
$('#naararchief').click(function(){
	window.location.href = 'http://athena.fhict.nl/users/i258181/monitor/archief.php';

});
//RESPONSIVE SLIDER
$('#counter').click(function(){
if(responsiveschakelmid == 1){
$('#allecolumns, #cats').stop().animate({
   marginLeft: "-394px"
  }, 300 );
  $('#countslide').animate({
   marginLeft: "60px"
  }, 80 );
  
   responsiveschakelmid++;
		return true;
     }else if(responsiveschakelmid == 2){
     $('#allecolumns, #cats').stop().animate({
   marginLeft: "5px"
  }, 300 );

     
  $('#countslide').animate({
   marginLeft: "0px"
  }, 80 );  
     
      responsiveschakelmid = 1;
            }
            });    

//RESPONSIVE MINISLIDER
$('#kwart1').click(function(){

$('#allecolumns, #cats').stop().animate({
   marginLeft: "6px"
  }, 300 );
  $('#minicountslide').animate({
   marginLeft: "0px"
  }, 80 );
});

//RESPONSIVE MINISLIDER
$('#kwart2').click(function(){

$('#allecolumns, #cats').stop().animate({
   marginLeft: "-393px"
  }, 300 );
  $('#minicountslide').animate({
   marginLeft: "60px"
  }, 80 );
});
//RESPONSIVE MINISLIDER
$('#kwart3').click(function(){

$('#allecolumns, #cats').stop().animate({
   marginLeft: "-792px"
  }, 300 );
  $('#minicountslide').animate({
   marginLeft: "120px"
  }, 80 );
});
 //RESPONSIVE MINISLIDER
$('#kwart4').click(function(){

$('#allecolumns, #cats').stop().animate({
   marginLeft: "-1193px"
  }, 300 );
  $('#minicountslide').animate({
   marginLeft: "180px"
  }, 80 );
});   
     

 $('.delete').click(function(){
    var dezemelding = $(this).parents(':eq(1)').attr('id');
    $('#' + (dezemelding)).fadeOut(70, function(){
	$('#' + (dezemelding)).remove();    
	 });
    
   $.post("naararchief.php", { ID:(dezemelding)} );
    
    });
});
     
</script>
</head>
<body>
<div id="counter">
<div id="countslide"></div>
</div>
<div id="minicounter">
<div id="minicountslide"></div>
<div id="kwart1"></div>
<div id="kwart2"></div>
<div id="kwart3"></div>
<div id="kwart4"></div>
</div><div id="settings"><div id="toggleknop"><div id="pijltje"></div><span>Alles inklappen</span></div><div id="refreshknop"><div id="refresh"></div><span>Herladen</span></div><div id="naararchief"><span>Naar het archief</span></div></div>
<div id="allecats"><div id="cats"><span>CATEGORIE 1</span><span>CATEGORIE 2</span><span>CATEGORIE 3</span><span>CATEGORIE 4</span></div></div>
<div id="dejongens">
<div id="touw">
<div id="allecolumns">
<script>
     var aantalbestaande = $('.portlet').length;
     var aantalnieuwe = 0;
     console.log(aantalbestaande);
     console.log("Ey gringo");
setInterval(function(){
$.ajax({
      url: 'hoeveelmeldingen.php',
      success: function(data) 
      {
            aantalnieuwe = (data);
            console.log(aantalnieuwe);
      }

      });
      if(aantalnieuwe > aantalbestaande){

$.ajax({
      url: 'haalop.php',
      success: function(data) 
      {
            $("#allecolumns").html(data);
            $(window).load();
      }

      });

if((aantalnieuwe - aantalbestaande) == 1){

$.desknoty({
icon: "http://www.google.com/landing/chrome/ugc/chrome-icon.jpg",
title: "Nieuwe Melding",
body: "Een nieuwe melding!"
});
alert("1 nieuwe melding!");
aantalbestaande++;

}else{
aantalbestaande = $('.portlet').length;
}
}


}, 2000);

</script>

</div>
 </div>
</div>
</body>
</html>