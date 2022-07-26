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
                            <h4 class="card-title mb-4" style="text-align: center">Form Transaksi Penyewaan</h4>
                            <div class="table-responsive">
                                <div class="card-body">

                                    <form method="POST" action="{{ route('trspny.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Isi Data Jurnal</p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">No Sewa</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="no_sewa" placeholder="Input No Sewa" maxlength="50" required="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Tgl Transaksi</label>
                                                            <div class="col-sm-12">
                                                                <input type="date" class="form-control" name="tgl_transaksi" placeholder="Input Tanggal Transaksi" maxlength="50" required="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">NIK</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="nik" placeholder="Input NIK" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Nama</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Telpon</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="telpon" placeholder="Input Telpon" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-6 control-label">Alamat</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="alamat" placeholder="Input Alamat" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <br>
                                                        <br>
                                                        <table class="table table-bordered" style="font-size: 12px;">
                                                            <thead>
                                                                <tr>
                                                                    <td>Kode Mobil</td>
                                                                    <td>Tanggal Sewa</td>
                                                                    <td>Tanggal Kembali</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($dtl_sewa as $d)
                                                                <tr>

                                                                    <td>{{ $d->kd_mobil }}</td>
                                                                    <td>{{ $d->tgl_sewa }}</td>
                                                                    <td>{{ $d->tgl_kembali }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Data Mobil Belum di Kembalikan</p>
                                                        <table class="table table-bordered" style="font-size: 12px;">
                                                            <thead>
                                                                <tr>
                                                                    <td>No. Sewa</td>
                                                                    <td>NIK</td>
                                                                    <td>Tanggal Kembali</td>
                                                                    <td>Jam Kembali</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($kembali as $d)
                                                                <tr>

                                                                    <td>{{ $d->no_sewa }}</td>
                                                                    <td>{{ $d->nik }}</td>
                                                                    <td>{{ $d->tgl_kembali }}</td>
                                                                    <td>{{ $d->jam_kembali }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                </div>
                            </div>

                            {{-- ke2 --}}
                            <div class="table-responsive">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <p>Isi Data Mobil</p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Kode Mobil</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control m-bot15" name="kd_mobil" id="category">
                                                                <option value="">Choose</option>
                                                                <?php foreach ($pilih_mobil as $ve) : ?>
                                                                    <option value='<?php echo $ve->kd_mobil; ?>'>
                                                                        <?php echo $ve->kd_mobil;  ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            {{-- <input type="text" class="form-control" name="kd_mobil" placeholder="Input Kode Mobil" maxlength="50" required=""> --}}
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Jenis</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control" name="jenis" id="jenis"></select>
                                                            {{-- <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Input Jenis" maxlength="50" required=""> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">No Polisi</label>
                                                        <div class="col-sm-12">
                                                            {{-- <input type="text" class="form-control" name="no_polisi" placeholder="Input No Polisi" maxlength="50" required=""> --}}
                                                            <select class="form-control" name="no_polisi" id="no_polisi"></select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Biaya Sewa</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control" name="biaya" id="biaya"></select>
                                                            {{-- <input type="text" class="form-control" name="biaya" placeholder="Input Biaya" maxlength="50" required=""> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Bensin</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control" name="bensin" id="bensin"></select>
                                                            {{-- <input type="text" class="form-control" name="bensin" placeholder="Input Bensin" maxlength="50" required=""> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Kilo Meter</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control" name="kilometer" id="kilometer"></select>
                                                            {{-- <input type="text" class="form-control" name="kilometer" placeholder="Input Kilometer" maxlength="50" required=""> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Body Depan</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control" name="depan" id="depan"></select>
                                                            {{-- <input type="text" class="form-control" name="depan" placeholder="Input Body Depan" maxlength="50" required=""> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Body Belakang</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control" name="belakang" id="belakang"></select>
                                                            {{-- <input type="text" class="form-control" name="belakang" placeholder="Input Body Belakang" maxlength="50" required=""> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Body Kanan</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control" name="kanan" id="kanan"></select>
                                                            {{-- <input type="text" class="form-control" name="kanan" placeholder="Input Body Kanan" maxlength="50" required=""> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Body Kiri</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control" name="kiri" id="kiri"></select>
                                                            {{-- <input type="text" class="form-control" name="kiri" placeholder="Input Body Kiri" maxlength="50" required=""> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Tanggal Sewa</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" class="form-control" name="tgl_sewa" placeholder="Input Tanggal Sewa" maxlength="50" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Jam Sewa</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="jam_sewa" placeholder="Input Jam Sewa" maxlength="50" required="">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Pakai Supir</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="name" placeholder="Input Nama" maxlength="50" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Tarif</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="tarif" placeholder="Input Tarif" maxlength="50" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Lama Sewa</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="lama_sewa" placeholder="Input Lama Sewa" maxlength="50" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Tanggal Kembali</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" class="form-control" name="tgl_kembali" placeholder="Input Tanggal Kembali" maxlength="50" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-6 control-label">Jam Kembali</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="jam_kembali" placeholder="Input Jam Kembali" maxlength="50" required="">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <br>
                                            <p>Data Mobil Belum di Kembalikan</p>
                                            <table class="table table-bordered" style="font-size: 12px;">
                                                <thead>
                                                    <tr>
                                                        <td>Kode Mobil</td>
                                                        <td>Biaya</td>
                                                        <td>Tgl Sewa</td>
                                                        <td>Jam Sewa</td>
                                                        <td>Lama Sewa</td>
                                                        <td>Tgl Kembali</td>
                                                        <td>Jam Kembali</td>
                                                        <td>Subtotal</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($tampil as $d)
                                                    <tr>
                                                        <td>{{ $d->kd_mobil }}</td>
                                                        <td>{{ $d->biaya }}</td>
                                                        <td>{{ $d->tgl_sewa }}</td>
                                                        <td>{{ $d->jam_sewa }}</td>
                                                        <td>{{ $d->lama_sewa }}</td>
                                                        <td>{{ $d->tgl_kembali }}</td>
                                                        <td>{{ $d->jam_kembali }}</td>
                                                        <td>{{ $d->subtotal }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <br>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-6 control-label">Total Uang Sewa</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="biaya" placeholder="Input Uang Sewa" maxlength="50" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-6 control-label">Uang Muka</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="dp" placeholder="Input Uang Muka" maxlength="50" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-6 control-label">Uang Bayar</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="total_bayar" placeholder="Input Uang Bayar" maxlength="50" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-6 control-label">Uang Kembali</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="subtotal" placeholder="Input Uang Kembali" maxlength="50" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-6 control-label">Kekurangan</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="denda_telat" placeholder="Input Kekurangan" maxlength="50" required="">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6"></div>
                                                <div class="col-md-12">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.reload();">Tutup</button>
                                                    </div>

                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ke2 --}}
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
{{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#category').on('change', function() {
                alert('haloo')
                return false
                $.ajax({
                    url: "{{ route('trspny.post') }}?country_id=" + $(this).val(),
method: 'GET',
success: function(data) {
$('#city').html(data.html);
}
});
});
}
</script> --}}

<script>
    $(document).ready(function() {
    $('#category').on('change', function() {
        var categoryID = $(this).val();
        // alert(categoryID)
        // return false
        //mobil=> jenis,no_polisi,biaya,bensin
        //kondisi => bensin,kilometer,depan,belakang,kanan,kiri
        if (categoryID) {
            $.ajax({
                url: "/detail-trspny/" + categoryID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    if (data) {
                        $.each(data, function(key, jenis) {

                            console.log('ada', data[0].jenis);
                            $('select[name="jenis"]').append('<option value="' + key + '">' + data[0].jenis + '</option>');
                            $('select[name="no_polisi"]').append('<option value="' + key + '">' + data[0].no_polisi + '</option>');
                            $('select[name="bensin"]').append('<option value="' + key + '">' + data[0].bensin + '</option>');
                            $('select[name="biaya"]').append('<option value="' + key + '">' + data[0].biaya + '</option>');
                            $('select[name="depan"]').append('<option value="' + key + '">' + data[0].depan + '</option>');
                            $('select[name="belakang"]').append('<option value="' + key + '">' + data[0].belakang + '</option>');
                            $('select[name="kanan"]').append('<option value="' + key + '">' + data[0].kanan + '</option>');
                            $('select[name="kiri"]').append('<option value="' + key + '">' + data[0].kiri + '</option>');
                        });
                    } else {
                        $('#jenis').empty();
                    }
                }
            });
        } else {
            $('#jenis').empty();
        }
    });
    }));

    $(document).ready(function() {
        $(".alert").slideDown(300).delay(4000).slideUp(300);
    });
</script>

@endsection