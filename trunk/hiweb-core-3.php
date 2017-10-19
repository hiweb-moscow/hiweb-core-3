<?php
	/*
	Plugin Name: hiWeb Core 3
	Plugin URI: http://plugins.hiweb.moscow/core
	Description: Special framework plugin for WordPress min 4.8
	Version: 3.0.0.0
	Author: Den Media
	Author URI: http://hiweb.moscow
	*/

	if( version_compare( PHP_VERSION, '5.4.0' ) >= 0 ){
		///
		require_once 'include/spl_autoload_register.php';
		require_once 'include/define.php';
		require_once 'include/init.php';
		//		add_action( 'plugins_loaded', function(){
		//			$mo_file_path = __DIR__ . '/languages/hw-core-2-' . get_locale() . '.mo';
		//			load_textdomain( 'hw-core-3', $mo_file_path );
		//		} );
		///
		//		require_once 'include/core.php';
		//		require_once 'include/short_functions.php';
		//		require_once 'include/ajax.php';
		///
		//		if( file_exists( hiweb()->dir . '/test.php' ) && is_readable( hiweb()->dir . '/test.php' ) ){
		//			include_once hiweb()->dir . '/test.php';
		//		}
	} else {
		//		function hw_core_php_version_error(){
		//			include 'views/core-error-php-version.php';
		//		}
		//
		//		add_action( 'admin_notices', 'hw_core_php_version_error' );
	}

	//TODO-
	$field = add_field_repeat( 'test' );
	$field->add_col_field( add_field_text( 'a' )->admin_label( 'Поле А' ) );
	$field->add_col_field( add_field_text( 'b' )->admin_label( 'Поле Б' )->admin_description( 'Это второе поле' ) );
	$field->location()->post_types( 'page' );

	$field = add_field_text( 'test2' )->admin_label( 'Проврека поля с аттрибутами' );
	$field->location()->post_types( 'page' )->position( 2 );

	add_action( 'wp', function(){
		$field = \hiweb\fields::get( 'test' );
		///
		while( $field->context()->have_rows()){
			$row = $field->context()->the_row();
			hiweb\dump( $row );
		}
	} );