@extends('layouts.main')

@section('container')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Absensi</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('absensi.create') }}" class="btn btn-primary">Tambah Absensi</a>
                        </div>
                        <table id="datatablesSimple" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($absensi as $abs)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $abs->siswa->nama }}</td>
                                    <td>{{ $abs->tanggal }}</td>
                                    <td>{{ $abs->keterangan }}</td>
                                    <td>
                                        <a href="{{ route('absensi.edit', $abs->id_absensi) }}" class="btn btn-warning btn-sm">
                                            <span data-feather="edit"></span> Edit
                                        </a>
                                        <form action="{{ route('absensi.destroy', $abs->id_absensi) }}" method="post" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data?')">
                                                <span data-feather="trash-2"></span> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2024</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection
