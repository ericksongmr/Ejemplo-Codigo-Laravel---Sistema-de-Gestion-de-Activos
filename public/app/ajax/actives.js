$(document).ready(function(){

	selectPages();

	$('#btnAdd').click(function(){
		$('#title').html('<h3 class="panel-title"><i class="glyphicon glyphicon-plus"></i> Agregar Activo</h3>');
		clearFields();
		$('#activesFormDiv').show();
		disabled(true);
	});

	$('#btnCancel').click(function(){
		$('#activesFormDiv').hide();
		clearFields();
		disabled(false);
	});

	$('#btnClose').click(function(){
		$('#detailsDiv').hide();
		disabled(false);
	});

	$('#btnSave').click(function(){

		var id = $('#id').val();
		//var data   = $('#frmActives').serialize();
		var data   = new FormData($('#frmActives')[0]);
		var page = $('.pagination li.active span').html();
		var nroPages = $('#nroPages').val();
		var active = $('#searchActive').val();
		var categoryAct = $('#searchCategoryAct').val();
		var location    = $('#searchLocation').val();

		if (!page) {page=1;}

		data.append('page', page);
		data.append('nroPages', nroPages);
		data.append('active', active);
		data.append('categoryAct', categoryAct);
		data.append('location', location);

		if (id == ''){

			var action = $('#frmActives').attr('action');

			$.ajax({
				url: action,
				type: 'POST',
				data: data, //+ '&page=' + page + '&nroPages=' + nroPages + '&active=' + active + '&categoryAct=' + categoryAct + '&location=' + location,
				contentType: false,
				processData: false,
				beforeSend: function(){

				},
				success: function(response){
					$('#listActives').html(response);
					selectPages();
					$('#activesFormDiv').hide();
					disabled(false);
					clearFields();
					message(1, 'Registro Guardado Exitosamente!');
				},
				error: function(response){
					var error = response.responseJSON;
					validate(error);
				}
			});

		}else{

			var action = 'actives/'+id+'';

			$.ajax({
				url: action,
				type: 'POST',
				data: data, //+ '&page=' + page + '&nroPages=' + nroPages + '&active=' + active + '&categoryAct=' + categoryAct + '&location=' + location,
				contentType: false,
				processData: false,
				beforeSend: function(){

				},
				success: function(response){
					$('#listActives').html(response);
					selectPages();
					$('#activesFormDiv').hide();
					disabled(false);
					clearFields();
					message(1, 'Registro Actualizado Exitosamente!');
				}
			});
		}

		
	});

	$('#nroPages').change(function(){
        var page = 1;
        var nroPages = $('#nroPages').val();
        var active = $('#searchActive').val();
        var categoryAct = $('#searchCategoryAct').val();
        var location    = $('#searchLocation').val();
        var action = 'actives';
        var report = 'false';
        if ($('#report').val()) {action = '/admin/actives'; report = 'true';}

        $.ajax({
            url: action,
            data: {page: page, nroPages: nroPages, active: active, categoryAct: categoryAct, location: location, report: report},
            type: 'GET',
            success: function(response){
                $('#listActives').html(response);
            }
        });

    });

    $('#searchActive').keyup(function(){
    	var page = 1;
        var nroPages = $('#nroPages').val();
        var active = $('#searchActive').val();
        var categoryAct = $('#searchCategoryAct').val();
        var location    = $('#searchLocation').val();
        var action = 'actives';
        var report = 'false';
        if ($('#report').val()) {action = '/admin/actives'; report = 'true';}

        $.ajax({
            url: action,
            data: {page: page, nroPages: nroPages, active: active, categoryAct: categoryAct, location: location, report: report},
            type: 'GET',
            success: function(response){
                $('#listActives').html(response);
                selectPages();
            }
        });

    });

    $('#searchCategoryAct').change(function(){
		var page        = 1;
		var nroPages    = $('#nroPages').val();
		var active      = $('#searchActive').val();
		var categoryAct = $('#searchCategoryAct').val();
		var location    = $('#searchLocation').val();
		var action      = 'actives';
		var report = 'false';
        if ($('#report').val()) {action = '/admin/actives'; report = 'true';}

        $.ajax({
            url: action,
            data: {page: page, nroPages: nroPages, active: active, categoryAct: categoryAct, location: location, report: report},
            type: 'GET',
            success: function(response){
                $('#listActives').html(response);
                selectPages();
            }
        });

    });

    $('#searchLocation').change(function(){
		var page        = 1;
		var nroPages    = $('#nroPages').val();
		var active      = $('#searchActive').val();
		var categoryAct = $('#searchCategoryAct').val();
		var location    = $('#searchLocation').val();
		var action      = 'actives';
		var report = 'false';
        if ($('#report').val()) {action = '/admin/actives'; report = 'true';}

        $.ajax({
            url: action,
            data: {page: page, nroPages: nroPages, active: active, categoryAct: categoryAct, location: location, report: report},
            type: 'GET',
            success: function(response){
                $('#listActives').html(response);
                selectPages();
            }
        });

    });

    $('#btnListAll').click(function(){
    	var page = 1;

    	$('select#nroPages').val(10);
        var nroPages = $('#nroPages').val();

        $('#searchActive').val('');
        var active = $('#searchActive').val();

        $('select#searchCategoryAct').val('');
        $('#searchCategoryAct').trigger('chosen:updated');
        var categoryAct = $('#searchCategoryAct').val();

        $('select#searchLocation').val('');
        $('#searchLocation').trigger('chosen:updated');
        var location = $('#searchLocation').val();

        var action = 'actives';
        var report = 'false';
        if ($('#report').val()) {action = '/admin/actives'; report = 'true';}

        $.ajax({
            url: action,
            data: {page: page, nroPages: nroPages, active: active, categoryAct: categoryAct, location: location, report: report},
            type: 'GET',
            success: function(response){
                $('#listActives').html(response);
                selectPages();
            }
        });

    });

    $('#btnPrint').click(function(){
    	$('#htmlInfo').val($("<div>").append( $("#exportInfo").eq(0).clone()).html());
        $('#formExport').attr('target', '_blank');
        $('#typeExport').val('');
        $('#formExport').submit();
    });

    $('#btnDownload').click(function(){
    	$('#htmlInfo').val($("<div>").append( $("#exportInfo").eq(0).clone()).html());
        $('#formExport').removeAttr('target');
        $('#typeExport').val('download');
        $('#formExport').submit();
    });

    $(".chosen-items").chosen({
			no_results_text: "No se encontraron resultados para:",
			width: "100%"
		});

    $(".chosen-locations").chosen({
			no_results_text: "No se encontraron resultados para:",
			width: "100%"
		});

    $(".chosen-slocations").chosen({
			no_results_text: "No se encontraron resultados para:",
			width: "100%"
		});

    $(".chosen-categories").chosen({
			no_results_text: "No se encontraron resultados para:",
			width: "100%"
		});

});

