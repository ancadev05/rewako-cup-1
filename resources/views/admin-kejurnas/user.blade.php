@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Admin | Dashboard
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">User</h3>
    <div class="alert alert-info border-0 border-start border-5 border-info shadow">
        <span>Menghapus atau mengubah user akan membuat data atele yang berhubungan dengan user tersebut bermasalah bahkan
            hilang</span>
    </div>

    <div class="mb-2 d-flex justify-content-end">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUser">Tambah User <i
                class="fa fa-plus ms-2"></i></button>
    </div>

    <div class="shadow p-2 border rounded">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover">
                <thead class="text-center ">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>No. WA</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->no_wa }}</td>
                            <td class="text-center">
                                {{-- <a href="{{ url('/setting/' . $item->username) }}" class="btn btn-warning"
                                    style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"
                                    ><i class="fas fa-edit"></i></a> --}}
                                <form action="{{ url('admin-kejurnas/user/' . $item->username) }}" method="post" onsubmit="return confirm('Yakin ingin hapus User?')" id="hapus">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger"
                                        style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal tambah user -->
    <div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_wa" class="col-sm-2 col-form-label">No WhatsApp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="no_wa" name="no_wa">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kontingen" class="col-sm-2 col-form-label">Kontingen</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kontingen" name="kontingen">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal tambah user -->

    {{-- modal edit user --}}
    <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_wa" class="col-sm-2 col-form-label">No WhatsApp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="no_wa" name="no_wa">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kontingen" class="col-sm-2 col-form-label">Kontingen</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kontingen" name="kontingen">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat">
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
    {{-- /modal edit user --}}
@endsection {{-- /konten --}}
