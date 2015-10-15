$('.linkAjax').click(function(event){
	var link = $(this).attr("href");
	if(link != "#"){
	    $("#content").load(link, function( response, status, xhr ) {
			if ( status == "error" ) {
				var msg = "Erro: ";
				$("#content").html( msg + xhr.status + " " + xhr.statusText );
			}
			else{
				if (!$(".navbar-toggle").hasClass("collapsed")) {
			        $('.navbar-toggle').click() //bootstrap 3.x by Richard
			    }
				$(".dropdown.open").removeClass("open");
			}
		});
	}
	else{
		console.log("Link #");
	}
	return false;
  });
