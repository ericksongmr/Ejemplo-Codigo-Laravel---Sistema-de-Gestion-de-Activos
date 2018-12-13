$(document).ready(function(){
	
	selectPages();

	$('#btnAdd').click(function(){
		$('#title').html('<h3 class="panel-title"><i class="glyphicon glyphicon-plus"></i> Agregar Trabajo</h3>');
		clearFields();
		$('#jobsFormDiv').show();
		$('#btnAdd').attr('disabled', 'disabled');
	});

	$('#btnCancel').click(function(){
		$('#jobsFormDiv').hide();
		$('#btnAdd').removeAttr('disabled');
		clearFields();
	});

	$('#btnSave').click(function(){

		var id = $('#id').val();
		var data   = $('#frmJobs').serialize();
		var page = $('.pagination li.active span').html();
		var nroPages = $('#nroPages').val();

		if (!page) {page=1;}

		if (id == ''){

			var action = $('#frmJobs').attr('action');

			$.ajax({
				url: action,
				type: 'POST',
				data: data + '&page=' + page + '&nroPages=' + nroPages,
				success: function(response){
					$('#listJobs').html(response);
					selectPages();
					$('#jobsFormDiv').hide();
					$('#btnAdd').removeAttr('disabled');
					clearFields();
					message(1, 'Registro Guardado Exitosamente!');
				},
				error: function(response){
					var error = response.responseJSON;
					validate(error);
				}
			});

		}else{

			var action = 'jobs/'+id+'';

			$.ajax({
				url: action,
				type: 'PUT',
				data: data + '&page=' + page + '&nroPages=' + nroPages,
				success: function(response){
					$('#listJobs').html(response);
					selectPages();
					$('#jobsFormDiv').hide();
					$('#btnAdd').removeAttr('disabled');
					clearFields();
					message(1, 'Registro Actualizado Exitosamente!');
				}
			});
		}

		
	});

	$('#nroPages').change(function(){
        var page = 1;
        var nroPages = $('#nroPages').val();
        var action = 'jobs';

        $.ajax({
            url: action,
            data: {page: page, nroPages: nroPages},
            type: 'GET',
            success: function(response){
                $('#listJobs').html(response);
            }

        });
    });

});

function updateJob(id)
{
	$('#title').html('<h3 class="panel-title"><i class="glyphicon glyphicon-refresh"></i> Actualizar Trabajo</h3>');
	$('#id').val(id);
	$('#description').val($('#description'+id).val());

	$('#jobsFormDiv').show();
	$('#btnAdd').attr('disabled', 'disabled');
}

function deleteJob(id)
{
	notie.confirm({
		text: '<i class="glyphicon glyphicon-alert"><i/><span class="notieCss"> ¿Desea eliminar este registro?</span>',
		submitCallback: function () {
		  
		  var action = 'jobs/'+id+'/destroy';
		  var page = $('.pagination li.active span').html();
		  var nroPages = $('#nroPages').val();

		  if (!page) {page=1;}

		  $.ajax({
		  	url: action,
		  	type: 'GET',
		  	data: {page: page, nroPages: nroPages},
		  	success: function(response){
		  		$('#listJobs').html(response);
		  		selectPages();
		  		message(1, 'Registro eliminado exitosamente!');
		  	}	
		  });

		}
	})
}

$(document).on('click','.pagination a', function(e){
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    var nroPages = $('#nroPages').val();
    var action = 'jobs';

    $.ajax({
        url: action,
        data: {page: page, nroPages: nroPages},
        type: 'GET',
        success: function(response){
            $('#listJobs').html(response);
        }
    });

});

function validate(error)
{
	if (!error.description){
		$('#divErrorDescription').attr('class' ,'form-group');
		$('#errorDescription').html('');
	}
	else{
		$('#divErrorDescription').attr('class' ,'form-group has-error');
		$('#errorDescription').html('<span class="help-block"><strong>'+error.description+'</strong></span>');
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
	$('#description').val('');

	$('#divErrorDescription').attr('class' ,'form-group');
	$('#errorDescription').html('');

}

function selectPages()
{
	if ($('#total').html() > 5) 
		{$('#nroPages').removeAttr('disabled');} 
	else 
		{$('#nroPages').attr('disabled', 'disabled');$('select#nroPages').val(5);}
}