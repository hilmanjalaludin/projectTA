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
                            <h4 class="card-title mb-4">Isi Data Mobil</h4>
                            <div class="table-responsive">
                                {{-- <div class="pull-right mb-2">
                                    <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Tambah</a>
                                </div> --}}
                                <form action="javascript:void(0)" id="CompanyFormAdd" name="CompanyFormAdd" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    {{-- <input type="hidden" name="kd_mobil" id="kd_mobil"> --}}
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Kode Mobil</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control"  name="kd_mobil" placeholder="Input Kode Mobil" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Jenis Mobil</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control"  name="jenis" placeholder="Input jenis Mobil" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Type</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  name="type" placeholder="Input Type" maxlength="50" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Warna</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  name="warna" placeholder="Input Warna" maxlength="50" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Tahun</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  name="tahun" placeholder="Input Tahun" maxlength="50" required="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">No polisi</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  name="no_polisi" placeholder="Input No Polisi" maxlength="50" required="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">No Rangka</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  name="no_rangka" placeholder="Input No Rangka" maxlength="50" required="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">No Mesin</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  name="no_mesin" placeholder="Input No Mesin" maxlength="50" required="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Biaya Sewa</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  name="biaya" placeholder="Input Biaya Sewa" maxlength="50" required="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Status</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  name="status" placeholder="Input Status" maxlength="50" required="">
                                        </div>
                                    </div>
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
                                    <h4 class="card-title mb-4">List Data Mobil</h4>
                                    <table class="table table-bordered" id="get-mobil">
                                        <thead>
                                            <tr>
                                                <th>Kode Mobil</th>
                                                <th>Jenis</th>
                                                <th>Type</th>
                                                <th>Warna</th>
                                                <th>Tahun</th>
                                                <th>Nomor Polisi</th>
                                                <th>Nomor Rangka</th>
                                                <th>Nomor Mesin</th>
                                                <th>Biaya</th>
                                                <th>Status</th>
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
                                                <input type="hidden" name="kd_mobil" id="kd_mobil">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Jenis Mobil</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="jenis" name="jenis" placeholder="Input jenis Mobil" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Type</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="type" name="type" placeholder="Input Type" maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Warna</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="warna" name="warna" placeholder="Input Warna" maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Tahun</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Input Tahun" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">No polisi</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="no_polisi" name="no_polisi" placeholder="Input No Polisi" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">No Rangka</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="no_rangka" name="no_rangka" placeholder="Input No Rangka" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">No Mesin</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="no_mesin" name="no_mesin" placeholder="Input No Mesin" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Biaya Sewa</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Input Biaya Sewa" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Status</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="status" name="status" placeholder="Input Status" maxlength="50" required="">
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


        $('#get-mobil').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('get-mobil') }}",
            columns: [{
                    data: 'kd_mobil',
                    name: 'kd_mobil'
                },
                {
                    data: 'jenis',
                    name: 'jenis'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'warna',
                    name: 'warna'
                },
                {
                    data: 'tahun',
                    name: 'tahun'
                },
                {
                    data: 'no_polisi',
                    name: 'no_polisi'
                },
                {
                    data: 'no_rangka',
                    name: 'no_rangka'
                },
                {
                    data: 'no_mesin',
                    name: 'no_mesin'
                },
                {
                    data: 'biaya',
                    name: 'biaya'
                },
                {
                    data: 'status',
                    name: 'status'
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

    // function add() {
    //     $('#CompanyForm').trigger("reset");
    //     $('#CompanyModal').html("Tambah Data Tarif");
    //     $('#company-modal').modal('show');
    //     $('#kd_mobil').val('');
    // }

    // alert()
    function editFunc(kd_mobil) {
        // console.log('edit')
        // return false
        $.ajax({
            type: "POST",
            url: "{{ url('edit-mobil') }}",
            data: {
                kd_mobil: kd_mobil
            },
            dataType: 'json',
            success: function(res) {
                console.log('edit res', res)
                $('#CompanyModal').html("Edit Company");
                $('#company-modal').modal('show');
                $('#kd_mobil').val(res.kd_mobil);
                $('#jenis').val(res.jenis);
                $('#warna').val(res.warna);
                $('#tahun').val(res.tahun);
                $('#no_polisi').val(res.no_polisi);
                $('#no_rangka').val(res.no_rangka);
                $('#no_mesin').val(res.no_mesin);
                $('#biaya').val(res.biaya);
                $('#status').val(res.status);
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
                url: "{{ url('delete-mobil') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#get-mobil').dataTable();
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
            url: "{{ url('update-mobil')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#company-modal").modal('hide');
                var oTable = $('#get-mobil').dataTable();
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
            url: "{{ url('store-mobil')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#company-modal").modal('hide');
                var oTable = $('#get-mobil').dataTable();
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