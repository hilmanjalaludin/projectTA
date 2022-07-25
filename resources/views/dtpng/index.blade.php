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
                        <h4 class="mb-sm-0 font-size-18">Data Pengguna</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Pengguna</a></li>
                                <li class="breadcrumb-item active">Data Pengguna</li>
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
                            <h4 class="card-title mb-4">Data Pengguna</h4>
                            <div class="table-responsive">
                                <div class="pull-right mb-2">
                                    <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Tambah</a>
                                </div>

                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                <div class="card-body">
                                    <table class="table table-bordered" id="get-dtpng">
                                        <thead>
                                            <tr>
                                                <th>Id User</th>
                                                <th>Nama</th>
                                                <th>Password</th>
                                                <th>Hak akses</th>
                                                <th>Nomor KTP</th>
                                                <th>Jenis Kelamin</th>
                                                <th>No Telpon</th>
                                                <th>Alamat</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <!-- boostrap company model -->
                            <div class="modal fade" id="company-modal" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="CompanyModal"></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="javascript:void(0)" id="CompanyForm" name="CompanyForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">ID User</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="id_user" name="id_user" placeholder="Input ID User" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Nama Pengguna</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Input Nama Pengguna" maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Password</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" type="text" name="password" id="password" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Hak Akses</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="hak_akses" name="hak_akses" value="supir" placeholder="Input Hak Akses" maxlength="50" required="" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Nomor KTP</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="no_ktp" name="no_ktp" placeholder="Input No KTP" maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Jenis Kelamin</label>
                                                    <div class="col-sm-12">
                                                        <!-- {{-- <input type="text" class="form-control" id="jenkel" name="jenkel" placeholder="Input Jenis Kelamin" maxlength="50" required=""> --}} -->
                                                        <select class="form-control m-bot15" name="jenkel" id="jenkel" required="">
                                                            <option value="">Choose</option>
                                                            <option value="PRIA">
                                                                PRIA </option>
                                                            <option value="WANITA">
                                                                WANITA</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Alamat</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="almt" name="almt" placeholder="Input Alamat" maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">No Telpon</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="telpon" name="telpon" placeholder="Input Telpon" maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" id="btn-save">Simpan</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end bootstrap model -->



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
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#get-dtpng').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('get-dtpng') }}",
            columns: [{
                    data: 'id_user',
                    name: 'id_user'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'password',
                    name: 'password'
                },
                {
                    data: 'hak_akses',
                    name: 'hak_akses'
                },
                {
                    data: 'no_ktp',
                    name: 'no_ktp'
                },
                {
                    data: 'jenkel',
                    name: 'jenkel'
                },
                {
                    data: 'telpon',
                    name: 'telpon'
                },
                {
                    data: 'almt',
                    name: 'almt'
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
    });

    function add() {
        $('#CompanyForm').trigger("reset");
        $('#CompanyModal').html("Tambah Pengguna");
        $('#company-modal').modal('show');
        $('#id_user').val('');
    }

    // alert()
    function editFunc(id_user) {
        // console.log('edit')
        // return false
        $.ajax({
            type: "POST",
            url: "{{ url('edit-dtpng') }}",
            data: {
                id_user: id_user
            },
            dataType: 'json',
            success: function(res) {
                console.log('edit res', res)
                $('#CompanyModal').html("Edit Company");
                $('#company-modal').modal('show');
                $('#id_user').val(res.id_user);
                $('#name').val(res.name);
                $('#password').val(res.password);
                $('#hak_akses').val(res.hak_akses);
                $('#no_ktp').val(res.no_ktp);
                $('#jenkel').val(res.jenkel);
                $('#telpon').val(res.telpon);
                $('#almt').val(res.almt);

            }
        });
    }

    function deleteFunc(id) {
        if (confirm("Delete Record?") == true) {
            var id = id;
            // console.log('delete',id)
            // return false
            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('delete-dtpng') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#get-dtpng').dataTable();
                    oTable.fnDraw(false);
                }
            });
        }
    }

    $('#CompanyForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        console.log('halo', formData)
        // return false

        $.ajax({
            type: 'POST',
            url: "{{ url('store-dtpng')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#company-modal").modal('hide');
                var oTable = $('#get-dtpng').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save").attr("disabled", false);
            },
            error: function(data) {
                console.log('ini data', data);
            }
        });
    });
</script>
</body>

</html>
@endsection