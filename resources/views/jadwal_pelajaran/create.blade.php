@extends('layouts.main')
@section('container')
    <div id="layoutSidenav">

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Jadwal Pelajaran</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('jadwal.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="hari" class="form-label">Hari</label>
                                    <select name="hari" id="hari" value="{{ old('hari') }}"
                                        class="form-control @error('hari') is-invalid @enderror">
                                        <option value="">-- Pilih Hari --</option>
                                        @foreach ($hari as $d)
                                            <option value="{{ $d }}"
                                                @if (old('hari') == $d) selected @endif>{{ $d }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('hari')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                    <input type="time" name="jam_mulai" id="jam_mulai"
                                        class="form-control @error('jam_mulai') is-invalid @enderror"
                                        value="{{ old('jam_mulai') }}" placeholder="Jam Mulai">
                                    @error('jam_mulai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                    <input type="time" name="jam_selesai" id="jam_selesai"
                                        class="form-control @error('jam_selesai') is-invalid @enderror"
                                        value="{{ old('jam_selesai') }}" placeholder="Jam Selesai">
                                    @error('jam_selesai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="kelas_id" class="form-label">Kelas</label>
                                    <select name="kelas_id" id="kelas_id"
                                        class="form-control @error('kelas_id') is-invalid @enderror"
                                        value="{{ old('kelas_id') }}">
                                        <option value="">-- Pilih Kelas --</option>
                                        @foreach ($kelas as $data)
                                            <option value="{{ $data->id_kelas }}"
                                                @if (old('kelas_id') == $data->id_kelas) selected @endif>{{ $data->nama_kelas }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kelas_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="mata_pelajaran_id" class="form-label">Mata Pelajaran</label>
                                    <select name="mata_pelajaran_id" id="mata_pelajaran_id"
                                        class="form-control @error('mata_pelajaran_id') is-invalid @enderror"
                                        value="{{ old('mata_pelajaran_id') }}">
                                        <option value="">-- Pilih Mata Pelajaran --</option>
                                        @foreach ($mata_pelajaran as $data)
                                            <option value="{{ $data->id_mata_pelajaran }}"
                                                @if (old('mata_pelajaran_id') == $data->id_mata_pelajaran) selected @endif>
                                                {{ $data->nama_pelajaran }}</option>
                                        @endforeach
                                    </select>
                                    @error('mata_pelajaran_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="guru_id" class="form-label">Guru</label>
                                    <select name="guru_id" id="guru_id"
                                        class="form-control @error('guru_id') is-invalid @enderror"
                                        value="{{ old('guru_id') }}">
                                        <option value="">-- Pilih Guru --</option>
                                        @foreach ($guru as $data)
                                            <option value="{{ $data->id_guru }}"
                                                @if (old('guru_id') == $data->id_guru) selected @endif>{{ $data->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('guru_id')
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
