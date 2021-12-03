@include('admin.dashboard.includes.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin.dashboard.includes.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('admin.dashboard.includes.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th class="text-center">Profile Pic</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Age</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('admin.dashboard.includes.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('admin.dashboard.includes.footer-script')

</body>
</html>
<style>
.select2-container {
    width: 100% !important;
    padding: 0;
}
.error {
    color: #F06543; }
.parsley-error {
    border-color: #F06543 !important;;
}

.parsley-errors-list {
    display: none;
    margin: 0;
    padding: 0;
}
.parsley-errors-list.filled {
    display: block;
}
.parsley-errors-list > li {
    font-size: 12px;
    list-style: none;
    color: #F06543;
    margin-top: 5px;
}


</style>
<div class="modal fade" id="form-Modal" role="dialog" aria-labelledby="mySmallModalLabel" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modal-title">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="alert alert-danger errorDisplaySection" style="display:none; margin:10px;">
                <ul></ul>
            </div>
            <form role="form" id="submitForm" data-parsley-validate method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id" id="id" value="">
                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-4">Profile Preview</label>
                                <div class="col-12 col-md-8">
                                    <img id="profileImagePreview" value="" width="100" height="100">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-4">Profile Picture</label>
                                <div class="col-12 col-md-8">
                                    <input type="file" id="profileImage" name="profileImage" value="" class="form-control" accept="image/png, image/gif, image/jpg, image/jpeg">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-4">Name <span id="requiredSpan" style="color: red;">*</span></label>
                                <div class="col-12 col-md-8">
                                    <input type="text" id="name" name="name" value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-4">Email <span id="requiredSpan" style="color: red;">*</span></label>
                                <div class="col-12 col-md-8">
                                    <input type="text" id="email" name="email" value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-4">Address <span id="requiredSpan" style="color: red;">*</span></label>
                                <div class="col-12 col-md-8">
                                    <textarea type="text" id="address" name="address" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-4">DOB <span id="requiredSpan" style="color: red;">*</span></label>
                                <div class="col-12 col-md-8">
                                    <input type="text" id="dob" name="dob" value="" class="form-control datepicker" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-4">Education  <span id="requiredSpan" style="color: red;">*</span></label>
                                <div class="col-12 col-md-8">
                                    <select id="education" name="education" class="form-control" required>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-4">Country <span id="requiredSpan" style="color: red;">*</span></label>
                                <div class="col-12 col-md-8">
                                    <select id="country" name="country" class="form-control"  required>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-4">State <span id="requiredSpan" style="color: red;">*</span></label>
                                <div class="col-12 col-md-8">
                                    <select id="state" name="state" class="form-control"  required>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-4">City <span id="requiredSpan" style="color: red;">*</span></label>
                                <div class="col-12 col-md-8">
                                    <select id="city" name="city" class="form-control"  required>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-4">Pincode <span id="requiredSpan" style="color: red;">*</span></label>
                                <div class="col-12 col-md-8">
                                    <input type="text" id="pincode" name="pincode" value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-5">Status</label>
                                <div class="col-12 col-md-7">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" value="Active" id="active" name="status" class="custom-control-input" checked="" data-parsley-multiple="status" required>
                                        <label class="custom-control-label" for="active">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" value="InActive" id="inactive" name="status" class="custom-control-input" data-parsley-multiple="status" required>
                                        <label class="custom-control-label" for="inactive">InActive</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" value="Deleted" id="deleted" name="status" class="custom-control-input" data-parsley-multiple="status" required>
                                        <label class="custom-control-label" for="deleted">Deleted</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" id="update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    listUrl = "{{ route('admin.get-users-list') }}";
    deleteUrl = "{{ route('admin.user-delete') }}";
    var colmn = [
        {
            "name":"id",
            "data":"id",
            "visible": false,
            "orderable":false,
            "searchable":false,
            "className": "text-center",
        },
        {
            "name":"profile_photo_path",
            "data":"profile_photo_path",
            "orderable":false,
            "searchable":false,
            "className": "text-center",
        },
        {
            "name":"name",
            "data":"name",
            "orderable":true,
            "searchable":true,
            "className": "text-center",
        },
        {
            "name":"email",
            "data":"email",
            "orderable":true,
            "searchable":true,
            "className": "text-center",
        },
        {
            "name":"dob",
            "data":"dob",
            "orderable":true,
            "searchable":true,
            "className": "text-center",
        },
        {
            "name":"status",
            "data":"status",
            "orderable":true,
            "searchable":true,
            "className": "text-center",
        },
        {
            "name":"action",
            "data":"action",
            "orderable":false,
            "searchable":false,
            "className": "text-center",
        }
    ];
    var statusFilterVal = "Active";
    var status = '<select class="ml-2 statusFilter form-control-sm"><option value="Active">Active</option><option value="InActive">InActive</option><option value="Deleted">Deleted</option></select>';
    $(document).ready(function(){
        function iniDataTable(){
            return table =  $("#usersTable").DataTable({
                stateSave: false,
                rowId: 'DT_RowIndex',
                "serverSide":true,
                "processing":true,
                'serverMethod': 'post',
                "ajax": {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: listUrl,
                    "type":"POST",
                    data: function(data) {
                        data.statusFilter = ($(".statusFilter").val()) ? $(".statusFilter").val() : statusFilterVal;
                    },
                },
                "columns":colmn,
            })
        }
        table = iniDataTable();
        $(".dataTables_filter").append(status);
        $(".dataTables_length").append('<button class="btn btn-sm ml-2 btn-outline-primary" tabindex="0" type="button" title="Add" id="addBtn"><span><i class="fas fa-plus"></i></span></button>');
        $(document).on('click', '#deleteBtn', function() {
            confirmButtonText = "Yes, delete it!";
            var id = $(this).data('id');
            if(id != ''){
                swal.fire({
                    title: "Are you sure?",
                    type: "question",
                    icon:"question",
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonColor: "#2fa97c",
                    confirmButtonText: confirmButtonText,
                }).then(function(t){
                    if (t.value) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url : deleteUrl,
                            type: "POST",
                            data : { "id":id },
                            dataType: 'json',
                            success:function(result, textStatus, jqXHR) {
                                if(result['error'] == '') {
                                    table.draw();
                                    swal.fire({
                                        title: "Success",
                                        html: result['success'],
                                        icon: "success",
                                        allowOutsideClick: false,
                                        confirmButtonColor: "#2fa97c",
                                        confirmButtonText: "Okay",
                                    })
                                }
                                else{
                                    swal.fire({
                                        title: "Error",
                                        html: result['error'],
                                        icon: "error",
                                        allowOutsideClick: false,
                                        confirmButtonColor: "#d33",
                                    });
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                swal.fire({
                                    title: "Error",
                                    html: "Error occurred, try again",
                                    icon: "error",
                                    allowOutsideClick: false,
                                    confirmButtonColor: "#d33",
                                });
                            }
                        })
                    }
                })
            }
        });
        $("#addBtn").on("click", function(){
            triggerModal('Add');
        });
        $(document).on('click', '#editBtn', function() {
            triggerModal('Edit', $(this).data('id'));
        });
        $(document).on('click', '#viewBtn', function() {
            triggerModal('View',  $(this).data('id'));
        });
        $(document).on('change', '.statusFilter', function() {
            table.draw();
        });
    });

function triggerModal(operationType, id=''){
    $(".errorDisplaySection").css('display','none');
    $('#submitForm').parsley().reset();
    $('#profileImagePreview').attr('src', '../assets/images/profile-pic.jpg');
    $("#update").removeClass("d-none");
    $("#submitForm input").prop("disabled", false);
    $('textarea[name="address"]').prop('disabled', false);
    $("#education").prop("disabled", false);
    $(".select2-hidden-accessible").prop("disabled", false);
    getEductionsData();
    if(operationType == "Edit" && id != ''){
        getRowData(id, 'edit');
        $("#update").html("Update");
        $("#modal-title").html("Edit User");
    }else if(operationType == "Add"){
        getCountry();
        $("#id").val('');
        $("#name").val('');
        $("#email").val('');
        $("#address").val('');
        $("#dob").val('');
        $("#education").val('');
        $("#country").val('');
        $("#state").val('');
        $("#city").val('');
        $("#pincode").val('');
        $("#profileImage").val('');
        $("#active").prop("checked", true);
        $("#update").html("Add");
        $("#modal-title").html("Add User");
        $("#form-Modal").modal("show");
    }else if(operationType == "View"){
        getRowData(id, 'view');
        $("#modal-title").html("View User");
    }
}
function getRowData(id, modalType){
    $.ajax({
        url: "{{route('admin.get-row-data')}}",
        type: "POST",
        data: { id: id, _token: '{{csrf_token()}}' },
        dataType: 'json',
        success: function (result) {
            $('#profile_photo_path').val('');
            if(result['data'] != ''){
                $("#id").val(result['data']['id']);
                $("#name").val(result['data']['name']);
                $("#email").val(result['data']['email']);
                $("#address").val(result['data']['address']);
                $("#dob").val(result['data']['dob']);
                $("#education").val(result['data']['education']);
                $("#pincode").val(result['data']['pincode']);
                if(result['data']['profile_photo_path'] != '' && result['data']['profile_photo_path'] != null){
                    $('#profileImagePreview').attr('src', 'userimages/'+result['data']['profile_photo_path']);
                }else{
                    $('#profileImagePreview').attr('src', result['data']['profile_photo_url']);
                }
                $("input[name='status'][value="+result['data']['status']+"]").attr('checked', 'checked');
                if(result['countryData'] != ''){
                    $('#country').html('<option value="">---Select Country---</option>');
                    $.each(result['countryData'], function (key, value) {
                        var selected = '';
                        if(value.id == result['data']['country']){
                            selected = 'selected';
                        }
                        $("#country").append('<option value="' + value
                            .id + '" '+selected+'>' + value.name + '</option>');
                    });
                }
                if(result['stateData'] != ''){
                    $('#state').html('<option value="">---Select State---</option>');
                    $.each(result['stateData'], function (key, value) {
                        var selected = '';
                        if(value.id == result['data']['state']){
                            selected = 'selected';
                        }
                        $("#state").append('<option value="' + value
                            .id + '" '+selected+'>' + value.name + '</option>');
                    });
                }
                if(result['cityData'] != ''){
                    $('#city').html('<option value="">---Select City---</option>');
                    $.each(result['cityData'], function (key, value) {
                        var selected = '';
                        if(value.id == result['data']['city']){
                            selected = 'selected';
                        }
                        $("#city").append('<option value="' + value
                            .id + '" '+selected+'>' + value.name + '</option>');
                    });
                }
                if(modalType == 'view'){
                    $("#update").addClass("d-none");
                    $("#submitForm input").prop("disabled", true);
                    $('textarea[name="address"]').prop('disabled', true);
                    $("#education").prop("disabled", true);
                    $(".select2-hidden-accessible").prop("disabled", true);
                }
                $("#form-Modal").modal("show");
            }else{
                swal.fire({
                    title: "Error",
                    html: "Internal Server Error, try again",
                    icon: "error",
                    allowOutsideClick: false,
                    confirmButtonColor: "#d33",
                })
            }
        }
    });
}

function getCountry(){
    $.ajax({
        url: "{{route('admin.get-country')}}",
        type: "POST",
        data: { _token: '{{csrf_token()}}' },
        dataType: 'json',
        success: function (result) {
            $('#country').html('<option value="">---Select Country---</option>');
            $('#state').html('<option value="">---Select State---</option>');
            $.each(result.countries, function (key, value) {
                $("#country").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
            });
            $('#city').html('<option value="">---Select City---</option>');
        }
    });
}

function getEductionsData(){
    $("#education").html('');
    $.ajax({
        url: "{{route('admin.get-educations')}}",
        type: "POST",
        data: { _token: '{{csrf_token()}}' },
        dataType: 'json',
        success: function (result) {
            $('#education').html('<option value="">---Select Education---</option>');
            $.each(result.educations, function (key, value) {
                $("#education").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
            });
        }
    });
}

$('#country').on('change', function () {
    $("#state").html('');
    $.ajax({
        url: "{{route('admin.get-state')}}",
        type: "POST",
        data: { country_id: this.value, _token: '{{csrf_token()}}' },
        dataType: 'json',
        success: function (result) {
            $('#state').html('<option value="">---Select State---</option>');
            $.each(result.states, function (key, value) {
                $("#state").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
            });
            $('#city').html('<option value="">---Select City---</option>');
        }
    });
});

$('#state').on('change', function () {
    $("#city").html('');
    $.ajax({
        url: "{{route('admin.get-city')}}",
        type: "POST",
        data: { state_id: this.value, _token: '{{csrf_token()}}' },
        dataType: 'json',
        success: function (res) {
            $('#city').html('<option value="">---Select City---</option>');
            $.each(res.cities, function (key, value) {
                $("#city").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
            });
        }
    });
});

$("#submitForm").on('submit', function (e) {
    var btnHTML = $("#update").html();
    if (this.checkValidity && !this.checkValidity()) return;
    e.preventDefault();
    if ($('#submitForm').parsley().isValid()) {
        postData = new FormData(this);
        var url = "{{ route('admin.user-update') }}";
        if($("#id").val() != ''){
            postData.append("operationType", "update");
        }else{
            postData.append("operationType", "add");
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:  url,
            type: "POST",
            data: postData,
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $("#update").html("<span class='spinner-border spinner-border-sm mr-1' role='status' aria-hidden='true'></span>Loading...");
                $("#update").prop("disabled", true);
            },
            complete:function(data){
                $("#update").html(btnHTML);
                $("#update").prop("disabled", false);
            },
            success: function (result, textStatus, jqXHR) {

                if($.isEmptyObject(result.error)){
                    swal.fire({
                        title: "Success",
                        text: result.success,
                        icon: "success",
                        allowOutsideClick: false,
                        confirmButtonColor: "#2fa97c",
                    });
                    table.draw();
                    $("#form-Modal").modal("hide");

                }else{
                    printErrorMsg(result.error);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                swal.fire({
                    title: "Error",
                    html: "Internal Server Error, try again",
                    icon: "error",
                    allowOutsideClick: false,
                    confirmButtonColor: "#d33",
                })
            }
        })
    }
});

function printErrorMsg (msg) {
    $(".errorDisplaySection").find("ul").html('');
    $(".errorDisplaySection").css('display','block');
    $.each( msg, function( key, value ) {
        $(".errorDisplaySection").find("ul").append('<li>'+value+'</li>');
    });
}

$("#uploadIcon").click(function () {
  $("input[type='file']").trigger('click');
});

$('#deleteImage').click(function () {
    $('#profileImage').val('');
    $('#profilePreview').attr('src', "{{ asset('../assets/images/profile-pic.jpg') }}");
});

$('#profileImage').change(function(){
    const file = this.files[0];
    if (file){
        let reader = new FileReader();
        reader.onload = function(event){
            $('#profileImagePreview').attr('src', event.target.result);
        }
        reader.readAsDataURL(file);
    }
});

$('.datepicker').datetimepicker({
    format: 'DD-MM-YYYY',
    ignoreReadonly: true,
    allowInputToggle: true,
    stepping: 5,
    sideBySide: true,
    useCurrent: false,
    icons: pickerIcons
});

$("#country").select2({dropdownParent: $('#form-Modal')});
$("#state").select2({dropdownParent: $('#form-Modal')});
$("#city").select2({dropdownParent: $('#form-Modal')});
</script>
