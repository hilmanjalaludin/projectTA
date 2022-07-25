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
                            <h4 class="card-title mb-4">Isi Data Kondisi Mobil</h4>
                            <div class="table-responsive">
                                <form action="javascript:void(0)" id="CompanyFormAdd" name="CompanyFormAdd" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    {{-- <input type="hidden" name="kd_kondisi" id="kd_kondisi"> --}}
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Kode Kondisi</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="kd_kondisi" placeholder="Input kode Kondisi" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Kode Mobil</label>


                                        <div class="col-sm-12">
                                            {{-- <input type="number" class="form-control" name="kd_mobil" placeholder="Input kode mobil" maxlength="50" required=""> --}}
                                            <select class="form-control m-bot15" name="kd_mobil">
                                                <option value="">Choose</option>
                                                <?php foreach ($mobil as $value) : ?>
                                                    <option value='<?php echo $value->kd_mobil; ?>'>
                                                        <?php echo $value->kd_mobil;  ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Jenis</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="jenis" placeholder="Input Jenis" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">No Polisi</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="no_polisi" placeholder="Input Polisi" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Biaya</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="biaya" placeholder="Input Biaya" maxlength="50" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Bensin</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="bensin" placeholder="Input Bensin" maxlength="50" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Kilometer</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="kilometer" placeholder="Input kilometer" maxlength="50" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Depan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="depan" placeholder="Input Depan" maxlength="50" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Belakang</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="belakang" placeholder="Input Belakang" maxlength="50" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Kanan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="kanan" placeholder="Input Kanan" maxlength="50" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Kiri</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="kiri" placeholder="Input Kiri" maxlength="50" required="">
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
                                    <h4 class="card-title mb-4">List Data Kondisi Mobil</h4>
                                    <table class="table table-bordered" id="get-kondisi">
                                        <thead>
                                            <tr>
                                                <th>Kode Mobil</th>
                                                <th>Bensin</th>
                                                <th>Kilometer</th>
                                                <th>Body Depan</th>
                                                <th>Body Belakang</th>
                                                <th>Body Kanan</th>
                                                <th>Body Kiri</th>
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
                                                <input type="hidden" name="kd_kondisi" id="kd_kondisi">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Kode Mobil</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="kd_mobil" name="kd_mobil" placeholder="Input kode mobil" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Bensin</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="bensin" name="bensin" placeholder="Input Bensin" maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Kilometer</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="kilometer" name="kilometer" placeholder="Input kilometer" maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Depan</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="depan" name="depan" placeholder="Input Depan" maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Belakang</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="belakang" name="belakang" placeholder="Input Belakang" maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Kanan</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="kanan" name="kanan" placeholder="Input Kanan" maxlength="50" required="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Kiri</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="kiri" name="kiri" placeholder="Input Kiri" maxlength="50" required="">
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


        $('#get-kondisi').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('get-kondisi') }}",
            columns: [{
                    data: 'kd_mobil',
                    name: 'kd_mobil'
                },
                {
                    data: 'bensin',
                    name: 'bensin'
                },
                {
                    data: 'kilometer',
                    name: 'kilometer'
                },

                {
                    data: 'depan',
                    name: 'depan'
                },
                {
                    data: 'belakang',
                    name: 'belakang'
                },
                {
                    data: 'kanan',
                    name: 'kanan'
                },
                {
                    data: 'kiri',
                    name: 'kiri'
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
    });


    function editFunc(kd_kondisi) {
        $.ajax({
            type: "POST",
            url: "{{ url('edit-kondisi') }}",
            data: {
                kd_kondisi: kd_kondisi
            },
            dataType: 'json',
            success: function(res) {
                console.log('edit res', res)
                $('#CompanyModal').html("Edit Company");
                $('#company-modal').modal('show');
                $('#kd_kondisi').val(res.kd_kondisi);
                $('#kd_mobil').val(res.kd_mobil);
                $('#bensin').val(res.bensin);
                $('#kilometer').val(res.kilometer);
                $('#depan').val(res.depan);
                $('#belakang').val(res.belakang);
                $('#kanan').val(res.kanan);
                $('#kiri').val(res.kiri);

            }
        });
    }

    function deleteFunc(id) {
        if (confirm("Delete Record?") == true) {
            var id = id;
            $.ajax({
                type: "POST",
                url: "{{ url('delete-kondisi') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#get-kondisi').dataTable();
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
            url: "{{ url('update-kondisi')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#company-modal").modal('hide');
                var oTable = $('#get-kondisi').dataTable();
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
            url: "{{ url('store-kondisi')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#company-modal").modal('hide');
                var oTable = $('#get-kondisi').dataTable();
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