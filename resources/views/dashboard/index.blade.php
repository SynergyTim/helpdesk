@extends('layout')

@section('title', 'Dashboard')

@section('content')

@if($success = Session::get('success'))
<script>
    const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
});

    Toast.fire({
    icon: "success",
    title: "{{ $success }}"
    });
</script>
@endif

<div class="container">
    <div class="row">
        @if(Auth::user()->role == 'admin')

        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="bi bi-person-fill fa-2x text-white"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Data Keseluruhan</h4>
                    </div>
                    <div class="card-body">
                        1
                    </div>
                </div>
            </div>
        </div>

        @endif
    </div>

    @if(Auth::user()->role == "admin")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Pelaporan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Data Pelaporan</th>
                                    <th>Kategori Pelaporan</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Keluhan</th>
                                    <th>Penanganan</th>
                                    <th>Petugas</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $no = 1;
                                @endphp

                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>

                                {{-- @foreach($dashboard as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                </tr>
                                @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection