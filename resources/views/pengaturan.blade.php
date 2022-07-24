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
                        <h4 class="mb-sm-0 font-size-18">Pengaturan</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pengaturan</a></li>
                                <li class="breadcrumb-item active">Pengaturan</li>
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
                            <h4 class="card-title mb-4"></h4>
                            <div class="table-responsive">
                                <h1>Welcome {{ Session::get('name') }}</h1>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <?php 
                                $data = Session::get('id_user');
                                echo '<a href="' . route('dtpng.detailpng', $data) .'" >';
                                ?>
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h2 class="text-muted fw-medium">Ganti Password</h2>
                                                
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                    <span class="avatar-title">
                                                        <i class="bx bx-user font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>    
                        </div>
                        <div class="col-md-6">
                            {{-- <a href="javascript:void(0);" id="delete-compnay" onclick="deleteFunc(' . $data->nik . ')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger" >Delete</a> --}}
                            <a href="javascript:void(0);" onclick="deleteFunc(' . $data->nik . ')" data-toggle="tooltip" data-original-title="Delete" >
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h2 class="text-muted fw-medium">Logout</h2>
                                                {{-- <h4 class="mb-0">$35, 723</h4> --}}
                                            </div>

                                            <div class="flex-shrink-0 align-self-center ">
                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <i class="bx bx-power-off font-size-24 text-danger"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>    
                        </div>
                        
                    </div>
                </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    @endsection


    @section('footer')
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    {{-- test --}}
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
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
        function deleteFunc() {
            // window.alert('Anda ingin Logout');
            // window.location.href='{{url('logout')}}';
            if(confirm("Anda ingin Logout")){ 
                    /* user clicked "OK" */ 
                    location.href ='{{url('logout')}}';
                } 
                else { 
                    /* User clicked "Cancel" */
                    location.href ='{{url('pengaturan')}}';
                }
            }
    </script>
    </body>

    </html>
    @endsection