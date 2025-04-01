@extends('layout')

@section('title', 'Tambah Kategori')

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
                            <h5 class="text-primary">Tambah Kategori</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('category.store') }}">
                                @csrf
                                <div class="form-group mr-3">
                                    <label for="information">Kategori Laporan</label>
                                    <input type="text" class="form-control border border-danger" id="information"
                                        name="information" autocomplete="off" maxlength="80"
                                        value="{{old('information')}}" required>
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
                                        <option value="">- Pilih Penanggung Jawab -</option>
                                        <option value="2" {{ old('unit_id')=='2' ? 'selected' : '' }}>ICT</option>
                                    </select>
                                </div>

                                @if ($errors->has('unit_id'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('unit_id'))}}
                                </p>
                                @endif

                                <hr />

                                <button type="submit" class="btn btn-success mr-3">Tambah</button>
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