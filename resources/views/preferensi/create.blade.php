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
                action="{{ route('preferensi.store') }}"
                method="POST"
                id="myForm"
            >
                @csrf
                <div class="mb-3">
                    <label for="uraian" class="form-label">Uraian</label>
                    <input
                        type="text"
                        name="uraian"
                        class="form-control @error('uraian') is-invalid @enderror"
                        id="uraian"
                        value="{{ old('uraian') }}"
                    />
                    @error('uraian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row">
                    @for ($i = 1; $i <= 5; $i++)
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label fw-bold"
                            >Preferensi {{ $i }}
                            <span class="text-danger">*</span></label
                        >
                        <select
                            name="kategori[]"
                            class="form-select select2 kategori"
                            data-index="{{ $i }}"
                            required
                        >
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">
                                Kategori {{ $kategori->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label fw-bold"
                            >Unit {{ $i }}
                            <span class="text-danger">*</span></label
                        >
                        <select
                            name="satker[]"
                            class="form-select select2 satker"
                            required
                        >
                            <option value="">-- Pilih Unit --</option>
                        </select>
                    </div>
                    @endfor
                </div>

                <button type="submit" class="btn btn-primary" id="btnSimpan">
                    Simpan
                </button>
                <a
                    href="{{ route('preferensi.index') }}"
                    class="btn btn-primary test"
                    >Batal</a
                >
            </form>
        </div>
    </div>
</div>

@endsection @push('js')
<script type="module">
    $(".kategori").select2();
    $(".satker").select2();
    $(".test").click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('preferensi.index') }}",
            type: "GET",
            data: { action: "view" },
            success: function (response) {
                console.log(response);
            },
        });
    });
</script>
@endpush
