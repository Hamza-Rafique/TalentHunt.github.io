$(function(){
	
	$('.questions').on('click', function( e ){

		e.preventDefault(); // preventing default action of anchor tag

		var icon = e.target;
		var id   = $(icon).parent('a').attr('data-id');; 

		if( $(icon).hasClass('fa-thumbs-up') ){
			//true if thumbs up icon gets clicked
			updateAction(id, 'likes',  $(icon));
		}
		else if( $(icon).hasClass('fa-thumbs-down') ){
			// true if thumbs down icon gets clicked
			updateAction(id, 'dislikes', $(icon));
		}

		console.log(id);
	});
});

function updateAction(id, action, element){

	var $parent = element.parents('ul.questions');

	$.ajax({
		url: 'update.php', 
		method: 'POST',
		data: {id: id, action: action},
		success: function( response ){

			response = $.parseJSON( response );

			if( response.status === 'auth_required'){
				//sending user to the login.php page
				window.location = response.url; 
			}

			else if( response.status == 'success' ){
				$parent.html( response.html );
			}

			console.log( response );
		}   

	});
}