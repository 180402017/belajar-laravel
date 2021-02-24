@extends('template')
@section('title', 'Pelanggan')
@section('content')

<section class="content pt-2">
  <div class="row">
    <div class="col-12">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">@yield('title')</h3>
          <div class="float-right">
            <a href="{{ route('pelanggan.create') }}" class="btn btn-primary btn-sm">Tambah</a>
          </div>
        </div>
        <div class="card-body table-responsive">

          @if (session('pesan'))
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> {{ session('pesan') }}!</h5>
                </div>
              </div>
            </div>
          </div>
          @endif

          <table class="table table-bordered table-stripped table-hover" id="table">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Pimpinan</th>
                <th>Admin</th>
                <th width="10%">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php $i=1; ?>
              @foreach ($pelanggan as $p)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $p->kode }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->nama_pimpinan }}</td>
                <td>{{ $p->nama_admin }}</td>
                <td>
                  <a href="/pelanggan/edit/{{ $p->id }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                  <a href="/pelanggan/delete/{{ $p->id }}" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>

          </table>

        </div>
      </div>

    </div>
  </div>
</section>

@endsection