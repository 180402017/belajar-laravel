@extends('template')
@section('title', 'Detail')
@section('content')

<section class="content pt-2">
  <div class="row">
    <div class="col-12">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">@yield('title')</h3>
        </div>
        <div class="card-body table-responsive">

          <table class="table table-bordered table-stripped table-hover" id="table">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>No Bukti</th>
                <th>Pemasok</th>
                <th>Keterangan</th>
                <th width="10%">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php $i=1; ?>
              @foreach($master as $m)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $m->nobuk }}</td>
                <td>{{ $m->nama }}</td>
                <td>{{ $m->keterangan }}</td>
                <td>
                  <a href="{{ url('master/edit') }}/{{ $m->nobuk }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                  <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                  <a href="{{ url('master/invoice') }}/{{ $m->nobuk }}" target="" class="btn btn-default btn-sm"><i class="fas fa-print"></i></a>
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