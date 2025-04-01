@extends('layout')

@section('title', 'Tambah Helpdesk')

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
                            <h5 class="text-primary">Tambah Helpdesk</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('helpdesk.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mr-3">
                                    <label for="reporter">Nama Pelapor</label>
                                    <input type="text" class="form-control border border-danger" id="reporter"
                                        name="reporter" autocomplete="off" value="{{old('reporter')}}">
                                </div>

                                @if ($errors->has('reporter'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('reporter'))}}
                                </p>
                                @endif

                                <div class="form-group mr-3">
                                    <label for="division">Division</label>
                                    <input type="text" class="form-control border border-danger" id="division"
                                        name="division" autocomplete="off" value="{{old('division')}}">
                                </div>

                                @if ($errors->has('division'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('division'))}}
                                </p>
                                @endif

                                <div class="form-group mr-3">
                                    <label for="phone_number">No Telepon</label>
                                    <input type="number" class="form-control border border-danger" id="phone_number"
                                        name="phone_number" autocomplete="off" value="{{old('phone_number')}}">
                                </div>

                                @if ($errors->has('phone_number'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('phone_number'))}}
                                </p>
                                @endif

                                <div class="form-group mr-3">
                                    <label for="category_id">Kendala</label>
                                    <select class="form-control border border-danger" id="category_id"
                                        name="category_id" required>
                                        <option value="" selected>- Pilih Kendala -</option>
                                        @foreach($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->information }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @if ($errors->has('status'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('status'))}}
                                </p>
                                @endif

                                <div class="form-group mr-3">
                                    <label for="unit_id">Akan Di Sampaikan Ke Bagian</label>
                                    <select class="form-control border border-danger" id="unit_id" name="unit_id"
                                        required>
                                        <option value="" selected>- Pilih Bagian -</option>
                                        @foreach($units as $item)
                                        <option value="{{ $item->id }}">{{ $item->unit }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @if ($errors->has('status'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('status'))}}
                                </p>
                                @endif

                                <div class="form-group mr-3">
                                    <label for="complaint">Keluhan</label>
                                    <textarea class="form-control border border-danger" id="complaint" name="complaint"
                                        autocomplete="off" style="height:100px;">{{old('complaint')}}</textarea>
                                </div>

                                @if ($errors->has('complaint'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('complaint'))}}
                                </p>
                                @endif

                                <div class="form-group mr-3">
                                    <label for="photo">Upload file</label>
                                    <input type="file" class="form-control mb-3" autocomplete="off" name="photo">
                                </div>

                                @if ($errors->has('photo'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('photo'))}}
                                </p>

                                @else
                                <i>* Upload file jika ingin mengupload file gambar</i>
                                @endif

                                <hr />

                                <button type="submit" class="btn btn-success mr-3">Tambah</button>
                                <a href="{{url('helpdesk')}}" class="btn btn-danger">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection