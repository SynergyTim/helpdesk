@extends('layout')

@section('title', 'Tambah Unit')

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
                            <h5 class="text-primary">Tambah User</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('users.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control border border-danger" maxlength="50"
                                        id="name" name="name" autocomplete="off" value="{{old('name')}}">
                                </div>

                                @if ($errors->has('name'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('name'))}}
                                </p>
                                @endif

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control border border-danger" id="email"
                                        name="email" autocomplete="off" value="{{old('email')}}" required>
                                </div>

                                @if ($errors->has('email'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('email'))}}
                                </p>
                                @endif

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control border border-danger" id="password"
                                        name="password" autocomplete="off" value="{{old('password')}}" required>
                                </div>

                                @if ($errors->has('password'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('password'))}}
                                </p>
                                @endif

                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" class="form-control border border-danger"
                                        id="password_confirmation" name="password_confirmation" autocomplete="off"
                                        value="{{old('password_confirmation')}}" required>
                                </div>

                                @if ($errors->has('password_confirmation'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('password_confirmation'))}}
                                </p>
                                @endif

                                <div class="form-group">
                                    <label for="unit_id">Unit</label>
                                    <select class="form-control border border-danger" id="unit_id" name="unit_id"
                                        required>
                                        <option value="" selected>- Pilih Unit -</option>
                                        <option value="2" {{ old('unit_id')==1 ? 'selected' : '' }}>ICT</option>
                                    </select>
                                </div>

                                @if ($errors->has('unit_id'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('unit_id'))}}
                                </p>
                                @endif

                                <div class="form-group">
                                    <label for="role">Level</label>
                                    <select class="form-control border border-danger" id="role" name="role" required>
                                        <option value="" selected>- Pilih Level -</option>
                                        <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="user" {{ old('role')=='user' ? 'selected' : '' }}>User</option>
                                    </select>
                                </div>

                                @if ($errors->has('role'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('role'))}}
                                </p>
                                @endif

                                <hr />

                                <button type="submit" class="btn btn-success mr-3">Tambah</button>
                                <a href="{{url('users')}}" class="btn btn-danger">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection