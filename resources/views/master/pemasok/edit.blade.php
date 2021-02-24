@extends('template')
@section('title', 'Edit Pemasok')
@section('content')

<section class="content pt-2">
  <div class="row">
    <div class="col-12">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">@yield('title')</h3>
          <div class="float-right">
            <a href="/pemasok" class="btn btn-warning btn-sm">Kembali</a>
          </div>
        </div>
        <div class="card-body">

          <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('pemasok.update', $pemasok->id) }}">
            @csrf
            @method('PATCH')

            <div class="card-body">
              <div class="form-group row">
                <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="kode" name="kode" value="{{ $pemasok->kode }}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="nama" name="nama" value="{{ $pemasok->nama }}">
                  <div class="text-danger">
                    @error('nama')
                    {{ $message }}
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-6">
                  <textarea class="form-control" name="alamat" id="alamat">{{ $pemasok->alamat }}</textarea>
                  <div class="text-danger">
                    @error('alamat')
                    {{ $message }}
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" id="telp" name="telp" value="{{ $pemasok->no_telp }}">
                  <div class="text-danger">
                    @error('telp')
                    {{ $message }}
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="pimpinan" class="col-sm-2 col-form-label">Nama Pimpinan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="pimpinan" name="pimpinan" value="{{ $pemasok->nama_pimpinan }}">
                  <div class="text-danger">
                    @error('pimpinan')
                    {{ $message }}
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="admin" class="col-sm-2 col-form-label">Nama Admin</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="admin" name="admin" value="{{ $pemasok->nama_admin }}">
                  <div class="text-danger">
                    @error('admin')
                    {{ $message }}
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
            <!-- /.card-footer -->
          </form>

        </div>
      </div>

    </div>
  </div>
</section>

@endsection