<?php
/**
 *	Elgg-console plugin
 *	@package elgg-console
 *	@author Emmanuel Salomon @ManUtopiK
 *	@license GNU Affero General Public License, version 3 or late
 *	@link https://github.com/ManUtopiK/elgg-console
 *
 *	Elgg-console start file
 **/

elgg_register_event_handler('ready', 'system', 'console_init');

/**
 * Initialize elgg-console plugin.
 */
function console_init() {

	if (elgg_is_admin_logged_in()) {
		$root = dirname(__FILE__);
		
		// action
		elgg_register_action('console', "$root/actions/console.php");
		
		// Extend view
		elgg_extend_view('css/elgg', 'console/css');
		elgg_extend_view('js/elgg', 'console/js');
		
		elgg_register_ajax_view('console/console');
		elgg_register_ajax_view('console/execute');
	}

}