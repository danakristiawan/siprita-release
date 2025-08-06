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

@session('success')
<div class="alert alert-success" role="alert">
    {{ $value }}
</div>
@endsession

<div class="col-md-12">
    <div class="card">
        <div class="card-header py-3">
            <a
                href="{{ route('example.create') }}"
                class="btn btn-sm btn-outline-primary"
                >Rekam</a
            >
        </div>

        <div class="card-body py-2 px-2">
            <div class="table-responsive">
                <table id="example" class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($examples as $example)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $example->name }}</td>
                            <td>
                                <div
                                    class="btn-group"
                                    role="group"
                                    aria-label="Basic example"
                                >
                                    <a
                                        href="{{ route('example.show', $example->id) }}"
                                        class="btn btn-outline-primary btn-sm"
                                        >Detail</a
                                    >
                                    <a
                                        href="{{ route('example.edit', $example->id) }}"
                                        class="btn btn-outline-primary btn-sm"
                                        >Edit</a
                                    >
                                    <form
                                        action="{{ route('example.destroy', $example->id) }}"
                                        method="post"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-outline-primary btn-sm"
                                            onclick="return confirm('Do you want to delete this example?');"
                                        >
                                            Hapus
                                        </button>
                                    </form>
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
    $("#example").dataTable();
    $(".js-example-basic-single").select2();
</script>
@endpush
