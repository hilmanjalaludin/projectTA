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
                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                <div class="card-body">
                                    <form method="POST" action="{{ route('dtpng.update') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">ID User</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="id_user" value="{{$company->id_user}}" readonly>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Password Lama</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="password" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Password Baru</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="new_password" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Ulangi Password</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="confirm_password" required>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href = '{{ route('dashboard.index')}}'">Tutup</button>
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
<script>
    $(document).ready(function() {
        $(".alert").slideDown(300).delay(4000).slideUp(300);
    });
</script>
@endsection