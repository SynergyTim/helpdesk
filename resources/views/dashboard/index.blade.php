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
                    <i class="bi bi-clipboard2-fill fa-2x text-white"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Data Keseluruhan</h4>
                    </div>
                    <div class="card-body">
                        {{ $countDataReportings }}
                    </div>
                </div>
            </div>
        </div>

        @elseif(Auth::user()->role == "user")
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="bi bi-clipboard2-fill fa-2x text-white"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Data Dalam Status Open</h4>
                    </div>
                    <div class="card-body">
                        {{ $countOpen }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="bi bi-clipboard2-fill fa-2x text-white"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Data Dalam Status Close</h4>
                    </div>
                    <div class="card-body">
                        {{ $countClose }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="bi bi-clipboard2-fill fa-2x text-white"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Data Keseluruhan</h4>
                    </div>
                    <div class="card-body">
                        {{ $countDataReportings }}
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    @if(Auth::user()->role == "admin" || Auth::user()->role == "user")
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="ml-4">
                    <div class="row mt-3">
                        <div class="col">
                            <h5 class="text-primary">Daftar Pelaporan</h5>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <a href="{{ url('print-helpdesk') }}" class="btn btn-success mb-3" target="_blank">Cetak
                                Data Helpdesk</a>
                        </div>
                    </div>
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

                                @foreach($reportingTable as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->reporter }} </br>

                                        {{ $item->division }} <br />
                                        {{ $item->phone_number }}
                                    </td>
                                    <td>{{ $item->information }}</td>
                                    <td>{{ $item->unit }}</td>
                                    <td>{{ $item->complaint }}</td>
                                    <td>{{ $item->handling }}</td>
                                    <td>{{ $item->officer }}</td>
                                </tr>
                                @endforeach

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