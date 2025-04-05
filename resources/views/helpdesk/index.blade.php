@extends('layout')

@section('title', 'Helpdesk')

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
        <div class="col-12">
            <div class="card">

                <div class="ml-4">
                    <div class="row mt-3">
                        <div class="col">
                            <h5 class="text-primary">Menu Helpdesk</h5>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <a href="{{ route('helpdesk.create') }}" class="btn btn-success mb-3"><i
                                    class="bi bi-plus-circle-fill"></i> Tambah</a>
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
                                    <th>Status</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Keluhan</th>
                                    <th>Foto Kendala</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $no = 1;
                                @endphp

                                @foreach($reporting as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->reporter }} </br>

                                        {{ $item->division }} <br />
                                        {{ $item->phone_number }}
                                    </td>
                                    <td>{{ $item->information }}</td>
                                    <td>

                                        @if($item->status == 'open')
                                        <span class="badge badge-success">Open</span>

                                        @elseif($item->status == 'close')
                                        <span class="badge badge-danger">Close</span>

                                        @else
                                        -
                                        @endif

                                    </td>
                                    <td>{{ $item->unit }}</td>
                                    <td>{{ $item->complaint }}</td>

                                    <td>
                                        @if ($item->photo != null)
                                        <img src="{{ asset('assets/img/uploads/' . $item->photo) }}"
                                            style="width: 150px; height: 150px;">
                                        @else
                                        -
                                        @endif
                                    </td>

                                    <td class="d-flex justify-content-center">

                                        <a href="{{ route('helpdesk.edit', $item->id) }}" class="btn btn-primary"><i
                                                class="bi bi-pencil-fill mx-1"></i>Edit
                                            Ticket</a>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection