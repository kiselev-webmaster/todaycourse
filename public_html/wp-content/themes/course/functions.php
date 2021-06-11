<?php
	add_action( 'wp_enqueue_scripts', 'course_scripts' );
	function course_scripts() {
		wp_enqueue_style( 'style-course', get_stylesheet_uri() );
	}