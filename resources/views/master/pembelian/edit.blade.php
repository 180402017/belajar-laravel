@extends('template')
@section('title', 'Edit Pembelian')
@section('content')

<section class="content pt-2">
  <div class="row">
    <div class="col-12">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">@yield('title')</h3>
          <div class="float-right">
          </div>
        </div>
        <div class="card-body table-responsive">

          <form action="#" method="POST">
            @csrf

            <div class="row">
              <div class="col-md-6">

                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Master</h3>
                  </div>
                  <div class="card-body">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>No Bukti:</label>
                          <div class="input-group">
                            <input type="text" class="form-control" name="nobuk" value="{{ $detail->nobuk }}" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Date:</label>
                          <div class="input-group">
                            <input type="date" class="form-control" name="tanggal" value="{{ date('Y-m-d') }}" readonly>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Nama Pemasok:</label>
                      <div class="input-group">
                        <select class="form-control" name="pembeli" id="pembeli">
                          <option value="">- Pilih -</option>
                          @foreach($pelanggan as $p)
                          <option value="{{ $p->id }}" {{ $p->id == $detail->id_pem ? 'selected' : '' }}>{{ $p->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Keterangan:</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="keterangan" value="{{ $detail->keterangan }}">
                      </div>
                    </div>

                  </div>
                </div>

              </div>

              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Input Barang</h3>
                  </div>
                  <div class="card-body">

                    <div class="form-group">
                      <label>Barang :</label>
                      <select class="form-control" name="barang">
                        <option value="">- Pilih -</option>
                        @foreach($persediaan as $per)
                        <option value="{{ $per->id }}">{{ $per->nama }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Qty :</label>
                          <input type="number" name="qty" value="1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Harga :</label>
                          <input type="number" name="harga" value="1000" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4 pt-4">
                        <div class="form-group">
                          <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </form>

          <div class="row">
            <div class="col-12">

              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title"></h3>
                </div>
                <div class="card-body">

                  <table class="table table-bordered table-stripped">
                    <thead>
                      <tr>
                        <th width="5%">#</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th width="10%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $subtotal = 0; ?>
                      @forelse($pembelian as $pem)
                      <?php $total = $pem->qty * $pem->harga; ?>
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pem->persediaan->nama }}</td>
                        <td>{{ $pem->qty }}</td>
                        <td>Rp. {{ number_format($pem->harga) }}</td>
                        <td>Rp. {{ number_format($total) }}</td>
                        <td>
                          <a href="/pembelian/edit/{{ $pem->id }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                          <a href="/pembelian/hapus/{{ $pem->id }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php $subtotal += $total ?>
                      @empty
                      <tr>
                        <td colspan="6" class="text-center">Data tidak ditemukan</td>
                      </tr>
                      @endforelse
                      <tr>
                        <td colspan="4">Subtotal :</td>
                        <td colspan="2" class="text-center">Rp. {{ number_format($subtotal) }}</td>
                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

    @endsection