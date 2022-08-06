@extends('master')
@section('konten')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Laporan Pengembalian Bulanan</h4>
                            <div class="table-responsive">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No Kembali</th>
                                                <th>Kode User</th>
                                                <th>NIK</th>
                                                <th>Kode Mobil</th>
                                                <th>Tanggal Sewa</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Keterlambatan</th>
                                                <th>Denda Telat</th>
                                                <th>Denda Kondisi</th>
                                                <th>Kondisi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tampil as $d)
                                            <tr>
                                                <td>{{ $d->no_kembali }}</td>
                                                <td>{{ $d->id_user }}</td>
                                                <td>{{ $d->nik }}</td>
                                                <td>{{ $d->kd_mobil }}</td>
                                                <td>{{ $d->tgl_sewa }}</td>
                                                <td>{{ $d->tgl_kembali }}</td>
                                                <td>{{ $d->terlambat }}</td>
                                                <td>{{ $d->denda_telat }}</td>
                                                <td>{{ $d->denda_kondisi }}</td>
                                                <td>{{ $d->kondisi }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
{{-- test --}}
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!-- JAVASCRIPT -->
{{-- <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script> --}}
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<!-- apexcharts -->
{{-- <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script> --}}
<!-- dashboard init -->
<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
<script>
    $(document).ready(function() {
        $(".alert").slideDown(300).delay(4000).slideUp(300);
    });
</script>
@endsection