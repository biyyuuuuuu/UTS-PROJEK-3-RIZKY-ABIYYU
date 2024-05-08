@extends('layouts.main')
@section('container')

<div id="layoutSidenav">

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4"> Tambah Mata Pelajaran</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{route('mata_pelajaran.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="kode_pelajaran" class="form-label">Kode Pelajaran</label>
                                <input type="text" name="kode_pelajaran" class="form-control" id="kode_pelajaran" placeholder="Masukkan kode_pelajaran">
                            </div>
                            <div class="mb-3">
                                <label for="nama_pelajaran" class="form-label">Nama Pelajaran</label>
                                <input type="text" name="nama_pelajaran" class="form-control" id="nama_pelajaran" placeholder="Masukkan Nama pelajaran">
                            </div>
                            <div class="mb-3">
                                <label for="tingkat" class="form-label">Tingkat</label>
                                <textarea class="form-control" name="tingkat" id="tingkat" rows="3" placeholder="Masukkan Tingkat"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
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
