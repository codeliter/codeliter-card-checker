$('form').ready(function() {
	$('form').on('submit', function(event) {
		var err;

		$('input').each(function() {
	        if(!$(this).val()) {
	            $(this).parent('div').addClass('has-error');
	            err= true;
	        }
	        else {
	        	 $(this).parent('div').removeClass('has-error');
	        }

	        var maxlength= $(this).attr('maxlength');

	        if (maxlength) {
				if ($(this).val().length != maxlength) {
					$(this).parent('div').addClass('has-error');
		            err= true;
				}
		        else {
		        	 $(this).parent('div').removeClass('has-error');
		        }
		    }


    	});

    	if (err == true) {
    		event.preventDefault();
    	}
	});

	$('input').on('keypress',function(event) {
		/* Act on the event */
		var maxlength= $(this).attr('maxlength');

		if ($(this).val().length == maxlength) {
			event.preventDefault();
		}

	});
});