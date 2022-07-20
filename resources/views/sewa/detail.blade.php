@extends('master')
@section('konten')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Sewa</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Sewa</a></li>
                                <li class="breadcrumb-item active">Data Sewa</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- end row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Data Sewa</h4>
                            <div class="table-responsive">

                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                <div class="card-body">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Nomor Sewa</th>
                                                <th>Kode Mobil</th>
                                                <th>Kode Tarif</th>
                                                <th>Tanggal Sewa</th>
                                                <th>Jam Sewa</th>
                                                <th>Lama Sewa</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Jam kembali</th>
                                                <th>Supir</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($company as $d)
                                                <td>{{ $d->no_sewa }}</td>
                                                <td>{{ $d->kd_mobil }}</td>
                                                <td>{{ $d->kd_tarif }}</td>
                                                <td>{{ $d->tgl_sewa }}</td>
                                                <td>{{ $d->jam_sewa }}</td>
                                                <td>{{ $d->lama_sewa }}</td>
                                                <td>{{ $d->tgl_kembali }}</td>
                                                <td>{{ $d->jam_kembali }}</td>
                                                <td>{{ $d->supir }}</td>
                                                <td>{{ $d->subtotal }}</td>
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
@endsection