
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
							$('*').unbind('mouseover').removeClass('entity_scanner_over');
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
							$.LastEntityOver = '';
							if ( $(this).attr("checked") ) {
								$('*').bind('mouseover', (function() {
									var EntityOver = $(this).parents('*[id^="elgg-object-"], *[id^="elgg-group-"], *[id^="elgg-user-"], *[id^="item-river-"], *[id^="item-annotation-"]');
									
									if ( EntityOver.length ) {
										var getEntityCode = null,
											EntityID = EntityOver.attr('id');
										
										guidString = EntityID.match(/\d+$/)[0];
										
										if (/(object|group|user)/.test(EntityID)) getEntityCode = 'var_dump(get_entity('+guidString+'));';
										if (EntityID.indexOf('river') >= 0) getEntityCode = 'var_dump(elgg_get_river(array("ids"=>'+guidString+')));';
										if (EntityID.indexOf('annotation') >= 0) getEntityCode = 'var_dump(elgg_get_annotation_from_id('+guidString+'));';
										
										if ($.LastEntityOver != guidString) {
											$.LastEntityOver = guidString;
											$('*').removeClass('entity_scanner_over');
											elgg.post(elgg.config.wwwroot + 'ajax/view/console/execute', {
												data: {
													code: getEntityCode,
													page_owner: elgg.get_page_owner_guid(),
												},
												success: function(response) {
													$('#elgg-console-response .response').html('<br/>' + response);
													EntityOver.addClass('entity_scanner_over');
												}
											});
										}
									}
								}));
							} else {
								$('*').unbind('mouseover').removeClass('entity_scanner_over');
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
