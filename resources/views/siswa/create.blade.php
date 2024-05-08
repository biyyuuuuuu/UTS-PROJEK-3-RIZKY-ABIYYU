@extends('layouts.main')
@section('container')
    <div id="layoutSidenav">

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"> Tambah Siswa</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('siswa.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="nis" class="form-label">Nis</label>
                                    <input type="text" name="nis"
                                        class="form-control @error('nis') is-invalid @enderror" id="nis"
                                        placeholder="Masukkan Nis" value="{{ old('nis') }}">

                                    @error('nis')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Masukkan Nama" value="{{ old('nama') }}">

                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3"
                                        placeholder="Masukkan Alamat">{{ old('alamat') }}</textarea>

                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin"
                                        class="form-label @error('jenis_kelamin') is-invalid @enderror">Jenis
                                        Kelamin</label>
                                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                                        <option selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" @if (old('jenis_kelamin') == 'Laki-laki') selected @endif>
                                            Laki-laki</option>
                                        <option value="Perempuan" @if (old('jenis_kelamin') == 'Perempuan') selected @endif>
                                            Perempuan</option>
                                    </select>

                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                                        value="{{ old('tanggal_lahir') }}">

                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <input type="text" name="kelas"
                                        class="form-control @error('kelas') is-invalid @enderror" id="kelas"
                                        placeholder="Masukkan Kelas" value="{{ old('kelas') }}">

                                    @error('kelas')
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
