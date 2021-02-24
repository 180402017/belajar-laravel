@extends('template')
@section('title', 'Invoice')
@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="callout callout-info">

          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> Invoice
                  <small class="float-right">Tanggal: {{ date('d-m-Y', strtotime($detail->created_at)) }}</small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                To
                <address>
                  <strong>{{ $detail->nama }}</strong>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>Invoice #{{ $detail->nobuk }}</b>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Barang</th>
                      <th>Qty</th>
                      <th>Harga</th>
                      <th>Total</th>
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
                    </tr>
                    <?php $subtotal += $total ?>
                    @empty
                    <tr>
                      <td colspan="5" class="text-center">Data tidak ditemukan</td>
                    </tr>
                    @endforelse
                    <tr>
                      <td colspan="4">Subtotal :</td>
                      <td colspan="1" class="text-center">Rp. {{ number_format($subtotal) }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.row -->

            <div class="row no-print">
              <div class="col-12">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript">
      window.print();
  </script>

  @endsection