@extends('layouts.app') @section('content')

<div class="page-block mb-2">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="page-header-title">
                <h3 class="f-w-400">Halaman Rekam</h3>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <form
                action="{{ route('example.store') }}"
                method="POST"
                id="myForm"
            >
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        value="{{ old('name') }}"
                    />
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" id="btnSimpan">
                    Simpan
                </button>
                <a href="{{ route('example.index') }}" class="btn btn-primary"
                    >Batal</a
                >
            </form>
        </div>
    </div>
</div>

@endsection @push('js')
<script type="module">
    $(".js-example-basic-single").select2();
</script>
@endpush
