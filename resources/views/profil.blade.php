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
                        src="{{ $userInfo->gravatar }}"
                        alt="user-image"
                        class="user-avtar wid-75"
                    />
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="mb-1 mt-2">
                        {{ $user->name }}
                    </h6>
                    <div class="mb-1">{{ $userInfo->nip }}</div>
                    <span>{{ $user->email }}</span>
                </div>
            </div>

            <table class="table table-sm table-hover mt-5">
                <tr>
                    <td>NPWP</td>
                    <td>{{ $userInfo->g2c_Npwp }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>{{ $userInfo->g2c_Nik }}</td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td>{{ $userInfo->phone_number }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>{{ $userInfo->jabatan }}</td>
                </tr>
                <tr>
                    <td>Jenis Jabatan</td>
                    <td>{{ $userInfo->jenis_jabatan }}</td>
                </tr>
                <tr>
                    <td>Unit</td>
                    <td>
                        {{ $userInfo->kode_organisasi }} -
                        {{ $userInfo->organisasi }}
                    </td>
                </tr>
                <tr>
                    <td>Kode Satker</td>
                    <td>{{ $userInfo->kode_satker }}</td>
                </tr>
                <tr>
                    <td>Id Token</td>
                    <td>{{ $id_token }}</td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>
                        <ul
                            class="list-group list-group-flush list-group-numbered"
                        >
                            @foreach ($user->roles as $role)
                            <li class="list-group-item py-1 px-1">
                                {{ $role->name  }}
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