function updateActive(id)
{
	$('#title').html('<h3 class="panel-title"><i class="glyphicon glyphicon-refresh"></i> Actualizar Activo</h3>');
	$('#id').val(id);
	$('select#category_active_id').val($('#category'+id).val());
	$('select#item_id').val($('#item'+id).val());
	$('#item_id').trigger('chosen:updated');
	$('#code').val($('#code'+id).val());
	$('#name').val($('#name'+id).val());
	$('#features').val($('#features'+id).val());
	$('select#unit').val($('#unit'+id).val());
	$('#stock').val($('#stock'+id).val());
	$('select#location_id').val($('#location'+id).val());
	$('#location_id').trigger('chosen:updated');
	$('#note').val($('#note'+id).val());
	$('select#state').val($('#state'+id).val());

	$('#detailsDiv').hide();
	$('#activesFormDiv').show();
	disabled(true);
}

function deleteActive(id)
{
	notie.confirm({
		text: '<i class="glyphicon glyphicon-alert"><i/><span class="notieCss"> ¿Desea eliminar este registro?</span>',
		submitCallback: function () {
		  
		  var action = 'actives/'+id+'/destroy';
		  var page = $('.pagination li.active span').html();
		  var nroPages = $('#nroPages').val();
		  var active = $('#searchActive').val();
		  var categoryAct = $('#searchCategoryAct').val();
		  var location = $('#searchLocation').val();

		  if (!page) {page=1;}

		  $.ajax({
		  	url: action,
		  	type: 'GET',
		  	data: {page: page, nroPages: nroPages, active: active, categoryAct: categoryAct, location: location},
		  	success: function(response){
		  		$('#listActives').html(response);
		  		selectPages();
		  		message(1, 'Registro eliminado exitosamente!');
		  	}	
		  });

		}
	})
}

function details(id)
{
	$('#categoryActDetail').html($('#categoryDetail'+id).val());
	$('#itemActDetail').html($('#itemDetail'+id).val());
	$('#codeDetail').html($('#code'+id).val());
	$('#nameDetail').html($('#name'+id).val());
	$('#featuresDetail').html($('#features'+id).val());
	$('#unitDetail').html($('#unit'+id).val());
	$('#stockDetail').html($('#stock'+id).val());
	$('#locationDetail').html($('#locationDetail'+id).val());
	$('#noteDetail').html($('#note'+id).val());

	//$('#photoDetail').html($('#photo'+id).val());
	if ($('#photo'+id).val() != '') {
		$('#photoDetail').attr('href', '/storage/uploads/photos/' + $('#photo'+id).val());
		$('#photoImg').attr('src', '/storage/uploads/photos/' + $('#photo'+id).val());
	} else {
		$('#photoDetail').attr('href', '/storage/uploads/photos/photos-icon.png');
		$('#photoImg').attr('src', '/storage/uploads/photos/photos-icon.png');
	}

	$('#stateDetail').html($('#state'+id).val());

	$('#activesFormDiv').hide();
	$('#detailsDiv').show();
	disabled(true);
}

