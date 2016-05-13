jQuery(document).ready(function (){
	function buscar_poster(imdb_id, img_id) {
		var img_url;
        var API_KEY = "53eb1914f7a9090c92553339f74280ce";
        jQuery.ajax({
            url: "https://api.themoviedb.org/3/movie/" + imdb_id + "?api_key=" + API_KEY,
            type: "GET"
        })
        .done(function( data ) {
        	jQuery("#" + img_id).attr("src", "http://image.tmdb.org/t/p/w150" + data.poster_path);
        })
        .fail(function (){
        	alert("Error, verificar conexion a internet");
        })
        ;
    }
    
    function buscar_peliculas(search_term){
        var url = "buscapeliculas.php";
        if(search_term !== "*")
            url += "?id=" + search_term;
            console.log(url);
        jQuery.ajax({
                url: url,
                type: "GET",
                data: {id: jQuery('#id').val()}
            }).done(function( data ) {
                mostrar_peliculas(data, search_term);
            })
        });
    }
  
    function mostrar_peliculas(data, search_term){

        var peliculas = jQuery('#peliculas');
        peliculas.empty();

        for(var i=0;i<data.length;i++){
            var pelicula = data[i];
            var pelicula_tapa_id = "portada-" + pelicula['identificador'];
            console.log(pelicula);
            var pelicula_html = $([
                "<div class='col-md-2 col-lg-2 item-pelicula'>",
                "   <span class='overlay' id='overlay-portada-"+  pelicula['identificador'] +"' data-pelicula-identificador='" + pelicula['identificador'] +"' ></span>",
                "   <img id='" + pelicula_tapa_id + "' class='portada' alt='' />",
                "   <p class='titulo'>" + pelicula['nombre']  + "</p>",
                "   <div class='puntaje puntaje-form'>",
                "    <input type='hidden' data-readonly",
                "    name='rating' id='rating' class='rating' data-filled='glyphicon glyphicon-star' data-pelicula-identificador=" + pelicula['identificador'],
                "    data-empty='glyphicon glyphicon-star-empty' value='"+pelicula['ponderacion']+"'/>",
                "   </div>",
                "</div>"
            ].join("\n"));
            buscar_poster(pelicula['identificador'], pelicula_tapa_id);
            peliculas.append(pelicula_html);
            //el rating lo saque de aca:
            //http://www.jqueryrain.com/2016/04/star-rating-jquery-plugin-using-svg/
            //http://prrashi.github.io/rateYo/
            jQuery('.rating').rating();
            jQuery('#overlay-portada-' + pelicula['identificador']).bind("click", function(e) {
                mostrar_modal(jQuery(this).data('pelicula-identificador'));
                console.log(pelicula['identificador']);
                console.log(pelicula['nombre']);
            });

        }
    }    

    //http://stackoverflow.com/questions/13183630/how-to-open-a-bootstrap-modal-window-using-jquery
    function mostrar_modal(id, nombre) {
        console.log(id);
        console.log(nombre);
        //jQuery('#myModal').modal('show');
        armar_modal(id, function(){
          jQuery('#myModal').modal('show');
        });
    }
    //https://www.youtube.com/watch?v=7ChTwUnZerQ
    //https://nakupanda.github.io/bootstrap3-dialog/
    jQuery(".buscadormenu #search-term-button").click(function () {
        var search_term = jQuery("#search-term-input").val();
        console.log(search_term);
        buscar_peliculas(search_term);
    });

    function armar_modal(imdb_id, callback){
        var API_KEY = "53eb1914f7a9090c92553339f74280ce";
        var url = "https://api.themoviedb.org/3/movie/" + imdb_id + "?api_key=" + API_KEY;
        $.ajax({
            url: url,
            type: "GET"
        })
        .done(function (data) {
            $('.modal-title-comparacion').html(data.original_title);
            var markup_pelicula =
            "<img id='' class='portada' src='http://image.tmdb.org/t/p/w150"+ data.poster_path +"' alt='' />" +
            "<div class='puntaje puntaje-modal'>" +
            "    <input type='hidden' data-readonly" +
            "    name='rating' id='rating-"+data.imdb_id+"' class='rating' data-filled='glyphicon glyphicon-star'" +
            "    data-empty='glyphicon glyphicon-star-empty' data-fractions='2' value=''/>"+
            "</div>";
            $("#myModal #info").html(markup_pelicula);
            //$('#release-date').html(new Date(data.release_date).getFullYear());
            //$('#overview-text').html(overview);
            //$('#genres').html(genres);
            $('#btn-comparar').click(function (){
                var select = $('#select-grupo-comparacion');
                consultar_api_externa($(select)[0].selectedIndex+1, imdb_id);
                var strGrupo = $(select)[0].options[$(select)[0].selectedIndex].text;
                $('#nombre-grupo').html(strGrupo);
            });
            $.ajax({
                    url: "api.php/movies?term=" + imdb_id,
                    type: "GET"
                })
                .done(function( data_api ) {
                    var rating = data_api[0].rating
                    $('#rating-'+imdb_id).rating('rate', rating );
                    $('#rating-local').html(rating);
            });
            callback();
        })
    }
    /* Event handling */
    /*$('#info-grupos-btn').click(function(){
        $('#modal-info-grupos').modal('show');
        completarApisURL();
    });*/

});