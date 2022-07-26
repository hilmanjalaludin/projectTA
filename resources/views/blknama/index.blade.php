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
                        <h4 class="mb-sm-0 font-size-18">Jasa Balik Nama</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Jasa Balik Nama</a></li>
                                <li class="breadcrumb-item active">Jasa Balik Nama</li>
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
                            <h4 class="card-title mb-4">Jasa Balik Nama</h4>
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
                                    <table class="table table-bordered" id="get-blknama">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Jenis Pengajuan</th>
                                                <th>Syarat KTP</th>
                                                <th>Syatrat KK</th>
                                                <th>Syarat SPPT</th>
                                                <th>sarat surat tanah</th>
                                                <th>bayar pembuatan</th>
                                                <th>jenis pembuatan</th>
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
                                                <input type="hidden" name="no_pengajuan" id="no_pengajuan">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Jenis Pengajuan</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="jenis_pengajuan" name="jenis_pengajuan" placeholder="Input Jenis Pengajuan" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Tanggal Pengajuan</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" type="date" name="tgl_pengajuan" id="tgl_pengajuan" required>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Syarat KTP</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="syarat_ktp" name="syarat_ktp" placeholder="Input KTP" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Syarat KK</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="syarat_kk" name="syarat_kk" placeholder="Input KK" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Syarat SPPT</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="syarat_sppt" name="syarat_sppt" placeholder="Input SPPT" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Syarat Surat Tanah</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="syarat_surat_tanah" name="syarat_surat_tanah" placeholder="Input Surat Tanah" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Biaya Pembuatan</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="biaya_pembuatan" name="biaya_pembuatan" placeholder="Input Biaya Pembuatan" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Jenis Pembayaran</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="jenis_pembayaran" name="jenis_pembayaran" placeholder="Input Pembayaran" required="">
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


        $('#get-blknama').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('get-blknama') }}",
            columns: [{
                    data: 'no_pengajuan',
                    name: 'no_pengajuan'
                },
                {
                    data: 'tgl_pengajuan',
                    name: 'tgl_pengajuan'
                },
                {
                    data: 'jenis_pengajuan',
                    name: 'jenis_pengajuan'
                },
                {
                    data: 'syarat_ktp',
                    name: 'syarat_ktp'
                },
                {
                    data: 'syarat_kk',
                    name: 'syarat_kk'
                },
                {
                    data: 'syarat_sppt',
                    name: 'syarat_sppt'
                },
                {
                    data: 'syarat_surat_tanah',
                    name: 'syarat_surat_tanah'
                },
                {
                    data: 'biaya_pembuatan',
                    name: 'biaya_pembuatan'
                },
                {
                    data: 'jenis_pembayaran',
                    name: 'jenis_pembayaran'
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
        $('#CompanyModal').html("Tambah Jasa Balik Nama");
        $('#company-modal').modal('show');
        $('#no_pengajuan').val('');
    }

    // alert()
    function editFunc(no_pengajuan) {
        // console.log('edit')
        // return false
        $.ajax({
            type: "POST",
            url: "{{ url('edit-blknama') }}",
            data: {
                no_pengajuan: no_pengajuan
            },
            dataType: 'json',
            success: function(res) {
                console.log('edit res', res)
                $('#CompanyModal').html("Edit Company");
                $('#company-modal').modal('show');
                $('#no_pengajuan').val(res.no_pengajuan);
                $('#tgl_pengajuan').val(res.tgl_pengajuan);
                $('#jenis_pengajuan').val(res.jenis_pengajuan);
                $('#syarat_ktp').val(res.syarat_ktp);
                $('#syarat_kk').val(res.syarat_kk);
                $('#syarat_sppt').val(res.syarat_sppt);
                $('#syarat_surat_tanah').val(res.syarat_surat_tanah);
                $('#biaya_pembuatan').val(res.biaya_pembuatan);
                $('#jenis_pembayaran').val(res.jenis_pembayaran);
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
                url: "{{ url('delete-blknama') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#get-blknama').dataTable();
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
            url: "{{ url('store-blknama')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#company-modal").modal('hide');
                var oTable = $('#get-blknama').dataTable();
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