$(document).on('click','.pagination a', function(e){
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    var nroPages = $('#nroPages').val();
    var active = $('#searchActive').val();
    var categoryAct = $('#searchCategoryAct').val();
    var location = $('#searchLocation').val();
    var action = 'actives';
    var report = 'false';
    if ($('#report').val()) {action = '/admin/actives'; report = 'true';}

    $.ajax({
        url: action,
        data: {page: page, nroPages: nroPages, active: active, categoryAct: categoryAct, location: location, report: report},
        type: 'GET',
        success: function(response){
            $('#listActives').html(response);
        }
    });

});

function validate(error)
{
	if (!error.category_active_id){
		$('#divErrorCategoryAct').attr('class' ,'form-group');
		$('#errorCategoryAct').html('');
	}
	else{
		$('#divErrorCategoryAct').attr('class' ,'form-group has-error');
		$('#errorCategoryAct').html('<span class="help-block"><strong>'+error.category_active_id+'</strong></span>');
	}

	if (!error.item_id){
		$('#divErrorItem').attr('class' ,'form-group');
		$('#errorItem').html('');
	}
	else{
		$('#divErrorItem').attr('class' ,'form-group has-error');
		$('#errorItem').html('<span class="help-block"><strong>'+error.item_id+'</strong></span>');
	}

	if (!error.name){
		$('#divErrorName').attr('class' ,'form-group');
		$('#errorName').html('');
	}
	else{
		$('#divErrorName').attr('class' ,'form-group has-error');
		$('#errorName').html('<span class="help-block"><strong>'+error.name+'</strong></span>');
	}

	if (!error.unit){
		$('#divErrorUnit').attr('class' ,'form-group');
		$('#errorUnit').html('');
	}
	else{
		$('#divErrorUnit').attr('class' ,'form-group has-error');
		$('#errorUnit').html('<span class="help-block"><strong>'+error.unit+'</strong></span>');
	}

	if (!error.stock){
		$('#divErrorStock').attr('class' ,'form-group');
		$('#errorStock').html('');
	}
	else{
		$('#divErrorStock').attr('class' ,'form-group has-error');
		$('#errorStock').html('<span class="help-block"><strong>'+error.stock+'</strong></span>');
	}

	if (!error.location_id){
		$('#divErrorLocation').attr('class' ,'form-group');
		$('#errorLocation').html('');
	}
	else{
		$('#divErrorLocation').attr('class' ,'form-group has-error');
		$('#errorLocation').html('<span class="help-block"><strong>'+error.location_id+'</strong></span>');
	}

	if (!error.state){
		$('#divErrorState').attr('class' ,'form-group');
		$('#errorState').html('');
	}
	else{
		$('#divErrorState').attr('class' ,'form-group has-error');
		$('#errorState').html('<span class="help-block"><strong>'+error.state+'</strong></span>');
	}
}

function message(type, content)
{
	notie.setOptions({
        alertTime: 2
      })

	notie.alert({ type: type, text: '<i class="glyphicon glyphicon-ok"><i/><span class="notieCss"> '+content+'</span>', time: 5 })
}

function clearFields()
{
	$('#id').val('');
	$('select#category_active_id').val('');
	$('select#item_id').val('');
	$('#item_id').trigger('chosen:updated');
	$('#code').val('');
	$('#name').val('');
	$('#features').val('');
	$('select#unit').val('');
	$('#stock').val('');
	$('select#location_id').val('');
	$('#location_id').trigger('chosen:updated');
	$('#note').val('');
	$('#photo').val('');
	$('select#state').val('');

	$('#divErrorCategoryAct').attr('class' ,'form-group');
	$('#errorCategoryAct').html('');

	$('#divErrorItem').attr('class' ,'form-group');
	$('#errorItem').html('');

	$('#divErrorName').attr('class' ,'form-group');
	$('#errorName').html('');

	$('#divErrorUnit').attr('class' ,'form-group');
	$('#errorUnit').html('');

	$('#divErrorStock').attr('class' ,'form-group');
	$('#errorStock').html('');

	$('#divErrorLocation').attr('class' ,'form-group');
	$('#errorLocation').html('');

	$('#divErrorState').attr('class' ,'form-group');
	$('#errorState').html('');
}

function selectPages()
{
	if ($('#total').html() > 10) 
		{$('#nroPages').removeAttr('disabled');} 
	else 
		{$('#nroPages').attr('disabled', 'disabled');$('select#nroPages').val(10);}
}

function disabled(val)
{
	if (val == false){
		$('#btnAdd').removeAttr('disabled');
		$('#searchCategoryAct').removeAttr('disabled');
		$('#searchLocation').removeAttr('disabled');
		$('#searchActive').removeAttr('disabled');
		$('#btnListAll').removeAttr('disabled');
	}
	else{
		$('#btnAdd').attr('disabled', 'disabled');
		$('#searchCategoryAct').attr('disabled', 'disabled');
		$('#searchLocation').attr('disabled', 'disabled');
		$('#searchActive').attr('disabled', 'disabled');
		$('#btnListAll').attr('disabled', 'disabled');
	}
}