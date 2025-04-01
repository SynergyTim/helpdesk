@extends('layout')

@section('title', 'Category')

@section('content')

@if($success = Session::get('success'))

<script>
    Swal.fire({
      title: "Berhasil",
      text: "{{ $success }}",
      icon: "success"
    });
</script>

@elseif($error = Session::get('error'))

<script>
    Swal.fire({
      title: "Error",
      text: "{{ $error }}",
      icon: "error"
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
                            <h5 class="text-primary">Menu Kategori</h5>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <a href="{{ route('category.create') }}" class="btn btn-success mb-3"><i
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
                                    <th class="text-center">Kategori Pengaduan</th>
                                    <th class="text-center">Unit Penanggung Jawab</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $no = 1;
                                @endphp

                                @foreach($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->information }}</td>
                                    <td>{{ $item->unit }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('category.edit', $item->id) }}"
                                            class="btn btn-warning mr-3"><i class="bi bi-pencil-fill mx-1"></i>Update
                                            Kategori
                                        </a>

                                        <form action="{{ route('category.destroy', $item->id) }}" method="post"
                                            class="form-category-delete">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button" class="btn btn-danger btnHapusCategory"><i
                                                    class="bi bi-trash-fill mx-1"></i>Delete
                                                Kategori
                                            </button>
                                        </form>
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