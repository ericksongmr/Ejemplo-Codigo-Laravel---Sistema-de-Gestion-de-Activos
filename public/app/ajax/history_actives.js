$(document).ready(function(){

	selectPages();

	$('#btnAdd').click(function(){
		$('#title').html('<h3 class="panel-title"><i class="glyphicon glyphicon-plus"></i> Agregar Historial</h3>');
		clearFields();
		$('#historyActivesFormDiv').show();
		disabled(true);
	});

	$('#btnCancel').click(function(){
		$('#historyActivesFormDiv').hide();
		clearFields();
		disabled(false);
	});

	$('#btnClose').click(function(){
		$('#detailsDiv').hide();
		disabled(false);
	});

	$('#btnSave').click(function(){

		var id = $('#id').val();
		var data   = $('#frmHistoryActives').serialize();
		var page = $('.pagination li.active span').html();
		var nroPages = $('#nroPages').val();
		var dateFilter = $('#searchDate').val();
		var typeFilter = $('#searchType').val();

		if (!page) {page=1;}

		if (id == ''){

			var action = $('#frmHistoryActives').attr('action');

			$.ajax({
				url: action,
				type: 'POST',
				data: data + '&page=' + page + '&nroPages=' + nroPages + '&dateFilter=' + dateFilter + '&typeFilter=' + typeFilter,
				success: function(response){
					if (response == 'error'){
						message(2, 'La Cantidad Ingresada supera la del Stock del Activo!');
					}else
					{
						$('#listHistoryActives').html(response);
						selectPages();
						$('#historyActivesFormDiv').hide();
						disabled(false);
						clearFields();
						message(1, 'Registro Guardado Exitosamente!');
					}
					
				},
				error: function(response){
					var error = response.responseJSON;
					validate(error);
				}
			});

		}else{

			var action = 'historyActives/'+id+'';

			$.ajax({
				url: action,
				type: 'PUT',
				data: data + '&page=' + page + '&nroPages=' + nroPages + '&dateFilter=' + dateFilter + '&typeFilter=' + typeFilter,
				success: function(response){
					if (response == 'error'){
						message(2, 'La Cantidad Ingresada supera la del Stock del Activo!');
					}else
					{
						$('#listHistoryActives').html(response);
						selectPages();
						$('#historyActivesFormDiv').hide();
						disabled(false);
						clearFields();
						message(1, 'Registro Actualizado Exitosamente!');
					}
				}
			});
		}

		
	});

	$('#nroPages').change(function(){
        var page = 1;
        var nroPages = $('#nroPages').val();
        var dateFilter = $('#searchDate').val();
        var typeFilter = $('#searchType').val();
        var action = 'historyActives';
        var report = 'false';
        if ($('#report').val()) {action = '/admin/historyActives'; report = 'true';}

        $.ajax({
            url: action,
            data: {page: page, nroPages: nroPages, dateFilter: dateFilter, typeFilter: typeFilter, report: report},
            type: 'GET',
            success: function(response){
                $('#listHistoryActives').html(response);
            }
        });

    });

    $('#searchDate').change(function(){
    	var page = 1;
        var nroPages = $('#nroPages').val();
        var dateFilter = $('#searchDate').val();
        var typeFilter = $('#searchType').val();
        var action = 'historyActives';
        var report = 'false';
        if ($('#report').val()) {action = '/admin/historyActives'; report = 'true';}

        $.ajax({
            url: action,
            data: {page: page, nroPages: nroPages, dateFilter: dateFilter, typeFilter: typeFilter, report: report},
            type: 'GET',
            success: function(response){
                $('#listHistoryActives').html(response);
                selectPages();
            }
        });

    });

    $('#searchType').change(function(){
		var page        = 1;
		var nroPages    = $('#nroPages').val();
		var dateFilter      = $('#searchDate').val();
		var typeFilter = $('#searchType').val();
		var action      = 'historyActives';
		var report = 'false';
        if ($('#report').val()) {action = '/admin/historyActives'; report = 'true';}

        $.ajax({
            url: action,
            data: {page: page, nroPages: nroPages, dateFilter: dateFilter, typeFilter: typeFilter, report: report},
            type: 'GET',
            success: function(response){
                $('#listHistoryActives').html(response);
                selectPages();
            }
        });

    });

    $('#btnListAll').click(function(){
    	var page = 1;

    	$('select#nroPages').val(5);
        var nroPages = $('#nroPages').val();

        $('#searchDate').val('');
        var dateFilter = $('#searchDate').val();

        $('select#searchType').val('');
        var typeFilter = $('#searchType').val();

        var action = 'historyActives';
        var report = 'false';
        if ($('#report').val()) {action = '/admin/historyActives'; report = 'true';}

        $.ajax({
            url: action,
            data: {page: page, nroPages: nroPages, dateFilter: dateFilter, typeFilter: typeFilter, report: report},
            type: 'GET',
            success: function(response){
                $('#listHistoryActives').html(response);
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

 	$(".chosen-actives").chosen({
			no_results_text: "No se encontraron resultados para:",
			width: "100%"
		});

});

function updateHistoryActive(id)
{
	$('#title').html('<h3 class="panel-title"><i class="glyphicon glyphicon-refresh"></i> Actualizar Historial</h3>');
	$('#id').val(id);
	$('select#type').val($('#type'+id).val());
	$('select#active_id').val($('#active'+id).val());
	$('#active_id').trigger('chosen:updated');
	$('#amount').val($('#amount'+id).val());
	$('#responsible').val($('#responsible'+id).val());
	$('#date').val($('#date'+id).val());
	$('#note').val($('#note'+id).val());

	$('#detailsDiv').hide();
	$('#historyActivesFormDiv').show();
	disabled(true);
}

function deleteHistoryActive(id)
{
	notie.confirm({
		text: '<i class="glyphicon glyphicon-alert"><i/><span class="notieCss"> ¿Desea eliminar este registro?</span>',
		submitCallback: function () {
		  
		  var action = 'historyActives/'+id+'/destroy';
		  var page = $('.pagination li.active span').html();
		  var nroPages = $('#nroPages').val();
		  var dateFilter = $('#searchDate').val();
		  var typeFilter = $('#searchType').val();

		  if (!page) {page=1;}

		  $.ajax({
		  	url: action,
		  	type: 'GET',
		  	data: {page: page, nroPages: nroPages, dateFilter: dateFilter, typeFilter: typeFilter},
		  	success: function(response){
		  		$('#listHistoryActives').html(response);
		  		selectPages();
		  		message(1, 'Registro eliminado exitosamente!');
		  	}	
		  });

		}
	})
}

function details(id)
{
	$('#typeDetail').html($('#type'+id).val());
	$('#activeDetail').html($('#activeDetail'+id).val());
	$('#amountDetail').html($('#amountDetail'+id).val());
	$('#responsibleDetail').html($('#responsible'+id).val());
	$('#dateDetail').html($('#date'+id).val());
	$('#noteDetail').html($('#note'+id).val());
	$('#createdAtDetail').html($('#createdAtDetail'+id).val());
	$('#updatedAtDetail').html($('#updatedAtDetail'+id).val());

	$('#historyActivesFormDiv').hide();
	$('#detailsDiv').show();
	disabled(true);
}

$(document).on('click','.pagination a', function(e){
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    var nroPages = $('#nroPages').val();
    var dateFilter = $('#searchDate').val();
    var typeFilter = $('#searchType').val();
    var action = 'historyActives';
    var report = 'false';
    if ($('#report').val()) {action = '/admin/historyActives'; report = 'true';}

    $.ajax({
        url: action,
        data: {page: page, nroPages: nroPages, dateFilter: dateFilter, typeFilter: typeFilter, report: report},
        type: 'GET',
        success: function(response){
            $('#listHistoryActives').html(response);
        }
    });

});

function validate(error)
{
	if (!error.type){
		$('#divErrorType').attr('class' ,'form-group');
		$('#errorType').html('');
	}
	else{
		$('#divErrorType').attr('class' ,'form-group has-error');
		$('#errorType').html('<span class="help-block"><strong>'+error.type+'</strong></span>');
	}

	if (!error.active_id){
		$('#divErrorActive').attr('class' ,'form-group');
		$('#errorActive').html('');
	}
	else{
		$('#divErrorActive').attr('class' ,'form-group has-error');
		$('#errorActive').html('<span class="help-block"><strong>'+error.active_id+'</strong></span>');
	}

	if (!error.amount){
		$('#divErrorAmount').attr('class' ,'form-group');
		$('#errorAmount').html('');
	}
	else{
		$('#divErrorAmount').attr('class' ,'form-group has-error');
		$('#errorAmount').html('<span class="help-block"><strong>'+error.amount+'</strong></span>');
	}

	if (!error.responsible){
		$('#divErrorResponsible').attr('class' ,'form-group');
		$('#errorResponsible').html('');
	}
	else{
		$('#divErrorResponsible').attr('class' ,'form-group has-error');
		$('#errorResponsible').html('<span class="help-block"><strong>'+error.responsible+'</strong></span>');
	}

	if (!error.date){
		$('#divErrorDate').attr('class' ,'form-group');
		$('#errorDate').html('');
	}
	else{
		$('#divErrorDate').attr('class' ,'form-group has-error');
		$('#errorDate').html('<span class="help-block"><strong>'+error.date+'</strong></span>');
	}

}

function message(type, content)
{
	var icon = 'ok';
	if (type == 2) {icon='alert';}

	notie.setOptions({
        alertTime: 2
      })

	notie.alert({ type: type, text: '<i class="glyphicon glyphicon-'+icon+'"><i/><span class="notieCss"> '+content+'</span>', time: 5 })
}

function clearFields()
{
	$('#id').val('');
	$('select#type').val('');
	$('select#active_id').val('');
	$('#active_id').trigger('chosen:updated');
	$('#amount').val('');
	$('#responsible').val('');
	$('#date').val('');
	$('#note').val('');

	$('#divErrorType').attr('class' ,'form-group');
	$('#errorType').html('');

	$('#divErrorActive').attr('class' ,'form-group');
	$('#errorActive').html('');

	$('#divErrorAmount').attr('class' ,'form-group');
	$('#errorAmount').html('');

	$('#divErrorResponsible').attr('class' ,'form-group');
	$('#errorResponsible').html('');

	$('#divErrorDate').attr('class' ,'form-group');
	$('#errorDate').html('');
}

function selectPages()
{
	if ($('#total').html() > 5) 
		{$('#nroPages').removeAttr('disabled');} 
	else 
		{$('#nroPages').attr('disabled', 'disabled');$('select#nroPages').val(5);}
}

function disabled(val)
{
	if (val == false){
		$('#btnAdd').removeAttr('disabled');
		$('#searchType').removeAttr('disabled');
		$('#searchDate').removeAttr('disabled');
		$('#btnListAll').removeAttr('disabled');
	}
	else{
		$('#btnAdd').attr('disabled', 'disabled');
		$('#searchType').attr('disabled', 'disabled');
		$('#searchDate').attr('disabled', 'disabled');
		$('#btnListAll').attr('disabled', 'disabled');
	}
}