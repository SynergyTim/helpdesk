@extends('layout')

@section('title', 'Update Unit')

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
                            <h5 class="text-primary">Update Unit</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('unit.update', $data->id) }}">
                                @csrf

                                @method('PUT')
                                <div class="form-group mr-3">
                                    <label for="unit">Unit</label>
                                    <input type="text" class="form-control border border-danger" id="unit" name="unit"
                                        autocomplete="off" value="{{ $data->unit }}">
                                </div>

                                @if ($errors->has('unit'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('unit'))}}
                                </p>
                                @endif

                                <hr />

                                <button type="submit" class="btn btn-warning mr-3">Update</button>
                                <a href="{{url('unit')}}" class="btn btn-danger">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection