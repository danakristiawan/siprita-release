@extends('layouts.app') @section('content')

<div class="page-block mb-2">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="page-header-title">
                <h3 class="f-w-400">Halaman Detail</h3>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    id="name"
                    value="{{ $example->name }}"
                    disabled
                />
            </div>
            <a href="{{ route('example.index') }}" class="btn btn-primary"
                >Batal</a
            >
        </div>
    </div>
</div>

@endsection
