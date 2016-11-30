var myToken = $('meta[name="csrf-token"]').attr('content');
var department_ids = [];
var position_ids = [];
var gender_ids = [];
var education_ids = [];
var honor_type_ids = [];
var year_ids = [];
var month_ids = [];

$(document).ready(function() {
	$('#btn_export_report').attr('disabled', true);
	$('#btn_generate_report').click(function() {
		generate_report();
	});

	$('#btn_clear_report').click(function() {
		refresh_report_variable();
	});

	$('#btn_export_report').click(function() {
		$('#grid-data-result').table2excel({
			exclude: ".noExl",
			name: "Report GoM Freelancers",
			filename: "report_gom_freelancer"
		});
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

	/*console.log("department " + department_ids);
	console.log("position " + position_ids);
	console.log("gender " + gender_ids);
	console.log("education " + education_ids);
	console.log("honor_type " + honor_type_ids);
	console.log("year " + year_ids);
	console.log("month " + month_ids);*/

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
			console.log(data.result);
			var html = '';
			$('#grid-data-result tbody').empty();
			$.each(data.result, function(key, value){
				html += '<tr>';
				html += '<td>'  + value.name + '</td>';
				html += '<td>'  + value.email + '</td>';
				html += '<td>'  + value.phone + '</td>';
				html += '<td>'  + value.phone_other + '</td>';
				html += '<td>'  + value.place_of_birth + '</td>';
				html += '<td>'  + value.date_of_birth + '</td>';
				html += '<td>'  + value.gender + '</td>';
				html += '<td>'  + value.last_education + '</td>';
				html += '<td>'  + value.npwp + '</td>';
				html += '<td>'  + value.bank + '</td>';
				html += '<td>'  + value.bank_branch + '</td>';
				html += '<td>'  + value.bank_account_name + '</td>';
				html += '<td>'  + value.bank_account_number + '</td>';
				html += '<td>'  + value.ktp_number + '</td>';
				html += '<td>'  + value.ktp_address + '</td>';
				html += '<td>'  + value.ktp_city + '</td>';
				html += '<td>'  + value.home_address + '</td>';
				html += '<td>'  + value.home_city + '</td>';
				html += '<td>'  + value.division_name + '</td>';
				html += '<td>'  + value.department_name + '</td>';
				html += '<td>'  + value.position_name + '</td>';
				html += '<td>'  + value.start_date + '</td>';
				html += '<td>'  + value.end_date + '</td>';
				html += '<td>'  + value.honor_type + '</td>';
				html += '<td>'  + value.honor + '</td>';
				html += '</tr>';
			});

			$('#grid-data-result tbody').append(html);
			$('#btn_export_report').attr('disabled', false);
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

	$('#grid-data-result tbody').empty();
	$('#btn_export_report').attr('disabled', true);

	/*console.log("department " + department_ids);
	console.log("position " + position_ids);
	console.log("gender " + gender_ids);
	console.log("education " + education_ids);
	console.log("honor_type " + honor_type_ids);
	console.log("year " + year_ids);
	console.log("month " + month_ids);*/
}