var myToken = $('meta[name="csrf-token"]').attr('content');
var department_ids = [];
var position_ids = [];
var gender_ids = [];
var education_ids = [];
var honor_type_ids = [];
var year_ids = [];
var month_ids = [];

$(document).ready(function() {
	$('#btn_generate_report').click(function() {
		generate_report();
	});

	$('#btn_clear_report').click(function() {
		refresh_report_variable();
	});
});

function generate_report() {
	department_ids = $('#department_id').val();
	position_ids = $('#position_id').val();
	gender_ids = $('#gender').val();
	education_ids = $('#education').val();
	honor_type_ids = $('#honor_type').val();
	year_ids = $('#year').val();
	month_ids = $('#month').val();

	console.log("department " + department_ids);
	console.log("position " + position_ids);
	console.log("gender " + gender_ids);
	console.log("education " + education_ids);
	console.log("honor_type " + honor_type_ids);
	console.log("year " + year_ids);
	console.log("month " + month_ids);

	$.ajax({
		url: base_url + 'report/api/generaterReport',
		dataType: 'json',
		type: 'POST',
		data: {
			_token: myToken,
			department_ids : department_ids,
			position_ids : position_ids,
			gender_ids : gender_ids,
			education_ids : education_ids,
			honor_type_ids : honor_type_ids,
			year_ids : year_ids,
			month_ids : month_ids
		},
		error: function(data) {
			console.log('error');
		},
		success: function(data) {
			
		}
	});
}

function refresh_report_variable() {
	department_ids = [];
	position_ids = [];
	gender_ids = [];
	education_ids = [];
	honor_type_ids = [];
	year_ids = [];
	month_ids = [];

	$('#department_id').val('');
	$('#position_id').val('');
	$('#gender').val('');
	$('#education').val('');
	$('#honor_type').val('');
	$('#year').val('');
	$('#month').val('');

	$('#department_id').selectpicker('refresh');
	$('#position_id').selectpicker('refresh');
	$('#gender').selectpicker('refresh');
	$('#education').selectpicker('refresh');
	$('#honor_type').selectpicker('refresh');
	$('#year').selectpicker('refresh');
	$('#month').selectpicker('refresh');

	console.log("department " + department_ids);
	console.log("position " + position_ids);
	console.log("gender " + gender_ids);
	console.log("education " + education_ids);
	console.log("honor_type " + honor_type_ids);
	console.log("year " + year_ids);
	console.log("month " + month_ids);
}