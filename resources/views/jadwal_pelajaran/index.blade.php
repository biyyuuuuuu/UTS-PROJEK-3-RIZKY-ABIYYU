{{-- @extends('template_backend.home')
@section('heading', 'Data Jadwal')
@section('page')
  <li class="breadcrumb-item active">Data Jadwal</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
          <h3 class="card-title">
              <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".tambah-jadwal">
                  <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Jadwal
              </button>
              <a href="{{ route('jadwal.export_excel') }}" class="btn btn-success btn-sm my-3" target="_blank"><i class="nav-icon fas fa-file-export"></i> &nbsp; EXPORT EXCEL</a>
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importExcel">
                  <i class="nav-icon fas fa-file-import"></i> &nbsp; IMPORT EXCEL
              </button>
              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dropTable">
                  <i class="nav-icon fas fa-minus-circle"></i> &nbsp; Drop
              </button>
          </h3>
      </div>
      <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form method="post" action="{{ route('jadwal.import_excel') }}" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
              </div>
              <div class="modal-body">
                @csrf
                  <div class="card card-outline card-primary">
                      <div class="card-header">
                          <h5 class="modal-title">Petunjuk :</h5>
                      </div>
                      <div class="card-body">
                          <ul>
                              <li>rows 1 = nama hari</li>
                              <li>rows 2 = nama kelas</li>
                              <li>rows 3 = nama mapel</li>
                              <li>rows 4 = nama guru</li>
                              <li>rows 5 = jam mulai</li>
                              <li>rows 6 = jam selesai</li>
                              <li>rows 7 = nama ruang</li>
                          </ul>
                      </div>
                  </div>
                  <label>Pilih file excel</label>
                  <div class="form-group">
                    <input type="file" name="file" required="required">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Import</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="modal fade" id="dropTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('jadwal.deleteAll') }}">
              @csrf
              @method('delete')
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Sure you drop all data?</h5>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cencel</button>
                  <button type="submit" class="btn btn-danger">Drop</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kelas</th>
                    <th>Lihat Jadwal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_kelas }}</td>
                    <td>
                      <a href="{{ route('jadwal.show', Crypt::encrypt($data->id)) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp; Ditails</a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-lg tambah-jadwal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Tambah Data Jadwal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('jadwal.store') }}" method="post">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="hari_id">Hari</label>
                  <select id="hari_id" name="hari_id" class="form-control @error('hari_id') is-invalid @enderror select2bs4">
                      <option value="">-- Pilih Hari --</option>
                      @foreach ($hari as $data)
                          <option value="{{ $data->id }}">{{ $data->nama_hari }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="kelas_id">Kelas</label>
                  <select id="kelas_id" name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror select2bs4">
                      <option value="">-- Pilih Kelas --</option>
                      @foreach ($kelas as $data)
                          <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="guru_id">Kode Mapel</label>
                  <select id="guru_id" name="guru_id" class="form-control @error('guru_id') is-invalid @enderror select2bs4">
                      <option value="">-- Pilih Kode Mapel --</option>
                      @foreach ($guru as $data)
                          <option value="{{ $data->id }}">{{ $data->kode }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jam_mulai">Jam Mulai</label>
                  <input type='time' id="jam_mulai" name='jam_mulai' class="form-control @error('jam_mulai') is-invalid @enderror" placeholder='JJ:mm:dd'>
                </div>
                <div class="form-group">
                  <label for="jam_selesai">Jam Selesai</label>
                  <input type='time' name='jam_selesai' class="form-control @error('jam_selesai') is-invalid @enderror" placeholder='JJ:mm:dd'>
                </div>
                <div class="form-group">
                  <label for="ruang_id">Ruang Kelas</label>
                  <select id="ruang_id" name="ruang_id" class="form-control @error('ruang_id') is-invalid @enderror select2bs4">
                      <option value="">-- Pilih Ruang Kelas --</option>
                      @foreach ($ruang as $data)
                          <option value="{{ $data->id }}">{{ $data->nama_ruang }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
              <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
          </form>
      </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>
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
                <h1 class="mt-4">Jadwal Pelajaran</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('jadwal.create') }}" class="btn btn-primary">Tambah Jadwal Pelajaran</a>
                        </div>
                        <table id="datatablesSimple" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Hari</th>
                                    <th scope="col">Jam Mulai</th>
                                    <th scope="col">Jam Selesai</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Mata Pelajaran</th>
                                    <th scope="col">Guru</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jadwal_pelajaran as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->hari }}</td>
                                    <td>{{ $item->jam_mulai }}</td>
                                    <td>{{ $item->jam_selesai }}</td>
                                    <td>{{ $item->kelas->nama_kelas }}</td>
                                    <td>{{ $item->mata_pelajaran->nama_pelajaran }}</td>
                                    <td>{{ $item->guru->nama }}</td>
                                    <td>
                                        <a href="{{ route('jadwal.edit', $item->id_jadwal_pelajaran) }}" class="btn btn-warning btn-sm">
                                            <span data-feather="edit"></span> Edit
                                        </a>
                                        <form action="{{ route('jadwal.destroy', $item->id_jadwal_pelajaran) }}" method="post" class="d-inline">
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
                        {{$jadwal_pelajaran->links()}}
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
