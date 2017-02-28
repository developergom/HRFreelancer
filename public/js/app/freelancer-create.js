var myToken = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function() {
	load_histories();

	$('#btn-copy-address').click(function() {
		var address = $('#ktp_address').val();
		var city = $('#ktp_city').val();

		$('#home_address').val('');
		$('#home_city').val('');

		$('#home_address').val(address);
		$('#home_city').val(city);
	});

	$('#btn-modal-add-history').click(function() {
		clear_modal();
		$('#modalAddHistory').modal();
	});

	$('.btn-save-history').click(function() {
		save_history();
	});

	$('body').on('click','.btn-delete-history', function(){
		var key = $(this).data('key');

		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this data!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes",
			closeOnConfirm: false
		},
		function(){
			delete_history(key);
		});
	});

	$('#modal_division').change(function() {
		var division_id = $(this).val();

		$.ajax({
			url: base_url + 'master/department/apiGetByDivision',
			dataType: 'json',
			type: 'POST',
			data: {
				_token: myToken,
				division_id: division_id
			},
			error: function(data) {
				console.log('error');
			},
			success: function(data) {
				var html = '';
				
				$.each(data.departments, function(key, value) {
					html += '<option value="' + value.department_id + '">' + value.department_name + '</option>';
				});

				$('#modal_department').empty();
				$('#modal_department').append(html);
				$('#modal_department').selectpicker('refresh');
			}
		});		
	});

	function clear_modal() {
		$('#modal_division').val('');
		$('#modal_department').val('');
		$('#modal_position').val('');
		$('#modal_start_date').val('');
		$('#modal_end_date').val('');
		$('#modal_honor_type').val('');
		$('#modal_honor').val('');
		$('#modal_notes').val('');

		$('#modal_department').empty();
		$('#modal_department').append('<option value=""></option>');

		$('#modal_division').selectpicker('refresh');
		$('#modal_department').selectpicker('refresh');
		$('#modal_position').selectpicker('refresh');
		$('#modal_honor_type').selectpicker('refresh');
	}

	function load_histories() {
		$.ajax({
			url: base_url + 'freelancer/api/loadHistory',
			dataType: 'json',
			type: 'GET',
			error: function(data) {
				console.log('error');
			},
			success: function(data) {
				var html = '';
				
				$.each(data.histories, function(key, value) {
					console.log(value);
					html += '<tr>';
					html += '<td>' + value.division_name + '</td>';
					html += '<td>' + value.department_name + '</td>';
					html += '<td>' + value.position_name + '</td>';
					html += '<td>' + value.start_date + '</td>';
					html += '<td>' + value.end_date + '</td>';
					html += '<td>' + value.honor_type + '</td>';
					html += '<td>' + convertNumber(value.honor) + '</td>';
					html += '<td>' + value.notes + '</td>';
					html += '<td><a title="Delete History" href="javascript:void(0);" class="btn btn-icon btn-delete-history waves-effect waves-circle" type="button" data-key="' + key + '"><span class="zmdi zmdi-delete"></span></a></td>';
					html += '</tr>';
				});

				$('#grid-data-listhistory tbody').empty();
				$('#grid-data-listhistory tbody').append(html);
			}
		});
	}

	function save_history() {
		var isValid = false;
		clear_error();
		if($('#modal_department').val()=='') {
			$('#modal_department').parents('.form-group').addClass('has-error').find('.help-block').html('Department must be choosen.');
	        $('#modal_department').focus();
	        isValid = false;
		}else if($('#modal_position').val()=='') {
			$('#modal_position').parents('.form-group').addClass('has-error').find('.help-block').html('Position must be choosen.');
	        $('#modal_position').focus();
	        isValid = false;
		}else if($('#modal_start_date').val()=='') {
			$('#modal_start_date').parents('.form-group').addClass('has-error').find('.help-block').html('Start date must be filled in.');
	        $('#modal_start_date').focus();
	        isValid = false;
		}else if($('#modal_end_date').val()=='') {
			$('#modal_end_date').parents('.form-group').addClass('has-error').find('.help-block').html('End date must be filled in.');
	        $('#modal_end_date').focus();
	        isValid = false;
		}else if($('#modal_honor_type').val()=='') {
			$('#modal_honor_type').parents('.form-group').addClass('has-error').find('.help-block').html('Honor type must be choosen.');
	        $('#modal_honor_type').focus();
	        isValid = false;
		}else if($('#modal_honor').val()=='') {
			$('#modal_honor').parents('.form-group').addClass('has-error').find('.help-block').html('Honor must be filled in.');
	        $('#modal_honor').focus();
	        isValid = false;
		}else{
			isValid = true;

			$.ajax({
				url: base_url + 'freelancer/api/storeHistory',
				dataType: 'json',
				data: {
						department_id : $('#modal_department').val(),
						department_name : $('#modal_department option:selected').text(),
				    	division_id : $('#modal_division').val(),
				    	division_name : $('#modal_division option:selected').text(),
				    	position_id : $('#modal_position').val(),
				    	position_name : $('#modal_position option:selected').text(),
				    	start_date : $('#modal_start_date').val(),
				    	end_date : $('#modal_end_date').val(),
				    	honor_type : $('#modal_honor_type').val(),
				    	honor : $('#modal_honor').val(),
				    	notes : $('#modal_notes').val(),
						_token: myToken
					},
				type: 'POST',
				error: function(data) {
					swal("Failed!", "Adding data failed.", "error");
				},
				success: function(data) {
					if(data.status == '200') {
						swal("Success!", "Your package has been added.", "success");
						load_histories();
						$('.btn-close-history').click();
						clear_modal();
					}else{
						swal("Failed!", "Adding data failed.", "error");
					}
				}
			});
		}
	}

	function delete_history(key) {
		$.ajax({
			url: base_url + 'freelancer/api/deleteHistory',
			dataType: 'json',
			data: {
					key : key,
					_token: myToken
				},
			type: 'POST',
			error: function(data) {
				swal("Failed!", "Deleting data failed.", "error");
			},
			success: function(data) {
				if(data.status == '200') {
					swal("Success!", "Your data has been deleted.", "success");
					load_histories();
				}else{
					swal("Failed!", "Deleting data failed.", "error");
				}
			}
		});
	}

	function clear_error() {
		$('#modal_department').parents('.form-group').removeClass('has-error').find('.help-block').html('');
		$('#modal_position').parents('.form-group').removeClass('has-error').find('.help-block').html('');
		$('#modal_start_date').parents('.form-group').removeClass('has-error').find('.help-block').html('');
		$('#modal_end_date').parents('.form-group').removeClass('has-error').find('.help-block').html('');
		$('#modal_honor_type').parents('.form-group').removeClass('has-error').find('.help-block').html('');
		$('#modal_honor').parents('.form-group').removeClass('has-error').find('.help-block').html('');
	}

});

function convertNumber(value) { return value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."); }