@extends('layouts.main')
@section('container')

<div id="layoutSidenav">

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Mata Pelajaran</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('mata_pelajaran.create') }}" class="btn btn-primary">Tambah Mata Pelajaran</a>
                        </div>
                        <table id="datatablesSimple" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Pelajaran</th>
                                    <th scope="col">Nama Pelajaran</th>
                                    <th scope="col">Tingkat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mata_pelajaran as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_pelajaran }}</td>
                                    <td>{{ $item->nama_pelajaran }}</td>
                                    <td>{{ $item->tingkat }}</td> <!-- Perbaikan disini -->
                                    <td>
                                        <a href="{{ route('mata_pelajaran.edit', $item->id_mata_pelajaran) }}" class="btn btn-warning btn-sm"> <!-- Perbaikan disini -->
                                            <span data-feather="edit"></span> Edit
                                        </a>
                                        <form action="{{ route('mata_pelajaran.destroy', $item->id_mata_pelajaran) }}" method="post" class="d-inline">
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
                        {{$mata_pelajaran->links()}}
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
