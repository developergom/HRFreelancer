var uid = 0;
var subordinate = [];

$(document).ready(function() {
    getUid();
    getSubordinate();

    $("#grid-data").bootgrid({
        rowCount: [5, 10, 25, 50],
        ajax: true,
        post: function ()
        {
            /* To accumulate custom parameter with the request object */
            return {
                '_token': $('meta[name="csrf-token"]').attr('content')
            };
        },
        url: base_url + "freelancer/apiList",
        formatters: {
            "link-rud": function(column, row)
            {   
                if(subordinate.length > 0) {
                    if((subordinate.indexOf(row.user_id) != -1) || (row.user_id == uid)) {
                        return '<a title="View Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;'
                                +'<a title="Edit Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '/edit" class="btn btn-icon command-edit waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-edit"></span></a>&nbsp;&nbsp;'
                                +'<a title="Delete Freelancer" href="javascript:void(0);" class="btn btn-icon btn-delete-table command-delete waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-delete"></span></a>';
                    }else{
                        return '<a title="View Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;';                    
                    }
                }else{
                    if(row.user_id == uid) {
                        return '<a title="View Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;'
                                +'<a title="Edit Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '/edit" class="btn btn-icon command-edit waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-edit"></span></a>&nbsp;&nbsp;'
                                +'<a title="Delete Freelancer" href="javascript:void(0);" class="btn btn-icon btn-delete-table command-delete waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-delete"></span></a>';
                    }else{
                        return '<a title="View Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;';                    
                    }
                }
            },
            "link-ru": function(column, row)
            {
                if(subordinate.length > 0) {
                    if((subordinate.indexOf(row.user_id) != -1) || (row.user_id == uid)) {
                        return '<a title="View Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;'
                            +'<a title="Edit Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '/edit" class="btn btn-icon command-edit waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-edit"></span></a>&nbsp;&nbsp;';
                    }else{
                        return '<a title="View Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;';                    
                    }
                }else{
                    if(row.user_id == uid) {
                        return '<a title="View Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;'
                            +'<a title="Edit Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '/edit" class="btn btn-icon command-edit waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-edit"></span></a>&nbsp;&nbsp;';
                    }else{
                        return '<a title="View Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;';                    
                    }
                }
            },
            "link-rd": function(column, row)
            {
                if(subordinate.length > 0) {
                    if((subordinate.indexOf(row.user_id) != -1) || (row.user_id == uid)) {
                        return '<a title="View Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;'
                            +'<a title="Delete Freelancer" href="javascript:void(0);" class="btn btn-icon btn-delete-table command-delete waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-delete"></span></a>';
                    }else{
                        return '<a title="View Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;';                    
                    }
                }else{
                    if(row.user_id == uid) {
                        return '<a title="View Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;'
                            +'<a title="Delete Freelancer" href="javascript:void(0);" class="btn btn-icon btn-delete-table command-delete waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-delete"></span></a>';
                    }else{
                        return '<a title="View Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;';                    
                    }
                }
            },
            "link-r": function(column, row)
            {
                return '<a title="View Freelancer" href="' + base_url + 'freelancer/' + row.freelancer_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.freelancer_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;';
            }
        }
    }).on("loaded.rs.jquery.bootgrid", function()
    {
        /* Executes after data is loaded and rendered */
        $("#grid-data").find(".command-delete").on("click", function(e)
        {
            var delete_id = $(this).data('row-id');

            swal({
              title: "Are you sure want to delete this data?",
              text: "You will not be able to recover this action!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false
            },
            function(){
              $.ajax({
                url: base_url + 'freelancer/apiDelete',
                type: 'POST',
                data: {
                    'freelancer_id' : delete_id,
                    '_token' : $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                error: function() {
                    swal("Failed!", "Deleting data failed.", "error");
                },
                success: function(data) {
                    if(data==100) 
                    {
                        swal("Deleted!", "Your data has been deleted.", "success");
                        $("#grid-data").bootgrid("reload");
                    }else{
                        swal("Failed!", "Deleting data failed.", "error");
                    }
                }
              });

              
            });
        });
    });
});



function getUid() {
    $.ajax({
        url: base_url + 'api/getUid',
        dataType: 'json',
        type: 'GET',
        error: function(data) {
            console.log('error');
        },
        success: function(data) {
            uid = data.uid;
        }
    });
}

function getSubordinate() {
    $.ajax({
        url: base_url + 'api/getSubordinate',
        dataType: 'json',
        type: 'GET',
        error: function(data) {
            console.log('error');
        },
        success: function(data) {
            //subordinate = data.subordinate;
            subordinate = [];
            $.each(data.subordinate, function(key, value) {
                subordinate.push(value);
            });
        }
    });   
}