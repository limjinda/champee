/* global lazyload */
/* exported */

'use strict';

jQuery(document).ready(function(){
	
	jQuery('.sidebar-wrapper').stickit({
		top: 40,
		screenMinWidth: 992
	});

	if ( jQuery('.entry-content iframe, .entry-content embed').length > 0 ) {
		jQuery('.entry-content iframe, .entry-content embed').each(function(i, el){
			jQuery(el).wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
		});
	}

	if ( jQuery('.entry-content table').length > 0 ) {
		jQuery('.entry-content table').each(function(i, el){
			jQuery(el).addClass('table table-striped');
		});
	}

	lazyload();

})
