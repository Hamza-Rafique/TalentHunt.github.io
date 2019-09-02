<?php
session_start();

if(!isset($_SESSION['logged_in'])){
	//if the user is not yet logged in
	// redirect the user to login.php page
	echo json_encode([
		'status'	=> 'auth_required',
		'url'       => 'login.php',
	]);
}
else{
	// user is logged in


	$html = '';

	if(!empty($_POST['id']) AND !empty($_POST['action'])){
		require_once 'db.php';
		$status = get_qustion_status($_POST);
	
		if( $status['liked'] AND $_POST['action'] == 'likes'){
		    // if user already liked this question and again trying to like it once more
		    // -1 or decrement like
			$html = update_action($_POST, 'decrement', NULL);
			
		}
		else if( $status['liked'] AND $_POST['action'] == 'dislikes'){
		    // if user already liked this question and trying to dislike it now
		    // decrement likes
		    // increment dislikes
			$html = update_action($_POST, 'decrement', 'increment');
			
		}

		else if( $status['disliked'] AND $_POST['action'] == 'dislikes'){
		    // if user already disliked this question and again trying to dislike it once more
		    // -1 or decrement dislike
			$html = update_action($_POST, NULL, 'decrement');
			
		}
		else if( $status['disliked'] AND $_POST['action'] == 'likes'){
		    // if user already disliked this question and trying to like it now
		    // increment likes
		    // decrement dislikes
			$html = update_action($_POST, 'increment', 'decrement');
			
		}
		else if(!$status['liked'] AND !$status['disliked']){
			$html = update_action($_POST);
		}



		if(!empty($html)){
			echo json_encode([
				'status'	=> 'success',
				'html'      => $html,

			]);
		}

	}

	
		
}