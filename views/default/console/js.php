
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
					success: function(response) {
						$('body').append(response);
						$('#elgg-console').draggable({ handle: '#elgg-console-code' });
						$('#elgg-console .elgg-head a').click(function() {
							$('#elgg-console').remove();
							$('*').unbind('mouseover');
						});
						$( "#elgg-console-response" ).resizable({
							handles: { 's' : '#handle' },
						});
						
						$('#elgg-console .elgg-button-submit').click(function() {
							elgg.post(elgg.config.wwwroot + 'ajax/view/console/execute', {
								data: {
									code: $('.elgg-form-console textarea[name="code"]').val(),
									page_owner: elgg.get_page_owner_guid(),
								},
								success: function(response) {
									$('#elgg-console-response .response').html('<br/>' + response);
								}
							});
							return false;
						});

						// entity scanner
						$('.elgg-form-console input[name="entity_scanner"]').click(function() {
							if ( $(this).attr("checked") ) {
								$('*').bind('mouseover', (function() {
									var ObjectOver = $(this).parents('*[id^="elgg-object-"]');
									if ( ObjectOver.length ) {
										var guidString = ObjectOver.attr('id');
										guidString = guidString.substr(guidString.indexOf('elgg-object-') + "elgg-object-".length);
										if ($.LastObjectOver != guidString) {
											$.LastObjectOver = guidString;
											elgg.post(elgg.config.wwwroot + 'ajax/view/console/execute', {
												data: {
													code: 'var_dump(get_entity('+guidString+'));',
													page_owner: elgg.get_page_owner_guid(),
												},
												success: function(response) {
													$('#elgg-console-response div').html(response);
												}
											});
										}
									}
								}));
							} else {
								$('*').unbind('mouseover');
							}
						});

					}
				});
			} 
		});
	});

}
elgg.register_hook_handler('init', 'system', elgg.console.init);

// End of js for elgg-console plugin
