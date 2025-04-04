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
                            <form method="post" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mr-3">
                                    <label for="reporter">Status</label>
                                    <select class="form-control border border-danger" id="reporter" name="reporter">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Mahasiswa">Mahasiswa</option>
                                        <option value="Dosen">Dosen</option>
                                    </select>
                                </div>


                                <div class="form-group mr-3">
                                    <label for="complaint">Penanganan</label>
                                    <textarea class="form-control border border-danger" id="complaint" name="complaint"
                                        autocomplete="off" style="height:100px;"></textarea>
                                </div>

                                <div class="form-group mr-3">
                                    <label for="reporter">Petugas</label>
                                    <input type="text" class="form-control border border-danger" id="reporter"
                                        name="reporter" autocomplete="off" >
                                </div>

                                <div class="form-group mr-3">
                                    <label for="close_date">Close Date</label>
                                    <input type="datetime-local" class="form-control border border-danger" id="close_date" name="close_date" autocomplete="off">
                                </div>


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
