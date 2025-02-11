<?php
	function wcd_voting_request() {
    
	// The $_REQUEST contains all the data sent via ajax
	if ( isset($_REQUEST) ) {
		
		// Check to see if nonce is valid for security
		if ( !wp_verify_nonce( $_REQUEST['nonce'], "wcd_voting_nonce")) {
		  exit("No naughty business please");
	   	}  
		
		// save the variables passed from ajax
		$post_id = $_REQUEST['post_id'];
		$user_ip = $_REQUEST['user_ip'];
	
		// Get all the current votes
		$vote_count = get_post_meta($_REQUEST["post_id"], "_wcd_votes", true);
		$vote_count = ($vote_count == '') ? 0 : $vote_count;
		// old vote + 1
		$new_vote_count = $vote_count + 1;
	
	
		if( get_post_meta($_REQUEST['post_id'], "_wcd_user_ip", true) === $user_ip) { 
			$result['type'] = "no-vote";
			$result['vote_count'] = "You have already voted";
			$result = json_encode($result);
			echo $result;
			exit();						
		} 
						
		$vote 		= update_post_meta($_REQUEST["post_id"], "_wcd_votes", $new_vote_count);
		$user_ip 	= update_post_meta($_REQUEST["post_id"], "_wcd_user_ip", $user_ip);
	
	   if($vote === false) {
		  $result['type'] = "error";
		  $result['vote_count'] = $vote_count;
	   } else {
		  $result['type'] = "success";
		  $result['vote_count'] = $new_vote_count;
	   }
	
	   if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		  $result = json_encode($result);
		  echo $result;
	   } else {
		  header("Location: ".$_SERVER["HTTP_REFERER"]);
	}

	   
    }
	
    die();
}
add_action( 'wp_ajax_wcd_voting_request', 'wcd_voting_request' );
// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action( 'wp_ajax_nopriv_wcd_voting_request', 'wcd_voting_request' );

?>