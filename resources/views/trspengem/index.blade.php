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
            @elseif  ($message = Session::get('error'))
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
                                    <form method="POST" action="{{ route('lpmst.post') }}" >
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
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">No Sewa</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <button>Cari</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4>Mobil Yang di Pinjam</h4>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td>Tanggal</td>
                                                            <td>Kode Perkiraan</td>
                                                            <td>Nama Perkiraan</td>
                                                            <td>Debet</td>
                                                            <td>Kredit</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>2</td>
                                                            <td>3</td>
                                                            <td>4</td>
                                                            <td>5</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                

                                                <p>Data Mobil</p>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Kode Mobil</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Biaya Sewa</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
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
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Lama Sewa</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Tgl Kembali</label>
                                                            <div class="col-sm-12">
                                                                <input type="date" class="form-control" name="tgl_transaksi" placeholder="Input Tanggal Transaksi" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-12 control-label">Jam Kembali</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-12 control-label">Jam Pengembalian</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-12 control-label">Denda Telat</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-12 control-label">Kondisi Mobil</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-12 control-label">Keterangan</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-12 control-label">Denda Kondisi</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="col-sm-offset-2 col-sm-2">
                                                            <button type="submit" class="btn btn-primary" >Simpan</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.reload();">Tutup</button>
                                                        </div>
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
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">NIK Penyewa</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
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
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Terlambat</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <br>
                                                <p>Data Pengembalian</p>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td>No </td>
                                                            <td>Kode Perkiraan</td>
                                                            <td>Nama Perkiraan</td>
                                                            <td>Debet</td>
                                                            <td>Kredit</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>2</td>
                                                            <td>3</td>
                                                            <td>4</td>
                                                            <td>5</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-6 control-label">Uang Muka</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-6 control-label">Kekurangan</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-6 control-label">Total Bayar</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-6 control-label">Uang Bayar</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-6 control-label">Uang Kembali</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                    </div>
                                                </div> 
        
                                            </div>
                                        </div>
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary" >Simpan</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.reload();">Tutup</button>
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
@endsection