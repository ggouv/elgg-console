<?php
/**
 *	Elgg-console plugin
 *	@package elgg-console
 *	@author Emmanuel Salomon @ManUtopiK
 *	@license GNU Affero General Public License, version 3 or late
 *	@link https://github.com/ManUtopiK/elgg-console
 *
 *	Elgg-console form file
 **/

echo elgg_view('input/plaintext', array(
	'name' => 'code',
	'value' => '',
	'class' => 'mbs',
));

echo elgg_view('input/submit', array(
	'value' => elgg_echo("submit"),
	'class' => 'elgg-button-submit mrm',
));

echo '<span class="float">' . elgg_echo("entity_scanner") . elgg_view('input/checkbox', array(
	'name' => 'entity_scanner',
)) . '</span>';

echo elgg_view('output/url', array(
				'text' => elgg_view_icon('download'),
				'class' => 'toggle-button',
				'rel' => 'toggle',
				'href' => '#elgg-console-response'
			));

