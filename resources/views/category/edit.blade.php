@extends('layout')

@section('title', 'Update Kategori')

@section('content')

<div class="container">

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

    @elseif($error = Session::get('error'))
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
        icon: "error",
        title: "{{ $error }}"
        });
    </script>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card shadow p-3 mb-5 bg-white rounded mt-3">

                <div class="ml-4">
                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <h5 class="text-primary">Update Kategori</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('category.update', $data->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group mr-3">
                                    <label for="information">Kategori Laporan</label>
                                    <input type="text" class="form-control border border-danger" id="information"
                                        name="information" autocomplete="off" maxlength="80"
                                        value="{{$data->information}}" required>
                                </div>

                                @if ($errors->has('information'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('information'))}}
                                </p>
                                @endif

                                <div class="form-group mr-3">
                                    <label for="unit_id">Unit Penanggung Jawab</label>
                                    <select class="form-control border border-danger" id="unit_id" name="unit_id"
                                        required>
                                        <option value="{{ $data->unit_id }}" selected>ICT</option>
                                    </select>
                                </div>

                                @if ($errors->has('unit_id'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('unit_id'))}}
                                </p>
                                @endif

                                <hr />

                                <button type="submit" class="btn btn-warning mr-3">Update</button>
                                <a href="{{url('category')}}" class="btn btn-danger">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection