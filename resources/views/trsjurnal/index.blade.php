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
                            <h4 class="card-title mb-4" style="text-align: center">Form Jurnal</h4>
                            <div class="table-responsive">
                                <div class="card-body">
                                    <h4>Isi Data Jurnal</h4>
                                    <form method="POST" action="{{ route('trsjurnal.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-6 control-label">No Jurnal</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="no_jurnal" id="no_jurnal" placeholder="Input Jurnal" maxlength="50" required="">
                                                        <button type="button" onclick="myno_jurnal()">cari</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-6 control-label">No Transaksi</label>
                                                    <div class="col-sm-12">
                                                        {{-- <input type="text" class="form-control" name="no_trans" placeholder="Input No Transaksi" maxlength="50" required=""> --}}
                                                        <select class="form-control m-bot15" name="no_trans" id="notrans">
                                                            <option value="">Choose</option>
                                                            <?php foreach ($notrans as $v) : ?>
                                                                <option value='<?php echo $v->no_sewa; ?>'>
                                                                    <?php echo $v->nama;  ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-6 control-label">Tanggal</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control" name="tanggal" id="tgl_transaksi" placeholder="Input Tanggal Transaksi" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-6 control-label">Nama Transaksi</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="nama_trans" id="nama" placeholder="Input Nama Transaksi" maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="name" class="control-label" style="font-size:10px">Kode</label>
                                                        <button type="button" onclick="mykode()">cari</button>
                                                        <input type="text" class="form-control" id="kode" name="kd_perkiraan" placeholder="Input Kode" maxlength="50" required="">
                                                    </div>
                                                    <div class="col-md-3">
                                                       {{-- <input type="hidden" name="no_jurnal" id="no_jurnal"> --}}
                                                        <label for="name" class="control-label" style="font-size:10px">Nama Perusahaan</label>
                                                        <input type="text" class="form-control" name="nama_trans" id="nama_trans" placeholder="Input Nama Perusahaan" maxlength="50" required="">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="name" class="col-sm-6 control-label" style="font-size:10px">Debet</label>
                                                        <input type="number" class="form-control" name="debet" id="debet" placeholder="Input Debet" maxlength="50" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Data Jurnal Sementara</h4>
                                                <table class="table table-bordered" style="font-size: 12px;">
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
                                                        @foreach ($tampil1 as $c)
                                                        <tr>
                                                            <td>{{ $c->tanggal }}</td>
                                                            <td>{{ $c->kd_perkiraan }}</td>
                                                            <td>{{ $c->nm_perkiraan }}</td>
                                                            <td>{{ $c->debet }}</td>
                                                            <td>{{ $c->kredit }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <h4>Jurnal Umum</h4>
                                                <table class="table table-bordered" style="font-size: 12px;">
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
                                                        @foreach ($tampil2 as $d)
                                                        <tr>

                                                            <td>{{ $d->tanggal }}</td>
                                                            <td>{{ $d->kd_perkiraan }}</td>
                                                            <td>{{ $d->nm_perkiraan }}</td>
                                                            <td>{{ $d->debet }}</td>
                                                            <td>{{ $d->kredit }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
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

    function mykode() 
    {
        let kode = document.getElementById("kode").value;
        $.ajax({
                    url: "/kode-trsjurnal/" + kode,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                    alert(response.message)
                    console.log(response.data[0]);
                    // document.getElementById('no_jurnal').value = response.data[0].no_jurnal;
                    // document.getElementById('nama_trans').value = response.data[0].nama_trans;
                    // document.getElementById('debet').value = response.data[0].debet;
                    },
                        error: function(xhr) {
                        alert('Data Tidak ada')
                    }
            });
    }

    function myno_jurnal() 
    {
        let no_jurnal = document.getElementById("no_jurnal").value;
        // alert(no_jurnal)
        // return false
        $.ajax({
                    url: "/no_jurnal-trsjurnal/" + no_jurnal,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                    alert(response.message)
                    console.log(response.data[0]);
                    },
                        error: function(xhr) {
                        alert('Data Tidak ada')
                    }
            });
    }

    $(document).ready(function() {
        $('#notrans').on('change', function() {
            var categoryID = $(this).val();
            // alert(categoryID) 
            // false
            if (categoryID) {
                $.ajax({
                    url: "/detail-trsjurnal/" + categoryID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $.each(data, function(key, value) {

                                console.log('ada', data[0].tgl_transaksi);
                                // $('select[name="jenis"]').append('<option value="' + key + '">' + data[0].jenis + '</option>');
                                document.getElementById('nama').value = data[0].nama;
                                document.getElementById('tgl_transaksi').value = data[0].tgl_transaksi;
                            });
                        } else {
                            $('#value').empty();
                        }
                    }
                });
            } else {
                $('#value').empty();
            }
        });
   
    });
</script>
@endsection