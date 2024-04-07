@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Official | Setting
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Official</h3>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td rowspan="5">
                    <a href="{{ asset('storage/foto-official/' . $official->foto_official) }}" target="_blank">
                        <img src="{{ asset('storage/foto-official/' . $official->foto_official) }}" alt="foto"
                            srcset="" width="100px"></a>
                </td>
                <td>Username</td>
                <td>: {{ $official->username }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: {{ $official->name }}</td>
            </tr>
            <tr>
                <td>No. Whatsapp</td>
                <td>: {{ $official->no_wa }}</td>
            </tr>
            <tr>
                <td>Nama Kontingen</td>
                <td>: {{ $kontingen->nama_kontingen }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $kontingen->alamat }}</td>
            </tr>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editUser">Edit</button>
    </div>

    <!-- Modal edit user -->
    <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="foto_official_lama" value="{{ $official->foto_official }}">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $official->name }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_wa" class="col-sm-2 col-form-label">No WhatsApp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="no_wa" name="no_wa"
                                    value="{{ $official->no_wa }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kontingen" class="col-sm-2 col-form-label">Kontingen</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kontingen" name="kontingen"
                                    value="{{ $kontingen->nama_kontingen }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $kontingen->alamat }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="foto_official" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control form-control-sm" id="foto_official"
                                    name="foto_official">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- /konten --}}
@section('sweetalert')
    <script>
        const hapus = document.getElementById('hapus')
        hapus.addEventListener('click', function() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            })
        })
    </script>
@endsection
