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
	$field = add_field_text( 'test' );
	$field->admin_label( 'Проверка поля в таксономии и даже длинного названия' )->admin_description( 'Првоерка дополниетльного текста для поля ввода' );
	$field->location()->post_types( 'page' )->position( 2 );

	$field = add_field_text( 'test2' );
	$field->admin_label( 'Проверка второго поля' );
	$field->location()->post_types( 'page' )->position( 2 );


	add_action( 'wp', function(){
		hiweb\dump( get_field('test2') );
	} );