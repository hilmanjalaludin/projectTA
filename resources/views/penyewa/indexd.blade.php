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
                                <form action="javascript:void(0)" id="CompanyFormAdd" name="CompanyFormAdd" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">NIK</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="nik" placeholder="Input NIK" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Nama</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">No Telpon</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="telp" placeholder="Input No Telpon" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Alamat</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="alamat" placeholder="Input Alamat" maxlength="50" required="">
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
                                    <h4 class="card-title mb-4">List Data Penyewa</h4>
                                    <table class="table table-bordered" id="get-penyewa">
                                        <thead>
                                            <tr>
                                                <th>No KTP</th>
                                                <th>nama</th>
                                                <th>Telepon</th>
                                                <th>Alamat</th>
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
                                                <input type="hidden" name="nik_a" id="nik_a">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">NIK</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" name="nik" id="nik" placeholder="Input NIK" maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Nama</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">No Telpon</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="telp" name="telp" placeholder="Input No Telpon" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Alamat</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Input Alamat" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <br>

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


        $('#get-penyewa').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('get-penyewa') }}",
            columns: [{
                    data: 'nik',
                    name: 'nik'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'telp',
                    name: 'telp'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
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


    function editFunc(ev) {
        ev.preventDefault();
        var nik = ev.currentTarget.getAttribute('id');
        $.ajax({
            type: "POST",
            url: "{{ url('edit-penyewa') }}",
            data: {
                nik: nik
            },
            dataType: 'json',
            success: function(res) {
                console.log('edit res', res)
                $('#CompanyModal').html("Edit Company");
                $('#company-modal').modal('show');
                $('#nik').val(res.nik);
                $('#nik_a').val(res.nik);
                $('#nama').val(res.nama);
                $('#telp').val(res.telp);
                $('#alamat').val(res.alamat);

            }
        });
    }

    function deleteFunc(ev) {
        ev.preventDefault();
        var id = ev.currentTarget.getAttribute('id');
        if (confirm("Delete Record?") == true) {
            var id = id;
            // console.log('delete',id)
            // return false
            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('delete-penyewa') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#get-penyewa').dataTable();
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
            url: "{{ url('update-penyewa')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#company-modal").modal('hide');
                var oTable = $('#get-penyewa').dataTable();
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
        // return false

        $.ajax({
            type: 'POST',
            url: "{{ url('store-penyewa')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#company-modal").modal('hide');
                var oTable = $('#get-penyewa').dataTable();
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