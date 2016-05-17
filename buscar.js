jQuery(document).ready(function (){
	function buscar_poster(id, img_id) {
		var img_url;
        var API_KEY = "53eb1914f7a9090c92553339f74280ce";
        jQuery.ajax({
            url: "https://api.themoviedb.org/3/movie/" + id + "?api_key=" + API_KEY,
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
            });
        }
    }    

    //http://stackoverflow.com/questions/13183630/how-to-open-a-bootstrap-modal-window-using-jquery
    function mostrar_modal(id, nombre) {
        console.log(id);
        armar_modal(id, function(){
          jQuery('#myModal').modal('show');
        });
    }
    
    function armar_modal(id, callback){
        var API_KEY = "53eb1914f7a9090c92553339f74280ce";
        var url = "https://api.themoviedb.org/3/movie/" + id + "?api_key=" + API_KEY;
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
            "    name='rating' id='rating-"+data.id+"' class='rating' data-filled='glyphicon glyphicon-star'" +
            "    data-empty='glyphicon glyphicon-star-empty' value=''/>"+
            "</div>";
            $("#myModal #info").html(markup_pelicula);
            //$('#release-date').html(new Date(data.release_date).getFullYear());
            //$('#overview-text').html(overview);
            //$('#genres').html(genres);
            $('#btn-comparar').click(function (){
                var select = $('#select-grupo-comparacion');
                consultar_puntaje_grupos($(select)[0].selectedIndex+1, id);
                var strGrupo = $(select)[0].options[$(select)[0].selectedIndex].text;
                $('#nombre-grupo').html(strGrupo);
            });
            $.ajax({
                    url: "buscapeliculas.php?id=" + id,
                    type: "GET"
                })
                .done(function( data_api ) {
                    var rating = data_api[0].ponderacion;
                    console.log(rating);
                    $('#rating-'+id).rating('rate', rating );
                    $('#rating-local').html(rating);
            });
            callback();
        })
    }

    function consultar_puntaje_grupos (grupo, id) {
        var query = {};
        switch (grupo) {
            case 1:
                query.url = localStorage.getItem('url-grupo-1')+'/peliculas/'+ id +'/comparar/';
                query.param_name = "ponderacion";
                query.result_type = 'int';
                break;
            case 2:
                //grupo de bruno y de matias
                query.url = 'http://192.168.2.103/tp1/movies/?id=' + id;
                query.param_name = "ranking";
                query.result_type = 'float';
                break;
            case 3://grupo de ivana, leandro y damian
                query.url = 'http://192.168.2.64:3000/movie/data/?id=' + id;
                query.param_name = "ranking";
                query.result_type = 'float';
                break;
        }
        console.log('url: '+query.url);
        jQuery.ajax({
            url: query.url,
            type: "GET",
            //crossDomain: true,
            datatype: "json"
        }).done(function(data){
            if (jQuery.isArray(data))
                data = data[0];
            console.log(data);
            if (!jQuery.isEmptyObject(data)){
                jQuery('#rating-externo').removeClass("rating-err");
                jQuery('#rating-externo').removeClass("rating-win");
                jQuery('#rating-local').removeClass("rating-win");
                var rating = data[query.param_name];
                jQuery('#rating-externo').html(rating);
                if( Number(jQuery('#rating-local').text()) > Number(jQuery('#rating-externo').text())){
                    jQuery('#rating-externo').removeClass("rating-win");
                    jQuery('#rating-local').addClass("rating-win");
                }else if(Number(jQuery('#rating-local').text()) < Number(jQuery('#rating-externo').text())) {
                    jQuery('#rating-local').removeClass("rating-win");
                    jQuery('#rating-externo').addClass("rating-win");
                }
            }else {
                jQuery('#rating-externo').html('No existe');
                jQuery('#rating-externo').addClass("rating-err");
            }
        }).fail(function (data) {
            jQuery('#rating-local').addClass("rating-win");
            jQuery('#rating-externo').html("Error de conexi&oacute;n");
            jQuery('#rating-externo').addClass("rating-err");
            console.log('Error: URL not reachable');
        });
    }

    //https://www.youtube.com/watch?v=7ChTwUnZerQ
    //https://nakupanda.github.io/bootstrap3-dialog/
    jQuery(".buscadormenu #search-term-button").click(function () {
        var search_term = jQuery("#search-term-input").val();
        console.log(search_term);
        buscar_peliculas(search_term);
    });
    /* Event handling */
    /*$('#info-grupos-btn').click(function(){
        $('#modal-info-grupos').modal('show');
        completarApisURL();
    });*/

});