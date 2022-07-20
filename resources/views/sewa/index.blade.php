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
                            <h4 class="card-title mb-4">Isi Data Penyewa</h4>
                            <div class="table-responsive">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Isi Data Penyewa</h4>
                                    <table class="table table-bordered" id="get-sewa">
                                        <thead>
                                            <tr>
                                                <th>Nomor Sewa</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Jumlah Mobil</th>
                                                <th>Uang Muka</th>
                                                <th>Kekurangan</th>
                                                <th>Status Sewa</th>
                                                <th>NIK</th>
                                                <th>ID User</th>
                                                <th>Action</th>
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
                                                <input type="hidden" name="no_sewa" id="no_sewa">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Tanggal Transaksi</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" placeholder="Input Tanggal Transaksi" maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Jumlah Mobil</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="jml_mobil" name="jml_mobil" placeholder="Input Jumlah Mobil" maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Uang Muka</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="dp" name="dp" placeholder="Input Uang Muka " maxlength="50" required="">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Kurang</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="kurang" name="kurang" placeholder="Input Kurang " maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Kekurangan</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="kurang" name="kurang" placeholder="Input Kekurangan " maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Status Sewa</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="status_sewa" name="status_sewa" placeholder="Input Status Sewa " maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">NIK</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="nik" name="nik" placeholder="Input NIK " maxlength="50" required="">
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">ID User</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="id_user" name="id_user" placeholder="Input ID User " maxlength="50" required="">
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


        $('#get-sewa').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('get-sewa') }}",
            columns: [{
                    data: 'no_sewa',
                    name: 'no_sewa'
                },
                {
                    data: 'tgl_transaksi',
                    name: 'tgl_transaksi'
                },
                {
                    data: 'jml_mobil',
                    name: 'jml_mobil'
                },
                {
                    data: 'dp',
                    name: 'dp'
                },
                {
                    data: 'kurang',
                    name: 'kurang'
                },
                {
                    data: 'status_sewa',
                    name: 'status_sewa'
                },
                {
                    data: 'nik',
                    name: 'nik'
                },
                {
                    data: 'id_user',
                    name: 'id_user'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
    });

    function add() {
        $('#CompanyForm').trigger("reset");
        $('#CompanyModal').html("Tambah Data Sewa");
        $('#company-modal').modal('show');
        $('#no_sewa').val('');
    }

    // alert()
    function editFunc(no_sewa) {
        // console.log('edit')
        // return false
        $.ajax({
            type: "POST",
            url: "{{ url('edit-sewa') }}",
            data: {
                no_sewa: no_sewa
            },
            dataType: 'json',
            success: function(res) {
                console.log('edit res', res)
                $('#CompanyModal').html("Edit Company");
                $('#company-modal').modal('show');
                $('#no_sewa').val(res.no_sewa);
                $('#tgl_transaksi').val(res.tgl_transaksi);
                $('#jml_mobil').val(res.jml_mobil);
                $('#dp').val(res.dp);
                $('#kurang').val(res.kurang);
                $('#status_sewa').val(res.status_sewa);
                $('#nik').val(res.nik);
                $('#id_user').val(res.id_user);

            }
        });
    }
    function detailFunc(no_sewa) {
        // console.log('edit')
        // return false
        $.ajax({
            type: "GET",
            url: "{{ url('detail-sewa') }}",
            data: {
                no_sewa: no_sewa
            },
            dataType: 'json',
            success: function(res) {
                console.log('edit res', res)
                $('#CompanyModal').html("Edit Company");
                $('#company-modal').modal('show');
                $('#no_sewa').val(res.no_sewa);
                $('#tgl_transaksi').val(res.tgl_transaksi);
                $('#jml_mobil').val(res.jml_mobil);
                $('#dp').val(res.dp);
                $('#kurang').val(res.kurang);
                $('#status_sewa').val(res.status_sewa);
                $('#nik').val(res.nik);
                $('#id_user').val(res.id_user);

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
                url: "{{ url('delete-sewa') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#get-sewa').dataTable();
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
            url: "{{ url('store-sewa')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#company-modal").modal('hide');
                var oTable = $('#get-sewa').dataTable();
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