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
        	alert("Error");
        })
        ;
    }

    jQuery("#search-term-button").click(function (e) {
       jQuery.ajax({
            type:'GET', 
            url:'buscapeliculas.php',
            data: {id: jQuery('#id').val()}
        }).done(function(data){
            //console.log(data);
            peliculas = jQuery('#peliculas');
            peliculas.empty();
            jQuery(data).each(function() {
                var imagen_id = "imagen-" + this.identificador;
                var pelicula_html = '<div class="col-sm-3 pelicula-item">' + '<a title="' + this.nombre + '" href="#""  data-pelicula-id="' + this.identificador + '">' +
                '<img class="panel" id="' + imagen_id + '" alt="' + this.nombre + '"/><p style="text-align:center;">' + this.nombre + ' [' + this.ponderacion + ' puntos] </p></a></div>';
                buscar_poster(this.identificador, imagen_id);
                console.log(pelicula_html);
                peliculas.append(pelicula_html);
            })
        }).fail(function(request, status, error){
            alert("error");
            alert(request.responseText);
        });
        e.preventDefault();
    });

	jQuery("#searchform").submit(function(e){
		jQuery.ajax({
			type:'GET', 
			url:'buscapeliculas.php',
			data: {id: jQuery('#id').val()}
		}).done(function(data){
			//console.log(data);
			peliculas = jQuery('#peliculas');
			peliculas.empty();
			jQuery(data).each(function() {
				var imagen_id = "imagen-" + this.identificador;
				var pelicula_html = '<div class="col-sm-3 pelicula-item">' + '<a title="' + this.nombre + '" href="#""  data-pelicula-id="' + this.identificador + '">' +
				'<img class="panel" id="' + imagen_id + '" alt="' + this.nombre + '"/><p style="text-align:center;">' + this.nombre + ' [' + this.ponderacion + ' puntos] </p></a></div>';
				buscar_poster(this.identificador, imagen_id);
				console.log(pelicula_html);
				peliculas.append(pelicula_html);
			})
			jQuery('.pelicula-item a').bind('click', function() {
				comparar_pelicula()
			})
		}).fail(function(request, status, error){
			alert("error");
			alert(request.responseText);
		});
		e.preventDefault();
	});




});



			