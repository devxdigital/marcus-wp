jQuery(function($){

	$("select.nsof-input:not([data-remote])").select2();


	$("select.nsof-input[data-remote]").select2({
		ajax: {
			// url: 'https://api.github.com/search/repositories',
			url: ajaxurl,
			type: 'POST',
			dataType: 'json',
			delay: 250,
			cache: true,
			minimumInputLength: 1,
			data: function (params) {
				return {
					action: 'nsof_select2_search',
					q: params.term,
					page: params.page,
					remote: $.parseJSON( $(this).attr('data-remote') )
				};
			},
			processResults: function (data, params) {
				// parse the results into the format expected by Select2
				// since we are using custom formatting functions we do not need to
				// alter the remote JSON data, except to indicate that infinite
				// scrolling can be used
				params.page = params.page || 1;

				return {
					results: data.items,
					pagination: {
						more: (params.page * 30) < data.total_count
					}
				};
			},
		},
	 	escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
	 	templateResult: function(res){
	 		if (res.loading) return res.text;

	 		var markup = res.item_name;

  			return markup;
	 	},
	 	templateSelection: function(res) {
  			return res.item_name || res.text;
		}

	});
});