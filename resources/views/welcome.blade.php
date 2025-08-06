@extends('layouts.app')@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h2 class="f-w-400 mb-4">Hai!, Selamat Datang di Siprita.</h2>
                <h4 class="f-w-200">
                    Alat-bantu Penatausahaan Internal Kesekretariatan.
                </h4>
                <p class="text-muted mb-5">
                    Kami sangat bersemangat untuk meluncurkan alat-bantu ini.
                    Setelah mendengarkan beberapa masukan dan kemungkinan jenis
                    pekerjaan yang bisa kami atasi, kami tahu bahwa APIK akan
                    menjadi solusi. Kami juga senang mendengarkan saran Anda,
                    untuk berbagi pengalaman dengan para pengembang kami.
                </p>
                <div>
                    <a
                        class="btn btn-sm btn-primary rounded-pill px-2"
                        role="button"
                        href="{{ route('redirect') }}"
                    >
                        <i class="ti ti-external-link me-1"></i>
                        Masuk menggunakan SSO Kemenkeu
                    </a>
                    <a
                        class="btn btn-sm btn-primary rounded-pill px-2"
                        role="button"
                        href="{{ route('login') }}"
                    >
                        <i class="ti ti-external-link me-1"></i>
                        Masuk Manual
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
