@extends('auth.layout')

@section('title', 'Login')

@section('content')

<div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="card" style="border-top: 3px solid red;">

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

            <div class="card-body">
                <h4 class="text-center" style="color: red;">Login</h4>

                @if($logout = Session::get('logout'))
                <div class="alert alert-success text-center" role="alert">
                    {{ $logout }}
                </div>

                @elseif($error = Session::get('error'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ $error }}
                </div>

                @endif

                <form method="POST" action="{{url('login-process')}}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" tabindex="1" autocomplete="off" value="{{old('email')}}" required>

                        @if ($errors->has('email'))
                        <p class="mt-3" style="font-size: 15px; color:red;"><i
                                class="bi bi-exclamation-octagon-fill"></i>
                            {{ucfirst($errors->first('email'))}}
                        </p>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                        </div>

                        <div class="input-group mb-3">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror password" name="password"
                                tabindex="2" autocomplete="off" value="{{old('password')}}" required>
                            <div class="input-group-prepend">
                                <span class="input-group-text containerIcon">
                                    <i class="bi bi-eye-slash-fill icon" style="font-size: 18px;"></i>
                                </span>
                            </div>
                        </div>

                        @if ($errors->has('password'))
                        <p class="mt-3" style="font-size: 15px; color:red;"><i
                                class="bi bi-exclamation-octagon-fill"></i>
                            {{ucfirst($errors->first('password'))}}
                        </p>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                id="remember-me" @if(old('remember')) checked @endif>
                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-block login"
                            style="background-color: red; color:white;" tabindex="4">
                            Login
                        </button>

                        <button class="btn btn-lg btn-block loading d-none" style="background-color: red; color:white;"
                            type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection