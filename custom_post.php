<?php 

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1); 

require('wp-blog-header.php');
?>
<?php

//Get and parse json

$response = wp_remote_get( 'http://nielsen-careers-697171287.us-east-1.elb.amazonaws.com' );
$body = wp_remote_retrieve_body( $response );
$json_output = json_decode($body, true);


$author_id = 1;

//Create Custom Post - WP

foreach ($json_output as $key) {
		$content = $key['region'];
		$title = str_replace(' & ', ' &amp; ', $key['city']);
		$short_title = substr($title, 0, 30);
		$post = wp_insert_post(
			array(		
				'post_author'		=>	$author_id,
				'post_name'		=>	$short_title,
				'post_title'		=>	$title,
				'post_content' => $content,
				'post_status'		=>	'pending',
				'post_type'		=>	'post'
			)
		);
}
?>