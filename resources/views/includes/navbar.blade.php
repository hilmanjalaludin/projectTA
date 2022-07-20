   <!-- ========== Left Sidebar Start ========== -->
   <!-- <h1>Welcome {{ Session::get('name') }}</h1>
   <h1>Anda sebagai {{ Session::get('hak_akses') }}</h1>
   <h1>Id anda {{ Session::get('id_user') }}</h1> -->


   <?php //if (Session::get('hak_akses') == 'operasional') { ?>
       <div class="vertical-menu">
           <div data-simplebar class="h-100">
               <!--- Sidemenu -->
               <div id="sidebar-menu">
                   <!-- Left Menu Start -->
                   <ul class="metismenu list-unstyled" id="side-menu">
                    <li>
                        <a href="{{ route('dashboard.index') }}" class="waves-effect">
                            <i class="bx bx-store"></i>
                            <span key="t-file-manager">Master</span>
                        </a>
                    </li>
                       <li>
                           <a href="{{ route('transaksi.index') }}" class="waves-effect">
                               <i class="bx bx-cart"></i>
                               <span key="t-calendar">Transaksi</span>
                           </a>
                       </li>

                       <li>
                           <a href="{{ route('laporan.index') }}" class="waves-effect">
                               <i class="bx bx-book"></i>
                               <span key="t-chat">Laporan</span>
                           </a>
                       </li>
                     
                       <li>
                           <a href="{{ route('pengaturan.index') }}" class="waves-effect">
                               <i class="bx bx-cog"></i>
                               <span key="t-chat">Pengaturan</span>
                           </a>
                       </li>
                       
                       <li>
                           <a href="{{ route('about.index') }}" class="waves-effect">
                               <i class="bx bx-chat"></i>
                               <span key="t-chat">About</span>
                           </a>
                       </li>

                   </ul>
               </div>
               <!-- Sidebar -->
           </div>
       </div>
       <!-- Left Sidebar End -->
   <?php //} elseif (Session::get('hak_akses') == 'direktur') { ?>
       {{-- <div class="vertical-menu">
           <div data-simplebar class="h-100">
               <!--- Sidemenu -->
               <div id="sidebar-menu">
                   <!-- Left Menu Start -->
                   <ul class="metismenu list-unstyled" id="side-menu">
                       <li>
                           <a href="{{ route('dashboard.index') }}" class="waves-effect">
                               <i class="bx bx-store"></i>
                               <span key="t-file-manager">Master</span>
                           </a>
                       </li>
                       <li>
                           <a href="{{ route('jsbn.index') }}" class="waves-effect">
                               <i class="bx bx-store"></i>
                               <span key="t-file-manager">Transaksi</span>
                           </a>
                       </li>
                       <li>
                           <a href="{{ route('lpjr.index') }}" class="waves-effect">
                               <i class="bx bx-file"></i>
                               <span key="t-file-manager">Laporan Jurnal</span>
                           </a>
                       </li>
                       <li>
                           <a href="{{ route('lpbayar.index') }}" class="waves-effect">
                               <i class="bx bx-file"></i>
                               <span key="t-file-manager">Laporan Bayar</span>
                           </a>
                       </li>


                       <li>
                           <a href="{{ route('dtprk.index') }}" class="waves-effect">
                               <i class="bx bx-file"></i>
                               <span key="t-file-manager">Data Perkiraan</span>
                           </a>
                       </li>

                   </ul>
               </div>
               <!-- Sidebar -->
           </div>
       </div> --}}
       <!-- Left Sidebar End -->
   <?php  // }  ?>
