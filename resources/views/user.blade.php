@extends('layouts.app') @section('content')

<div class="row">
    <div class="col">
        <div
            class="modal fade"
            id="myModal"
            tabindex="-1"
            aria-labelledby="myModalLabel"
        >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="" method="" id="myForm">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="myModalLabel">
                                Modal title
                            </h1>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3" id="errorList"></div>
                            <input type="hidden" name="id" id="id" value="" />
                            <div class="mb-3">
                                <label for="name" class="form-label"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    id="name"
                                    value=""
                                />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"
                                    >Email</label
                                >
                                <input
                                    type="text"
                                    name="email"
                                    class="form-control"
                                    id="email"
                                    value=""
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    for="password"
                                    id="lbl-password"
                                    class="form-label"
                                    >Password</label
                                >
                                <input
                                    type="text"
                                    name="password"
                                    class="form-control"
                                    id="password"
                                    value=""
                                />
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label"
                                    >Roles</label
                                >
                                <ul class="list-group" id="list-group"></ul>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                                id="btnTutup"
                            >
                                Tutup
                            </button>
                            <button
                                type="button"
                                class="btn btn-primary"
                                id="btnSimpan"
                            >
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-block mb-2">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="page-header-title">
                <h3 class="f-w-400">Halaman User</h3>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header py-3">
            <a
                href="javascript:void(0)"
                class="btn btn-sm btn-outline-primary"
                data-bs-toggle="modal"
                data-bs-target="#myModal"
                id="rekam"
                >Rekam</a
            >
        </div>

        <div class="card-body py-2 px-2">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
</div>

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endsection @push('js')
<script type="module">
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("body").on("click", "#rekam", function () {
        $.get("{{ route('user.create') }}", function (data) {
            $("#myForm").trigger("reset");
            $("#myModalLabel").html("Rekam");
            $("#btnSimpan").html("Simpan");
            $("#btnSimpan").show();
            $("#errorList").html("");
            $("#name").prop("disabled", false);
            $("#email").prop("disabled", false);
            $("#password").prop("disabled", false);
            $("#lbl-password").show();
            $("#password").show();
            $("#list-group").html("");
            let listGroup = "";
            $.each(data.role, function (key, value) {
                listGroup +=
                    '<li class="list-group-item py-1">' +
                    '<input class="form-check-input me-1" type="checkbox" name="check[]" value="' +
                    value.name +
                    '" id="cek' +
                    value.id +
                    '">' +
                    '<label class="form-check-label">' +
                    value.name +
                    "</label>" +
                    "</li>";
            });
            $("#list-group").html(listGroup);
        });
    });

    $("body").on("click", "#detail", function () {
        let id = $(this).data("id");
        $.get("{{ route('user.index') }}" + "/" + id, function (data) {
            console.log(data);
            $("#name").val(data.user.name);
            $("#name").prop("disabled", true);
            $("#email").val(data.user.email);
            $("#email").prop("disabled", true);
            $("#password").val(data.user.password);
            $("#password").prop("disabled", true);
            $("#myModalLabel").html("Detail");
            $("#btnSimpan").hide();
            $("#lbl-password").hide();
            $("#password").hide();
            $("#errorList").html("");
            $("#list-group").html("");
            let listGroup = "";
            $.each(data.user.roles, function (key, value) {
                listGroup +=
                    '<li class="list-group-item py-1">' + value.name + "</li>";
            });
            $("#list-group").html(listGroup);
        });
    });

    $("body").on("click", "#ubah", function () {
        const id = $(this).data("id");
        $.get("{{ route('user.index') }}" + "/" + id, function (data) {
            console.log(data);
            $("#id").val(data.user.id);
            $("#name").val(data.user.name);
            $("#email").val(data.user.email);
            $("#myModalLabel").html("Ubah");
            $("#btnSimpan").html("Ubah");
            $("#btnSimpan").show();
            $("#errorList").html("");
            $("#name").prop("disabled", false);
            $("#email").prop("disabled", false);
            $("#password").prop("disabled", false);
            $("#lbl-password").hide();
            $("#password").hide();
            $("#list-group").html("");
            let listGroup = "";
            $.each(data.allRoles, function (key, value) {
                listGroup +=
                    '<li class="list-group-item py-1">' +
                    '<input class="form-check-input me-1" type="checkbox" name="check[]" value="' +
                    value.name +
                    '" id="cek' +
                    value.id +
                    '">' +
                    '<label class="form-check-label">' +
                    value.name +
                    "</label>" +
                    "</li>";
            });
            $("#list-group").html(listGroup);
            $.each(data.allRoles, function (index, item) {
                var checkboxId = item.id;
                $.each(data.user.roles, function (index, item) {
                    if (checkboxId == item.id) {
                        $("#cek" + checkboxId).attr("checked", "checked");
                    }
                });
            });
        });
    });

    $("body").on("click", "#btnSimpan", function (e) {
        const id = $("#id").val();
        e.preventDefault();
        if ($(this).html() == "Simpan") {
            $.ajax({
                data: $("#myForm").serialize(),
                url: "{{ route('user.store') }}",
                type: "POST",
                dataType: "json",
                success: function (data) {
                    $("#myForm").trigger("reset");
                    $("#btnTutup").click();
                    window.LaravelDataTables["users-table"].ajax.reload();
                    toastr.success("Data has been created successfully!");
                },
                error: function (data) {
                    console.log(data.responseJSON.errors);
                    let err = data.responseJSON.errors;
                    let errorsHtml = "";
                    $.each(err, function (key, value) {
                        errorsHtml +=
                            '<div class="alert alert-danger" role="alert">' +
                            value[0] +
                            "</div>";
                    });
                    $("#errorList").html(errorsHtml);
                },
            });
        } else {
            $.ajax({
                data: $("#myForm").serialize(),
                url: "{{ route('user.index') }}" + "/" + id,
                type: "PUT",
                dataType: "json",
                success: function (data) {
                    $("#myForm").trigger("reset");
                    $("#btnTutup").click();
                    window.LaravelDataTables["users-table"].ajax.reload();
                    toastr.success("Data has been updated successfully!");
                },
                error: function (data) {
                    console.log(data.responseJSON.errors);
                    let err = data.responseJSON.errors;
                    let errorsHtml = "";
                    $.each(err, function (key, value) {
                        errorsHtml +=
                            '<div class="alert alert-danger" role="alert">' +
                            value[0] +
                            "</div>";
                    });
                    $("#errorList").html(errorsHtml);
                },
            });
        }
    });

    $("body").on("click", "#hapus", function () {
        var id = $(this).data("id");
        console.log(id);
        if (confirm("Are you sure you want to delete?")) {
            $.ajax({
                type: "DELETE",
                url: "{{ route('user.store') }}" + "/" + id,
                success: function (data) {
                    console.log("Success:", data);
                    window.LaravelDataTables["users-table"].ajax.reload();
                    toastr.success("Data has been deleted successfully!");
                },
                error: function (data) {
                    console.log("Error:", data);
                    toastr.error("There was an error deleting data!");
                },
            });
        }
    });
</script>
@endpush
