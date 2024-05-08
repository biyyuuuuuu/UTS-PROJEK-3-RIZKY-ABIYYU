{{-- @extends('template_backend.home')
@section('heading', 'Edit Jadwal')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('jadwal.index') }}">Jadwal</a></li>
  <li class="breadcrumb-item active">Edit Jadwal</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Jadwal</h3>
      </div>
      <form action="{{ route('jadwal.store') }}" method="post">
        @csrf
        <div class="card-body">
          <div class="row">
            <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
            <div class="col-md-6">
              <div class="form-group">
                <label for="hari_id">Hari</label>
                <select id="hari_id" name="hari_id" class="form-control @error('hari_id') is-invalid @enderror select2bs4">
                  <option value="">-- Pilih Hari --</option>
                  @foreach ($hari as $data)
                    <option value="{{ $data->id }}"
                      @if ($jadwal->hari_id == $data->id)
                        selected
                      @endif
                    >{{ $data->nama_hari }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="kelas_id">Kelas</label>
                <select id="kelas_id" name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror select2bs4">
                  <option value="">-- Pilih Kelas --</option>
                  @foreach ($kelas as $data)
                  <option value="{{ $data->id }}"
                      @if ($jadwal->kelas_id == $data->id)
                        selected
                      @endif
                    >{{ $data->nama_kelas }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="guru_id">Kode Mapel</label>
                <select id="guru_id" name="guru_id" class="form-control @error('guru_id') is-invalid @enderror select2bs4">
                  <option value="" @if ($jadwal->guru_id)
                    selected
                  @endif>-- Pilih Kode Mapel --</option>
                  @foreach ($guru as $data)
                    <option value="{{ $data->id }}"
                      @if ($jadwal->guru_id == $data->id)
                        selected
                      @endif
                    >{{ $data->kode }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jam_mulai">Jam Mulai</label>
                <input type='time' value="{{ $jadwal->jam_mulai }}" id="jam_mulai" name='jam_mulai' class="form-control @error('jam_mulai') is-invalid @enderror" placeholder='JJ:mm:dd'>
              </div>
              <div class="form-group">
                <label for="jam_selesai">Jam Selesai</label>
                <input type='time' value="{{ $jadwal->jam_selesai }}" name='jam_selesai' class="form-control @error('jam_selesai') is-invalid @enderror" placeholder='JJ:mm:dd'>
              </div>
              <div class="form-group">
                <label for="ruang_id">Ruang Kelas</label>
                <select id="ruang_id" name="ruang_id" class="form-control @error('ruang_id') is-invalid @enderror select2bs4">
                    <option value="">-- Pilih Ruang Kelas --</option>
                    @foreach ($ruang as $data)
                        <option value="{{ $data->id }}"
                          @if ($jadwal->ruang_id == $data->id)
                            selected
                          @endif
                        >{{ $data->nama_ruang }}</option>
                    @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <a href="#" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
          <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#back').click(function() {
        window.location="{{ route('jadwal.show', Crypt::encrypt($jadwal->kelas_id)) }}";
        });
    });
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataJadwal").addClass("active");
</script>
@endsection --}}


@extends('layouts.main')
@section('container')
    <div id="layoutSidenav">

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Update Jadwal Pelajaran</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('jadwal.update', $jadwal->id_jadwal_pelajaran) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label for="hari" class="form-label">Hari</label>
                                    <select name="hari" id="hari" value="{{ old('hari', $jadwal->hari) }}"
                                        class="form-control @error('hari') is-invalid @enderror">
                                        <option value="">-- Pilih Hari --</option>
                                        @foreach ($hari as $d)
                                            <option value="{{ $d }}"
                                                @if (old('hari', $jadwal->hari) == $d) selected @endif>{{ $d }}
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
                                        value="{{ old('jam_mulai', $jadwal->jam_mulai) }}" placeholder="Jam Mulai">
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
                                        value="{{ old('jam_selesai', $jadwal->jam_selesai) }}" placeholder="Jam Selesai">
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
                                        value="{{ old('kelas_id', $jadwal->kelas_id) }}">
                                        <option value="">-- Pilih Kelas --</option>
                                        @foreach ($kelas as $data)
                                            <option value="{{ $data->id_kelas }}"
                                                @if (old('kelas_id', $jadwal->kelas_id) == $data->id_kelas) selected @endif>{{ $data->nama_kelas }}
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
                                        value="{{ old('mata_pelajaran_id', $jadwal->mata_pelajaran_id) }}">
                                        <option value="">-- Pilih Mata Pelajaran --</option>
                                        @foreach ($mata_pelajaran as $data)
                                            <option value="{{ $data->id_mata_pelajaran }}"
                                                @if (old('mata_pelajaran_id', $jadwal->mata_pelajaran_id) == $data->id_mata_pelajaran) selected @endif>
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
                                        value="{{ old('guru_id', $jadwal->guru_id) }}">
                                        <option value="">-- Pilih Guru --</option>
                                        @foreach ($guru as $data)
                                            <option value="{{ $data->id_guru }}"
                                                @if (old('guru_id', $jadwal->guru_id) == $data->id_guru) selected @endif>{{ $data->nama }}
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
