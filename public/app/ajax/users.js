$(document).ready(function(){

	selectPages();

	$('#btnAdd').click(function(){
		$('#title').html('<h3 class="panel-title"><i class="glyphicon glyphicon-plus"></i> Agregar Usuario</h3>');
		clearFields();
		$('#usersFormDiv').show();
		$('#btnAdd').attr('disabled', 'disabled');
	});

	$('#btnCancel').click(function(){
		$('#usersFormDiv').hide();
		$('#btnAdd').removeAttr('disabled');
		$('#password').removeAttr('disabled');
		clearFields();
	});

	$('#btnSave').click(function(){

		var id = $('#id').val();
		var data   = $('#frmUsers').serialize();
		var page = $('.pagination li.active span').html();
		var nroPages = $('#nroPages').val();

		if (!page) {page=1;}

		if (id == ''){

			var action = $('#frmUsers').attr('action');

			$.ajax({
				url: action,
				type: 'POST',
				data: data + '&page=' + page + '&nroPages=' + nroPages,
				success: function(response){
					$('#listUsers').html(response);
					selectPages();
					$('#usersFormDiv').hide();
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

			var action = 'users/'+id+'';

			$.ajax({
				url: action,
				type: 'PUT',
				data: data + '&page=' + page + '&nroPages=' + nroPages,
				success: function(response){
					$('#listUsers').html(response);
					selectPages();
					$('#usersFormDiv').hide();
					$('#btnAdd').removeAttr('disabled');
					$('#password').removeAttr('disabled');
					clearFields();
					message(1, 'Registro Actualizado Exitosamente!');
				}
			});
		}

		
	});

	$('#nroPages').change(function(){
        var page = 1;
        var nroPages = $('#nroPages').val();
        var action = 'users';

        $.ajax({
            url: action,
            data: {page: page, nroPages: nroPages},
            type: 'GET',
            success: function(response){
                $('#listUsers').html(response);
            }

        });
    });

});

function updateUser(id)
{
	$('#title').html('<h3 class="panel-title"><i class="glyphicon glyphicon-refresh"></i> Actualizar Usuario</h3>');
	$('#id').val(id);
	$('#name').val($('#name'+id).val());
	$('#email').val($('#email'+id).val());
	$('select#type').val($('#type'+id).val());

	$('#usersFormDiv').show();
	$('#password').attr('disabled', 'disabled');
	$('#btnAdd').attr('disabled', 'disabled');
}

function deleteUser(id)
{
	notie.confirm({
		text: '<i class="glyphicon glyphicon-alert"><i/><span class="notieCss"> ¿Desea eliminar este registro?</span>',
		submitCallback: function () {
		  
		  var action = 'users/'+id+'/destroy';
		  var page = $('.pagination li.active span').html();
		  var nroPages = $('#nroPages').val();

		  if (!page) {page=1;}

		  $.ajax({
		  	url: action,
		  	type: 'GET',
		  	data: {page: page, nroPages: nroPages},
		  	success: function(response){
		  		$('#listUsers').html(response);
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
    var action = 'users';

    $.ajax({
        url: action,
        data: {page: page, nroPages: nroPages},
        type: 'GET',
        success: function(response){
            $('#listUsers').html(response);
        }
    });

});

function validate(error)
{
	if (!error.name){
		$('#divErrorName').attr('class' ,'form-group');
		$('#errorName').html('');
	}
	else{
		$('#divErrorName').attr('class' ,'form-group has-error');
		$('#errorName').html('<span class="help-block"><strong>'+error.name+'</strong></span>');
	}

	if (!error.email){
		$('#divErrorEmail').attr('class' ,'form-group');
		$('#errorEmail').html('');
	}
	else{
		$('#divErrorEmail').attr('class' ,'form-group has-error');
		$('#errorEmail').html('<span class="help-block"><strong>'+error.email+'</strong></span>');
	}

	if (!error.password){
		$('#divErrorPassword').attr('class' ,'form-group');
		$('#errorPassword').html('');
	}
	else{
		$('#divErrorPassword').attr('class' ,'form-group has-error');
		$('#errorPassword').html('<span class="help-block"><strong>'+error.password+'</strong></span>');
	}

	if (!error.type){
		$('#divErrorType').attr('class' ,'form-group');
		$('#errorType').html('');
	}
	else{
		$('#divErrorType').attr('class' ,'form-group has-error');
		$('#errorType').html('<span class="help-block"><strong>'+error.type+'</strong></span>');
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
	$('#name').val('');
	$('#email').val('');
	$('#password').val('');
	$('select#type').val('');

	$('#divErrorName').attr('class' ,'form-group');
	$('#errorName').html('');

	$('#divErrorEmail').attr('class' ,'form-group');
	$('#errorEmail').html('');

	$('#divErrorPassword').attr('class' ,'form-group');
	$('#errorPassword').html('');

	$('#divErrorType').attr('class' ,'form-group');
	$('#errorType').html('');
}

function selectPages()
{
	if ($('#total').html() > 5) 
		{$('#nroPages').removeAttr('disabled');} 
	else 
		{$('#nroPages').attr('disabled', 'disabled');$('select#nroPages').val(5);}
}