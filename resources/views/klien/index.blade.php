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
                        <h4 class="mb-sm-0 font-size-18">Data Klien</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Klien</a></li>
                                <li class="breadcrumb-item active">Data Klien</li>
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
                            <h4 class="card-title mb-4">Data Klien</h4>
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
                                    <table class="table table-bordered" id="get-klien">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nama Klien</th>
                                                <th>NIK Klien</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Pekerjaan</th>
                                                <th>Alamat</th>
                                                <th>No Telpon</th>
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
                                                <input type="hidden" name="id_klien" id="id_klien">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Nama Klien</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="nama_klien" name="nama_klien" placeholder="Input Nama Klien" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">NIK Klien</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="nik_klien" name="nik_klien" placeholder="Input NIK" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Tempat Lahir</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="tempat_lahir_klien" name="tempat_lahir_klien" placeholder="Input Tempat Lahir" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" type="date" name="tgl_lahir_klien" id="tgl_lahir_klien" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="jenis_kelamin_klien" name="jenis_kelamin_klien" placeholder="Input Jenis Kelamin" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Pekerjaan</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="pekerjaan_klien" name="pekerjaan_klien" placeholder="Input Pekerjaan" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Alamat</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="nlamat_klien" name="nlamat_klien" placeholder="Input Alamat" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">No Telpon</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="no_tlp_klien" name="no_tlp_klien" placeholder="Input No Telpon" required="">
                                                    </div>
                                                </div>

                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" id="btn-save">Simpan</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href = '{{ route('dashboard.index')}}'">Tutup</button>
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


        $('#get-klien').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('get-klien') }}",
            columns: [{
                    data: 'id_klien',
                    name: 'id_klien'
                },
                {
                    data: 'nama_klien',
                    name: 'nama_klien'
                },
                {
                    data: 'nik_klien',
                    name: 'nik_klien'
                },
                {
                    data: 'tempat_lahir_klien',
                    name: 'tempat_lahir_klien'
                },
                {
                    data: 'tgl_lahir_klien',
                    name: 'tgl_lahir_klien'
                },
                {
                    data: 'jenis_kelamin_klien',
                    name: 'jenis_kelamin_klien'
                },
                {
                    data: 'pekerjaan_klien',
                    name: 'pekerjaan_klien'
                },
                {
                    data: 'nlamat_klien',
                    name: 'nlamat_klien'
                },
                {
                    data: 'no_tlp_klien',
                    name: 'no_tlp_klien'
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
        $('#CompanyModal').html("Tambah Data Klien");
        $('#company-modal').modal('show');
        $('#id_klien').val('');
    }

    // alert()
    function editFunc(id_klien) {
        // console.log('edit')
        // return false
        $.ajax({
            type: "POST",
            url: "{{ url('edit-klien') }}",
            data: {
                id_klien: id_klien
            },
            dataType: 'json',
            success: function(res) {
                console.log('edit res', res)
                $('#CompanyModal').html("Edit Company");
                $('#company-modal').modal('show');
                $('#id_klien').val(res.id_klien);
                $('#nama_klien').val(res.nama_klien);
                $('#nik_klien').val(res.nik_klien);
                $('#tempat_lahir_klien').val(res.tempat_lahir_klien);
                $('#tgl_lahir_klien').val(res.tgl_lahir_klien);
                $('#jenis_kelamin_klien').val(res.jenis_kelamin_klien);
                $('#pekerjaan_klien').val(res.pekerjaan_klien);
                $('#nlamat_klien').val(res.nlamat_klien);
                $('#no_tlp_klien').val(res.no_tlp_klien);
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
                url: "{{ url('delete-klien') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#get-klien').dataTable();
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
            url: "{{ url('store-klien')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#company-modal").modal('hide');
                var oTable = $('#get-klien').dataTable();
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
<script>
    $(document).ready(function() {
        $(".alert").slideDown(300).delay(4000).slideUp(300);
    });
</script>
@endsection