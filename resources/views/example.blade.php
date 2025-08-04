@extends('layouts.app') @section('content')

<div class="page-block mb-2">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="page-header-title">
                <h3 class="f-w-400">Halaman Example</h3>
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
                <table id="example" class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>
                                <div
                                    class="btn-group"
                                    role="group"
                                    aria-label="Basic example"
                                >
                                    <a
                                        href="javascript:void(0)"
                                        data-bs-toggle="modal"
                                        data-bs-target="#myModal"
                                        data-id="{{ $row->id }}"
                                        class="btn btn-outline-primary btn-sm"
                                        id="detail"
                                        >Detail</a
                                    >
                                    <a
                                        href="javascript:void(0)"
                                        data-bs-toggle="modal"
                                        data-bs-target="#myModal"
                                        data-id="{{ $row->id }}"
                                        class="btn btn-outline-primary btn-sm"
                                        id="ubah"
                                        >Ubah</a
                                    >
                                    <a
                                        href="javascript:void(0)"
                                        data-id="{{ $row->id }}"
                                        class="btn btn-outline-primary btn-sm"
                                        id="hapus"
                                        >Hapus</a
                                    >
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection @push('js')
<script type="module">
    $(".js-example-basic-single").select2();
</script>
@endpush
