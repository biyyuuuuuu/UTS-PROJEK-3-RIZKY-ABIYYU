@extends('layouts.main')

@section('container')
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Absensi</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('absensi.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="id_siswa"
                                        class="form-label @error('id_siswa') is-invalid                                        
                                    @enderror ">Siswa</label>
                                    <select class="form-select @error('id_siswa') is-invalid @enderror" name="id_siswa" id="id_siswa"
                                        value="{{ old('id_siswa') }}">
                                        <option selected>Pilih Siswa</option>
                                        @foreach ($siswa as $s)
                                            <option
                                                value="{{ $s->id_siswa }}" @if (old('id_siswa') == $s->id_siswa) selected @endif>
                                                {{ $s->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_siswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal"
                                        class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                        value="{{ old('tanggal') }}">
                                    @error('tanggal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan"
                                        class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                        value="{{ old('keterangan') }}" placeholder="Masukkan Keterangan">
                                    @error('keterangan')
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
