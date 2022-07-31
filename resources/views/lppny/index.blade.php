@extends('master')
@section('konten')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <!-- end row -->
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @elseif ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Laporan Transaksi Penyewaan</h4>
                            <div class="table-responsive">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Tanggal per periode</p>
                                            <form method="POST" action="{{ route('lppny.post') }}">
                                                @csrf
                                                {{-- <input type="hidden" name="id_user_a" id="id_user_a">  --}}
                                                <div class="form-group">
                                                    <label class="control-label">Tanggal Awal</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control " name="tglaw" type="date">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class=" control-label">Tanggal Akhir</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control " name="tglak" type="date">
                                                    </div>
                                                </div>
    
                                                <br>
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" name="tombol" value="detail">Simpan</button>
                                                    <button type="submit" class="btn btn-success" name="tombol" value="export">Export</button>
                                                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.reload();">Tutup</button> --}}
                                                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href = '{{ route('dashboard.index')}}'">Tutup</button> --}}
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Tanggal bulanan</p>
                                            <form method="POST" action="{{ route('lppny.bulan') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="control-label">Bulan Awal</label>
                                                    <div class="col-sm-12">
                                                        {{-- <input class="form-control " name="tglaw" type="date"> --}}
                                                        <select class="form-control " name="tglaw">
                                                            <option selected="selected">Bulan</option>
                                                            <?php
                                                            $bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","July","Agustus","September","Oktober","November","Desember");
                                                            for($bulan=1; $bulan<=12; $bulan++){
                                                            if($bulan<=9) { echo "<option value='$bulan'>$bln[$bulan]</option>"; }
                                                            else { echo "<option value='$bulan'>$bln[$bulan]</option>"; }
                                                            }
                                                            ?>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class=" control-label">Bulan Akhir</label>
                                                    <div class="col-sm-12">
                                                        {{-- <input class="form-control " name="tglak" type="date"> --}}
                                                        <select class="form-control " name="tglak">
                                                            <option selected="selected">Bulan</option>
                                                            <?php
                                                            $bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","July","Agustus","September","Oktober","November","Desember");
                                                            for($bulan=1; $bulan<=12; $bulan++){
                                                            if($bulan<=9) { echo "<option value='$bulan'>$bln[$bulan]</option>"; }
                                                            else { echo "<option value='$bulan'>$bln[$bulan]</option>"; }
                                                            }
                                                            ?>
                                                            </select>
                                                    </div>
                                                </div>
    
                                                <br>
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" name="tombol" value="detail">Simpan</button>
                                                    <button type="submit" class="btn btn-success" name="tombol" value="export">Export</button>
                                                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.reload();">Tutup</button> --}}
                                                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href = '{{ route('dashboard.index')}}'">Tutup</button> --}}
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Tanggal tahunan</p>
                                            <form method="POST" action="{{ route('lppny.tahun') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="control-label">Tahun ke</label>
                                                    <div class="col-sm-12">
                                                        {{-- <input class="form-control " name="tglaw" type="date"> --}}
                                                        <select name="tahun" class="form-control ">
                                                            <option selected="selected">Tahun</option>
                                                            <?php
                                                            for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                                                            echo "<option value='$i'> $i </option>";
                                                            }
                                                            ?>
                                                            </select>
                                                    </div>
                                                </div>
                                                
    
                                                <br>
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" name="tombol" value="detail">Simpan</button>
                                                    <button type="submit" class="btn btn-success" name="tombol" value="export">Export</button>
                                                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.reload();">Tutup</button> --}}
                                                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href = '{{ route('dashboard.index')}}'">Tutup</button> --}}
                                                </div>
                                            </form>
                                        </div>
                                    </div>

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
<div class="rightbar-overlay"></div>
<div class="rightbar-overlay"></div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        $(".alert").slideDown(300).delay(4000).slideUp(300);
    });
</script>
@endsection