@extends('layouts.main')
@section('container')

<div id="layoutSidenav">

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">kelas</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('kelas.create') }}" class="btn btn-primary">Tambah kelas</a>
                        </div>
                        <table id="datatablesSimple" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Kelas</th>
                                    <th scope="col">Nama Kelas</th>
                                    <th scope="col">Tingkat</th>
                                    <th scope="col">Wali Kelas</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kelas as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_kelas }}</td>
                                    <td>{{ $item->nama_kelas }}</td>
                                    <td>{{ $item->tingkat }}</td>
                                    <td>{{ $item->wali_kelas->nama }}</td>
                                    <td>
                                        <a href="{{ route('kelas.edit', $item->id_kelas) }}" class="btn btn-warning btn-sm">
                                            <span data-feather="edit"></span> Edit
                                        </a>
                                        <form action="{{ route('kelas.destroy', $item->id_kelas) }}" method="post" class="d-inline">
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
                        {{$kelas->links()}}
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
