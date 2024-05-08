@extends('layouts.main')
@section('container')
    <div id="layoutSidenav">

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Kelas</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('kelas.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="kode_kelas" class="form-label">Kode Kelas</label>
                                    <input type="text" name="kode_kelas"
                                        class="form-control @error('kode_kelas') is-invalid @enderror" id="kode_kelas"
                                        name="kode_kelas" placeholder="Masukkan Kode Kelas">
                                    @error('kode_kelas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                                    <input type="text"
                                        name="nama_kelas"class="form-control @error('nama_kelas') is-invalid @enderror"
                                        id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas">
                                    @error('nama_kelas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tingkat" class="form-label">Tingkat</label>
                                    <input type="text" name="tingkat"
                                        class="form-control @error('tingkat') is-invalid @enderror" id="tingkat"
                                        name="tingkat" placeholder="Masukkan Tingkat Kelas">
                                    @error('tingkat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="wali_kelas_id" class="form-label">Wali Kelas</label>
                                    <select id="wali_kelas_id" class="form-control @error('wali_kelas_id') is-invalid @enderror"
                                        name="wali_kelas_id">
                                        <option value="">-- Pilih Wali Kelas --</option>
                                        @foreach ($guru as $data)
                                            <option value="{{ $data->id_guru }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('wali_kelas_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
