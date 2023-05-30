function alert_danger(data){
	var alert ='<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon-exclamation"></i> '+data+'</div>';
	$('body').append(alert);
	$('.alert').fadeIn('slow').delay(5000).fadeOut('slow');
}

function alert_warning(data){
	var alert ='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon-question"></i> '+data+'</div>';
	$('body').append(alert);
	$('.alert').fadeIn('slow').delay(5000).fadeOut('slow');
}

function alert_info(data){
	var alert ='<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon-info"></i> '+data+'</div>';
	$('body').append(alert);
	$('.alert').fadeIn('slow').delay(5000).fadeOut('slow');
}

function alert_success(data){
	var alert ='<div class="alert  alert-success dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon-check"></i> '+data+'</div>';
	$('body').append(alert);
	$('.alert').fadeIn('slow').delay(5000).fadeOut('slow');
}




