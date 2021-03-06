jQuery(function($) {
	$gp.showhide('#upper-filters-toolbar a.sort', '#upper-filters-toolbar div.sort', {
		show_text: 'Sort &darr;',
		hide_text: 'Sort &uarr;', 
		focus: '#sort\\[by\\]'
	});
	$gp.showhide('#upper-filters-toolbar a.filter', '#upper-filters-toolbar div.filters', {
		show_text: 'Filter &darr;',
		hide_text: 'Filter &uarr;',
		focus: '#filters\\[term\\]'
	});
	
	var rows_checked = 0;

	$('form.filters-toolbar.bulk-actions').submit(function(e) {
		var	row_ids = $('input:checked', $('table#translations th.checkbox')).map(function() {
			return $(this).parents('tr.preview').attr('row');
		}).get().join(',');
		$('input[name="bulk[row-ids]"]', $(this)).val(row_ids);
	});
	
	$('a#export').click(function() {
		var format = $('#export-format').val();
		var what_to_export = $('#what-to-export').val();
		var url = '';
		if (what_to_export == 'filtered') {
			var separator = ( $(this).attr('filters').indexOf('?') == -1 )? '?' : '&';
			url = $(this).attr('filters') + separator + 'format='+format;
		} else {
			url = $(this).attr('href') + '?format='+format;
		}
		window.location = url;
		return false;
	});

	var lastClicked = false;
	// Check all checkboxes from WP common.js, synced with [20400]
	$('tbody').children().children('.checkbox').find(':checkbox').click( function(e) {
		if ( 'undefined' == e.shiftKey ) { return true; }
		if ( e.shiftKey ) {
			if ( !lastClicked ) { return true; }
			checks = $( lastClicked ).closest( 'table' ).find( ':checkbox' );
			first = checks.index( lastClicked );
			last = checks.index( this );
			checked = $(this).prop('checked');
			if ( 0 < first && 0 < last && first != last ) {
				checks.slice( first, last ).prop( 'checked', function(){
					if ( $(this).closest('tr').is(':visible') )
						return checked;

					return false;
				});
			}
		}
		lastClicked = this;
		return true;
	});

	$('thead, tfoot').find('.checkbox :checkbox').click( function(e) {
		var c = $(this).prop('checked'),
			kbtoggle = 'undefined' == typeof toggleWithKeyboard ? false : toggleWithKeyboard,
			toggle = e.shiftKey || kbtoggle;

		$(this).closest( 'table' ).children( 'tbody' ).filter(':visible')
		.children().children('.checkbox').find(':checkbox')
		.prop('checked', function() {
			if ( $(this).closest('tr').is(':hidden') )
				return false;
			if ( toggle )
				return $(this).prop( 'checked' );
			else if (c)
				return true;
			return false;
		});

		$(this).closest('table').children('thead,  tfoot').filter(':visible')
		.children().children('.checkbox').find(':checkbox')
		.prop('checked', function() {
			if ( toggle )
				return false;
			else if (c)
				return true;
			return false;
		});
	});
});
