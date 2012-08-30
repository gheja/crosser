<?php
	/* to keep things simple (for at least in the beginning) */
	$accounts = array(
		"twitter_kakaopor" => array(
			"type"            => "twitter",
			"readonly"        => true,
			"consumer_key"    => "YOUR_CONSUMER_KEY",
			"consumer_secret" => "YOUR_CONSUMER_SECRET",
			"user_token"      => "A_USER_TOKEN",
			"user_secret"     => "A_USER_SECRET",
		),
		
		"textdump" => array(
			"type"     => "textdump",
			"readonly" => false,
		),
		
		"wordpress_local" => array(
			"type"     => "wordpress_local",
			"readonly" => false,
		),
	);
	
	$routes = array(
		"first" => array(
			"from" => array(
				"account" => "twitter_kakaopor",
				"filter" => "",
			),
			
			"to" => array(
				array(
					"account" => "textdump",
					"settings" => array(),
				),
			),
		),
	);
?>