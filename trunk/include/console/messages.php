<?php

	namespace hiweb\console;


	use hiweb\context;


	class messages{


		/** @var array|message[] */
		static $messages = [];


		/**
		 * @param string $content
		 * @param string $type
		 * @param string $groupTitle
		 * @param array  $additionData
		 * @return message
		 */
		static function make( $content = '', $type = 'info', $groupTitle = '', $additionData = [] ){
			$message = new message( $content, $type, $additionData );
			$message->set_groupTitle( $groupTitle );
			$global_id = spl_object_hash( $message );
			self::$messages[ $groupTitle ][ $global_id ] = $message;
			return $message;
		}


		/**
		 * Print messages script
		 * @version 1.3
		 */
		static function the(){
			if( is_array( self::$messages ) && !context::is_ajax() && ( context::is_frontend_page() || context::is_login_page() || context::is_admin_page() ) ){
				foreach( self::$messages as $groupTitle => $messages ){
					if( $groupTitle != '' ){
						?>
					<script>console.groupCollapsed("%c<?=addslashes( $groupTitle)?>","color: #888;font-size: 1.2em;");</script><?php
					}
					///
					foreach( $messages as $message ){
						if( $message instanceof message ) $message->the();
					}
					///
					if( $groupTitle != '' ){
						?>
						<script>console.groupEnd();</script><?php
					}
				}
			}
		}
	}
