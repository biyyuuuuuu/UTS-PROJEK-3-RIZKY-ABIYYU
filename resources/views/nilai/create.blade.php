@extends('layouts.main')

@section('container')
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Nilai</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('nilai.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="siswa_id" class="form-label">Siswa</label>
                                    <select class="form-select" name="siswa_id" id="siswa_id"
                                        value="{{ old('siswa_id') }}">
                                        @foreach ($siswa as $item)
                                            <option value="{{ $item->id_siswa }}"
                                                @if (old('siswa_id') == $item->id_siswa) selected @endif>{{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('siswa_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="mata_pelajaran_id" class="form-label">Mata Pelajaran</label>
                                    <select class="form-select @error('mata_pelajaran_id') is-invalid @enderror"
                                        name="mata_pelajaran_id" id="mata_pelajaran_id"
                                        value="{{ old('mata_pelajaran_id') }}">
                                        @foreach ($mata_pelajaran as $item)
                                            <option value="{{ $item->id_mata_pelajaran }}">{{ $item->nama_pelajaran }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('mata_pelajaran_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nilai" class="form-label">Nilai</label>
                                    <input type="number" class="form-control @error('nilai') is-invalid @enderror"
                                        name="nilai" id="nilai" placeholder="Masukkan Nilai" required
                                        value="{{ old('nilai') }}">
                                    @error('nilai')
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
