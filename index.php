<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" href="jquery.bxslider.css">
  <title>IMDb.dit</title>
  
  <link rel="stylesheet" href="content/css/style.css" type="text/css" media="screen" />
  <link rel="shortcut icon" href="http://www.dit.ing.unp.edu.ar/wp-content/uploads/favicon.png" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="content/css/slidedvm.min.css">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script type="text/javascript" src="content/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="content/js/jquery.min.js" ></script>
  <script type="text/javascript" src="content/js/jquery.bxslider.min.js"></script>

  <script type="text/javascript">
    jQuery(document).ready(function(e) {
    jQuery('.slider').lbSlider({
        leftBtn: '.sa-left',
        rightBtn: '.sa-right',
        visible: 7,
        autoPlay: true,
        autoPlayDelay: 3 /* Tiempo en segundos del movimiento */
    })
    jQuery( ".slider ul li" ).hover(function() {
          var toltip = jQuery(this).children('a');
          var textoTooltip = toltip.attr("title");
          var linkTooltip = toltip.attr("href");
          jQuery(this).append('<div class="tooltip" onClick="location.href=\'' + linkTooltip + '\'"><a href="' + linkTooltip + '">' + textoTooltip + '</a></div>');
        }, function() {
          jQuery( this ).find( ".tooltip" ).remove();
        })
    });
    </script>
</head>

<body>
  <div id="marco">

    <div id="cabeza">
      <div id="logo">
        <h1>
          <a href=" http://www.dit.ing.unp.edu.ar/">Acceso al Dit</a>
        </h1> 
      </div>
    </div>

    <div id="toppic">
      <div id="topwrapper">
        <div id="buscadormenu">
          <form method="get" id="searchform" action="buscapeliculas.php">
            <input type="text" value="Buscar pelicula" name="id" id="id" onfocus="if (this.value == 'Buscar pelicula') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Buscar pelicula';}">
            <span id="searchBoostrap" class="glyphicon glyphicon-search"></span>        
        </div>
        <div class="link_cat"><a href="forminserta.html">Agregar pel&iacute;culas</a>
        </div>
      </div>
      
    </div><br>
  
    <div class="slider-wrap">
      <div id="loaderpage">&nbsp;</div>
    <div class="slider" style="visibility: hidden;">    
    <ul>
      <li>
        <a title="Batman - El caballero de la noche" href ="http://www.imdb.com/title/tt0468569">
        <img class="panel" src="imagenes/1.jpg" alt="Batman - El caballero de la noche"/></a>
      </li>

      <li>
        <a title="La caza al Octubre Rojo" href ="http://www.imdb.com/title/tt0099810">
        <img class="panel" src="imagenes/2.jpg" alt="La caza al Octubre Rojo"/></a>
      </li> 
      
      <li>
         <a title="GoldenEye" href ="http://www.imdb.com/title/tt0113189">
        <img class="panel" src="imagenes/3.jpg" alt="GoldenEye"/></a>
      </li> 
      <li>
        <a title="American Pie" href ="http://www.imdb.com/title/tt0163651">
        <img class="panel" src="imagenes/4.jpg" alt="American Pie"/></a>
      </li> 
      <li>
        <a title="El silencio de los inocentes" href ="http://www.imdb.com/title/tt0102926/">
        <img class="panel" src="imagenes/5.jpg" alt="El silencio de los inocentes"/></a>
      </li>
      <li>
        <a title="El barco" href ="http://www.imdb.com/title/tt0082096">
        <img class="panel" src="imagenes/6.jpg" alt="El barco"/></a>
      </li>
      <li>
        <a title="Mujer bonita" href ="http://www.imdb.com/title/tt0100405">
        <img class="panel" src="imagenes/7.jpg" alt="Mujer bonita"/></a>      
      </li>
    </ul> 
    </div>
    <a href="#" class="slider-arrow sa-left"></a>
    <a href="#" class="slider-arrow sa-right"></a>
    </div>
    <div id="caja">
      <div class="cat_title">Peliculas con puntajes<div class="link_cat">

    </div>  
  </div>
  </br>
  <br></br>

  <script type="text/javascript">
    jQuery(window).load(function() {
    jQuery('#loaderpage').fadeOut( "slow", function() {
    jQuery('#loaderpage').remove(); 
    jQuery('div.slider').css({ visibility: "visible" });
  });
})
</script>

</body>
</html>
