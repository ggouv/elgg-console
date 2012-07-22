<?php
/**
 *	Elgg-console plugin
 *	@package elgg-console
 *	@author Emmanuel Salomon @ManUtopiK
 *	@license GNU Affero General Public License, version 3 or late
 *	@link https://github.com/ManUtopiK/elgg-console
 *
 *	Elgg-console view file
 **/
?>

<div id="elgg-console">

	<div id='elgg-console-code'>
		<div class='elgg-head'>
			<h3><?php echo elgg_echo('Console'); ?></h3>
			<?php echo elgg_view('output/url', array('text' => elgg_view_icon('delete-alt'))); ?>
		</div>
		<?php echo elgg_view_form('console'); ?>
	</div>
	
	<div id='elgg-console-response'>
		<div class='response phm'>
			<span style='color:gray;'><br/>Nothing.</span>
		</div>
		<div id='handle' class='ui-resizable-handle ui-resizable-s'>&bull;</div>
	</div>

</div>
