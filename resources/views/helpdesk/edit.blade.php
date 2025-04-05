@extends('layout')

@section('title', 'Edit Helpdesk')

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
                            <h5 class="text-primary">Edit Tiket</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('helpdesk.update', $ticket->id) }}">
                                @csrf

                                @method('PUT')
                                <div class="form-group mr-3">
                                    <label for="status">Status</label>
                                    <select class="form-control border border-danger" id="status" name="status"
                                        required>
                                        <option value="" selected>-- Pilih Status --</option>
                                        <option value="open">Open</option>
                                        <option value="close">Close</option>
                                    </select>
                                </div>

                                @if ($errors->has('status'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('status'))}}
                                </p>
                                @endif

                                <div class="form-group mr-3">
                                    <label for="handling">Penanganan</label>
                                    <textarea class="form-control border border-danger" id="handling" name="handling"
                                        autocomplete="off" style="height:100px;" required></textarea>
                                </div>

                                @if ($errors->has('handling'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('handling'))}}
                                </p>
                                @endif

                                <div class="form-group mr-3">
                                    <label for="officer">Petugas</label>
                                    <input type="text" class="form-control border border-danger" id="officer"
                                        name="officer" autocomplete="off" required>
                                </div>

                                @if ($errors->has('officer'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('officer'))}}
                                </p>
                                @endif

                                <div class="form-group mr-3">
                                    <label for="updated_at">Close Date</label>
                                    <input type="datetime-local" class="form-control border border-danger"
                                        id="updated_at" name="updated_at" autocomplete="off" required>
                                </div>

                                @if ($errors->has('updated_at'))
                                <p class="mt-3" style="font-size: 15px; color:red;"><i
                                        class="bi bi-exclamation-octagon-fill"></i>
                                    {{ucfirst($errors->first('updated_at'))}}
                                </p>
                                @endif

                                <button type="submit" class="btn btn-success mr-3">Ubah</button>
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