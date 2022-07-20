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
                            <h4 class="card-title mb-4">Ubah Password</h4>
                            <div class="table-responsive">

                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                <div class="card-body">
                                    <form action="" id="CompanyForm" name="CompanyForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id_user" value="{{$company->id_user}}">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Nama Pengguna</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" value="{{$company->name}}" name="name" placeholder="Input Nama Pengguna" maxlength="50" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="password" value="{{$company->password}}" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Hak Akses</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" value="{{$company->hak_akses}}" name="hak_akses" placeholder="Input Hak Akses" maxlength="50" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Nomor KTP</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" value="{{$company->no_ktp}}" name="no_ktp" placeholder="Input No KTP" maxlength="50" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Jenis Kelamin</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" value="{{$company->jenkel}}" name="jenkel" placeholder="Input Jenis Kelamin" maxlength="50" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" value="{{$company->almt}}" name="almt" placeholder="Input Alamat" maxlength="50" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">No Telpon</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" value="{{$company->telpon}}" name="telpon" placeholder="Input Telpon" maxlength="50" required="">
                                            </div>
                                        </div>

                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary" id="btn-save">Simpan</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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