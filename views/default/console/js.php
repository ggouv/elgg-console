
/**
 *	Elgg-console plugin
 *	@package elgg-console
 *	@author Emmanuel Salomon @ManUtopiK
 *	@license GNU Affero General Public License, version 3 or late
 *	@link https://github.com/ManUtopiK/elgg-console
 *
 *	Elgg-console js file
 **/

/**
 * Elgg-workflow initialization
 *
 * @return void
 */
elgg.provide('elgg.console');

elgg.console.init = function() {
	$(document).ready(function() {
		$(window).keypress(function(e){
			if(e.which == 67 && e.ctrlKey && e.shiftKey && !$('#elgg-console').length) {
				elgg.get(elgg.config.wwwroot + 'ajax/view/console/console', {
					dataType: "html",
					data: {
						code: $('.elgg-form-console').attr('id'),
					},
					success: function(response) {
						$('body').append(response);
						$('#elgg-console').draggable({ handle: '#elgg-console-code' });
						$('#elgg-console .elgg-head a').click(function() {
							$('#elgg-console').remove();
						});
						$( "#elgg-console-response" ).resizable({
							handles: { 's' : '#handle' },
						});
						
						$('#elgg-console .elgg-button-submit').click(function() {
							elgg.post(elgg.config.wwwroot + 'ajax/view/console/execute', {
								data: $(this).closest('form').serialize(),
								success: function(response) {
									$('#elgg-console-response .response').html('<br/>' + response);
								}
							});
							return false;
						});
					}
				});
			} 
		});

	});

}
elgg.register_hook_handler('init', 'system', elgg.console.init);

// End of js for elgg-console plugin
