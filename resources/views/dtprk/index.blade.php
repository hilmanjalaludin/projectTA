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
                            <h4 class="card-title mb-4">Isi Data Perkiraan</h4>
                            <div class="table-responsive">
                                <form action="javascript:void(0)" id="CompanyFormAdd" name="CompanyFormAdd" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Kode Perkiraan</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="kd_perkiraan" placeholder="Input Kode Perkiraan" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Nama Perkiraan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="nm_perkiraan" placeholder="Input Nama Perkiraan" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Jenis Perkiraan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="jns_perkiraan" placeholder="Input Jenis Perkiraan" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary" id="btn-save">Simpan</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </form>
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                <div class="card-body">
                                    <h4 class="card-title mb-4">List Data Perkiraan</h4>
                                    <table class="table table-bordered" id="get-dtprk">
                                        <thead>
                                            <tr>
                                                <th>Kode Perkiraan</th>
                                                <th>Nama Perkiraan</th>
                                                <th>Jenis Perkiraan</th>
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
                                                <input type="hidden" name="kd_perkiraan" id="kd_perkiraan">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Nama Perkiraan</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="nm_perkiraan" name="nm_perkiraan" placeholder="Input Nama Perkiraan" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Jenis Perkiraan</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="jns_perkiraan" name="jns_perkiraan" placeholder="Input Jenis Perkiraan" maxlength="50" required="">
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
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
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


        $('#get-dtprk').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('get-dtprk') }}",
            columns: [{
                    data: 'kd_perkiraan',
                    name: 'kd_perkiraan'
                },
                {
                    data: 'nm_perkiraan',
                    name: 'nm_perkiraan'
                },
                {
                    data: 'jns_perkiraan',
                    name: 'jns_perkiraan'
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
    });

    function editFunc(kd_perkiraan) {
        $.ajax({
            type: "POST",
            url: "{{ url('edit-dtprk') }}",
            data: {
                kd_perkiraan: kd_perkiraan
            },
            dataType: 'json',
            success: function(res) {
                console.log('edit res', res)
                $('#CompanyModal').html("Edit Company");
                $('#company-modal').modal('show');
                $('#kd_perkiraan').val(res.kd_perkiraan);
                $('#nm_perkiraan').val(res.nm_perkiraan);
                $('#jns_perkiraan').val(res.jns_perkiraan);

            }
        });
    }

    function deleteFunc(id) {
        if (confirm("Delete Record?") == true) {
            var id = id;
            $.ajax({
                type: "POST",
                url: "{{ url('delete-dtprk') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#get-dtprk').dataTable();
                    oTable.fnDraw(false);
                }
            });
        }
    }

    $('#CompanyForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        console.log('halo', formData)

        $.ajax({
            type: 'POST',
            url: "{{ url('update-dtprk')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#company-modal").modal('hide');
                var oTable = $('#get-dtprk').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save").attr("disabled", false);
            },
            error: function(data) {
                console.log('ini data', data);
            }
        });
    });
    $('#CompanyFormAdd').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        console.log('halo', formData)

        $.ajax({
            type: 'POST',
            url: "{{ url('store-dtprk')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#company-modal").modal('hide');
                var oTable = $('#get-dtprk').dataTable();
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