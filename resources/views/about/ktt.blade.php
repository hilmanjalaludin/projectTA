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
                            <h4 class="card-title mb-4">KETENTUAN SEWA</h4>
                            <ol>
                                <li>Penyewa adalah orang yang menyewa kendaraan dengan melampirkan Fotocopy SIM, KTP, PBB/Rekening Telepon/Rekening Listrik</li>
                                <li>Pemakai adalah orang yang berstatus sebagai keluarga dekat penyewa atau orang yang telah dipercaya dan menjadi tanggung jawab penyewa</li>
                                <li>Penyewa dan atau pemakai bertanggung jawab atas kehilangan atau kerusakan yang terjadi pada kendaraan yang disewakan</li>
                                <li>Apabila terjadi kerusakan pada kendaraan yang disewakan, perbaikan harus dilakukan di bengkel yang dirujuk atau disetujui oleh Rental Mobil dan selama masa perbaikan tetap dihitung sebagai masa sewa</li>
                                <li>Kendaraan hanya diperuntukan mengangkut penumpang, kecuali kendaraan pengangkut barang</li>
                                <li>	dilarang keras menggunakan kendaraan sewa untuk perbuatan melawan hukum/bertindak kriminal</li>
                                <li>	kendaraan tidak boleh dipindah tangankan/disewa kepada pihak lain tanpa seizin Rental Mobil dengan alasan apapun</li>
                                <li>	Rental Mobil berhak memantau kendaraan-kendaraan sewa tanpa pemberitahuan terlebih dahulu kepada penyewa</li>
                                <li>	penambahan waktu sewa harus diberitahukan kepada pihak Rental minimal 3 jam sebelum masa sewa berakhir</li>
                                <li>	harga sewa mobil dihitung perharinya 12/24 jam. kelebihan waktu akan dikenakan biaya 10% dari harga sewa perhari perjamnya. lebih dari 4jam dikenakan biaya sewa ½ hari atau 12 jam</li>
                                <li>	bila dalam waktu 1x6 jam sejak masa sewa berakhir, penyewa lain tidak mengembalikan kendaraan tanpa pemberitahuan kepada rental, maka kondisi tersebut akan dilaporkan kepada pihak berwajib sebagai tindak penggelapan</li>
                                <li>	penyewa tidak bertanggung jawab atas kerusakan kendaraan selama menggunakan sopir Rental Mobil</li>
                                <li>	kendaraan dikembalikan harus sesuai pada saat diserahkan  (kendaraan diantar bersih, pulangpun harus bersih) atau dikenakan biaya tambahan penyesuaian</li>
                                <li>	semua harga yang tercantum di atas sudah termasuk asuransi All Risk kerusakan pada mobil yang disewa (lecet, penyok), hanya dikenakan klaim asuransi minor sebesar Rp. 250.000,-</li>
                                <li>	untuk kerusakan dalam kapasitas besar (mobil tidak dapat beroperasi, kaca pecah, dll) akan dikenakan klaim asuransi mayor sebesar sewa mobil 1 bulan</li>
                                <li>	pembatalan 1 hari sebelum pemakaian dikenakan biaya 50% dari harga sewa. pembatalan pada hari pemakaian dikenakan biaya 1 hari sewa. pembatalan di atas 2 hari sebelum pemakaian DP (panjer) hangus</li>
                            </ol>

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


        $('#get-tarif').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('get-tarif') }}",
            columns: [{
                    data: 'kd_tarif',
                    name: 'kd_tarif'
                },
                {
                    data: 'daerah',
                    name: 'daerah'
                },
                {
                    data: 'tarif',
                    name: 'tarif'
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
    //     $('#CompanyModal').html("Isi Data Tarif");
    //     $('#company-modal').modal('show');
    //     $('#kd_tarif').val('');
    // }

    function editFunc(kd_tarif) {
        $.ajax({
            type: "POST",
            url: "{{ url('edit-tarif') }}",
            data: {
                kd_tarif: kd_tarif
            },
            dataType: 'json',
            success: function(res) {
                console.log('edit res', res)
                $('#CompanyModal').html("Edit Company");
                $('#company-modal').modal('show');
                $('#kd_tarif').val(res.kd_tarif);
                $('#daerah').val(res.daerah);
                $('#tarif').val(res.tarif);

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
                url: "{{ url('delete-tarif') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#get-tarif').dataTable();
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
            url: "{{ url('update-tarif')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#company-modal").modal('hide');
                var oTable = $('#get-tarif').dataTable();
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
            url: "{{ url('store-tarif')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#company-modal").modal('hide');
                var oTable = $('#get-tarif').dataTable();
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