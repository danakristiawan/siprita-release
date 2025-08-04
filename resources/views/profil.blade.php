@extends('layouts.app') @section('content')
<div class="page-block mb-2">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="page-header-title">
                <h3 class="f-w-400">Profil</h3>
            </div>
        </div>
    </div>
</div>

<div class="col-md-9">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-1">
                <div class="flex-shrink-0">
                    <img
                        src="../assets/images/avatar-2.jpg"
                        alt="user-image"
                        class="user-avtar wid-75"
                    />
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="mb-1 mt-2">
                        {{ auth()->user()->name }}
                    </h6>
                    <div class="mb-1">198407022003121004</div>
                    <span>{{ auth()->user()->email }}</span>
                </div>
            </div>

            <table class="table table-sm table-hover mt-5">
                <tr>
                    <td>NPWP</td>
                    <td>143622686333000</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>3276110207840003</td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td>081295945300</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>Pranata Komputer Ahli Pertama (Kel. I)</td>
                </tr>
                <tr>
                    <td>Jenis Jabatan</td>
                    <td>Fungsional Tertentu</td>
                </tr>
                <tr>
                    <td>Unit</td>
                    <td>
                        35083503 - Subdirektorat Perancangan dan Integrasi
                        Sistem Aplikasi, Direktorat Transformasi dan Sistem
                        Informasi, Direktorat Jenderal Kekayaan Negara
                    </td>
                </tr>
                <tr>
                    <td>Kode Satker</td>
                    <td>411792</td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>
                        <ul
                            class="list-group list-group-flush list-group-numbered"
                        >
                            @foreach ($user->roles as $role)
                            <li class="list-group-item py-1 px-1">
                                {{ $role->app  }}
                            </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
