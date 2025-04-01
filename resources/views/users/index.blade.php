@extends('layout')

@section('title', 'User')

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
                            <h5 class="text-primary">Menu Users</h5>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <a href="{{ route('users.create') }}" class="btn btn-success mb-3"><i
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
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Type</th>
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
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->unit }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning mr-3"><i
                                                class="bi bi-pencil-fill mx-1"></i>Update
                                            User
                                        </a>

                                        <form action="{{ route('users.destroy', $item->id) }}" method="post"
                                            class="form-user-delete">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button" class="btn btn-danger btnHapusUser"><i
                                                    class="bi bi-trash-fill mx-1"></i>Delete
                                                User
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

    <!-- Modal Update Unit-->
    {{-- <div class="modal fade" id="updateUnitModal" tabindex="-1" aria-labelledby="updateUnitModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateUnitModalLabel">Modal Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{url('unit-update-process')}}">
                    <div class="modal-body">
                        @csrf

                        <input type="hidden" name="unit_id" id="unit_id">
                        <div class="form-group">
                            <label for="unit">Nama Unit</label>
                            <input type="text" class="form-control mb-3 border border-danger unitUpdateInput"
                                autocomplete="off" id="unit" name="unit" maxlength="50" required>
                        </div>

                        @if ($errors->has('unit'))
                        <p class="mt-3" style="font-size: 15px; color:red;"><i
                                class="bi bi-exclamation-octagon-fill"></i>
                            {{ucfirst($errors->first('unit'))}}
                        </p>
                        @endif

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

</div>

@endsection