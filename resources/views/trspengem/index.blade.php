@extends('master')
@section('konten')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <!-- end row -->
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @elseif ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4" style="text-align: center">Form Transaksi Pengembalian</h4>
                            <div class="table-responsive">
                                <div class="card-body">
                                    <h4>Isi Data Jurnal</h4>
                                    <form method="POST" action="{{ route('trspengem.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Isi Data Pengembalian</p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Tanggal Transaksi</label>
                                                            <div class="col-sm-12">
                                                                <input type="date" class="form-control" name="tgl_transaksi" placeholder="Input Tanggal Transaksi" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">No Pengembalian</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="no_kembali" placeholder="Input no_kembali" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">No Sewa</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="no_sewa" placeholder="Input no sewa" maxlength="50" required="">
                                                            </div>
                                                            {{-- <div class="col-sm-6">
                                                                <button>Cari</button>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>Mobil Yang di Pinjam</p>
                                                <table class="table table-bordered" style="font-size: 12px;">
                                                    <thead>
                                                        <tr>
                                                            <td>Kode Mobil</td>
                                                            <td>Tanggal Sewa</td>
                                                            <td>Jam Sewa</td>
                                                            <td>Lama Sewa</td>
                                                            <td>Tanggal Kembali</td>
                                                            <td>Jam Kembali</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dtl_sewa as $d)
                                                        <tr>

                                                            <td>{{ $d->kd_mobil }}</td>
                                                            <td>{{ $d->tgl_sewa }}</td>
                                                            <td>{{ $d->jam_sewa }}</td>
                                                            <td>{{ $d->lama_sewa }}</td>
                                                            <td>{{ $d->tgl_kembali }}</td>
                                                            <td>{{ $d->jam_kembali }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>


                                                <p>Data Mobil</p>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Kode Mobil</label>
                                                            <div class="col-sm-12">
                                                                <!-- <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required=""> -->
                                                                <select class="form-control m-bot15" name="kd_mobil" id="category">
                                                                    <option value="">Choose</option>
                                                                    <?php foreach ($pilih_mobil as $ve) : ?>
                                                                        <option value='<?php echo $ve->kd_mobil; ?>'>
                                                                            <?php echo $ve->kd_mobil;  ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Biaya Sewa</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="no_kembali" placeholder="Input no_kembali" maxlength="50" required="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Tgl Transaksi</label>
                                                            <div class="col-sm-12">
                                                                <input type="date" class="form-control" name="tgl_transaksi" placeholder="Input Tanggal Transaksi" maxlength="50" required="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Jam Sewa</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="jam_sewa" placeholder="Input jam_sewa" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Lama Sewa</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="lama_sewa" placeholder="Input lama_sewa" maxlength="50" required="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Tgl Kembali</label>
                                                            <div class="col-sm-12">
                                                                <input type="date" class="form-control" name="tgl_kembali" placeholder="Input Tanggal Kembali" maxlength="50" required="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-12 control-label">Jam Kembali</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="jam_kembali" placeholder="Input jam_kembali" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-12 control-label">Jam Pengembalian</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="jam_kembali" placeholder="Input jam_kembali" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-12 control-label">Denda Telat</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="denda_telat" placeholder="Input denda_telat" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-12 control-label">Kondisi Mobil</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="kondisi" placeholder="Input kondisi" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-12 control-label">Keterangan</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="keterangan" placeholder="Input keterangan" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-12 control-label">Denda Kondisi</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="denda_kondisi" placeholder="Input denda_kondisi" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <br>


                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Data Penyewa</p>
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Nama Operasional</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="supir" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">NIK Penyewa</label>
                                                            <div class="col-sm-12">
                                                                <input type="number" class="form-control" name="nik" placeholder="Input nik" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Nama</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">No Telp</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="telp" placeholder="Input telp" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Terlambat</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="terlambat" placeholder="Input Terlambat" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <br>
                                                <p>Data Pengembalian</p>
                                                <table class="table table-bordered" style="font-size: 12px;">
                                                    <thead>
                                                        <tr>
                                                            <td>No Pengembalian</td>
                                                            <td>Kode Mobil</td>
                                                            <td>Tanggal Sewa</td>
                                                            <td>Tanggal Kembali</td>
                                                            <td>Jam Kembali</td>
                                                            <td>Denda Telat</td>
                                                            <td>Denda Kondisi</td>
                                                            <td>Kondisi</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($tbl_kedua as $d)
                                                        <tr>

                                                            <td>{{ $d->no_kembali }}</td>
                                                            <td>{{ $d->kd_mobil }}</td>
                                                            <td>{{ $d->tgl_sewa }}</td>
                                                            <td>{{ $d->tgl_kembali }}</td>
                                                            <td>{{ $d->jam_kembali }}</td>
                                                            <td>{{ $d->denda_telat }}</td>
                                                            <td>{{ $d->denda_kondisi }}</td>
                                                            <td>{{ $d->kondisi }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Uang Muka</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="dp" placeholder="Input Uang Muka" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Kekurangan</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="kurang" placeholder="Input kurang" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Total Bayar</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="total_bayar" placeholder="Input Total Bayar" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Uang Bayar</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="biaya" placeholder="Input Uang Bayar" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Uang Kembali</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="subtotal" placeholder="Input Uang Krmbali" maxlength="50" required="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.reload();">Tutup</button> --}}
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href = '{{ route('dashboard.index')}}'">Tutup</button>
                                                </div>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->


@section('footer')
<div class="rightbar-overlay"></div>
<div class="rightbar-overlay"></div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        $(".alert").slideDown(300).delay(4000).slideUp(300);
    });
</script>
@endsection