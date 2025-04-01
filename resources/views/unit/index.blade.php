@extends('layout')

@section('title', 'Unit')

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
                            <h5 class="text-primary">Menu Unit</h5>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <a href="{{ route('unit.create') }}" class="btn btn-success mb-3"><i
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
                                    <th>Nama Unit</th>
                                    <th>Update Unit</th>
                                    <th>Delete Unit</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $no = 1;
                                @endphp

                                @foreach($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->unit }}</td>
                                    <td>

                                        <a href="{{ route('unit.edit', $item->id) }}" class="btn btn-warning">
                                            <i class="bi bi-pencil-fill mx-1"></i>Update
                                            Unit
                                        </a>
                                    </td>

                                    <td>
                                        <form action="{{ route('unit.destroy', $item->id) }}" method="post"
                                            class="form-unit-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btnHapusUnit"><i
                                                    class="bi bi-trash-fill mx-1"></i>Delete
                                                Unit
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