<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" href="jquery.bxslider.css">
  <title>IMDb.dit</title>
  
  <link rel="stylesheet" href="static/css/style.css" type="text/css" media="screen" />
  <link rel="shortcut icon" href="http://www.dit.ing.unp.edu.ar/wp-content/uploads/favicon.png" type="image/x-icon" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

  <script src="static/js/jquery.min.js" type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" href="static/css/slidedvm.min.css">
  <script type="text/javascript" src="static/js/jquery.bxslider.min.js"></script>
   
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
          <form method="get" id="searchform" action="http://www.dimensionpeliculas.com/"><input type="text" value="Buscar pelicula/serie" name="s" id="s" onfocus="if (this.value == 'Buscar pelicula/serie') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Buscar pelicula/serie';}"><input type="image" src="http://3.bp.blogspot.com/-zq0urLoOrUk/ToqiHUJxaqI/AAAAAAAAC9I/ZP8dcRolI0w/s00/lupa.png" id="searchsubmit"></form>
        </div>
      </div>
      <br>
    </div>
  
    <div class="slider-wrap">
      <div id="loaderpage">&nbsp;</div>
    <div class="slider" style="visibility: hidden;">    
    <ul>
      <li>
        <a title="Batman (1989)" href ="http://www.imdb.com/title/tt0096895">
        <img class="panel" src="imagenes/1.jpg" alt="Batman (1989)"/></a>
      </li>

      <li>
        <img src="imagenes/2.jpg" />
      </li> 
      
      <li>
        <img src="imagenes/3.jpg" />
      </li> 
      
      <li>
        <img src="imagenes/4.jpg" />
      </li> 
      
      <li>
        <img src="imagenes/5.jpg" />
      </li>
      <li>
      
      <img src="imagenes/6.jpg" />
      </li>
      
      <li>
        <img src="imagenes/7.jpg" />
      </li>
    </ul> 
    </div>
    <a href="#" class="slider-arrow sa-left"></a>
    <a href="#" class="slider-arrow sa-right"></a>
    </div>
  </div>

</body>
</html>
