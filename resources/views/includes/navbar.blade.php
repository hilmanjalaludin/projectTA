   <!-- ========== Left Sidebar Start ========== -->
   <!-- <h1>Welcome {{ Session::get('nama_pengguna') }}</h1>
   <h1>Anda sebagai {{ Session::get('hak_akses') }}</h1>
   <h1>Id anda {{ Session::get('id_pengguna') }}</h1> -->


   <?php if (Session::get('hak_akses') == 'admin') { ?>
       <div class="vertical-menu">
           <div data-simplebar class="h-100">
               <!--- Sidemenu -->
               <div id="sidebar-menu">
                   <!-- Left Menu Start -->
                   <ul class="metismenu list-unstyled" id="side-menu">

                       <li>
                           <a href="{{ route('klien.index') }}" class="waves-effect">
                               <i class="bx bx-calendar"></i>
                               <span key="t-calendar">Data Klien admin</span>
                           </a>
                       </li>

                       <li>
                           <a href="{{ route('blknama.index') }}" class="waves-effect">
                               <i class="bx bx-chat"></i>
                               <span key="t-chat">Balik Nama</span>
                           </a>
                       </li>
                   </ul>
               </div>
               <!-- Sidebar -->
           </div>
       </div>
       <!-- Left Sidebar End -->
   <?php } elseif (Session::get('hak_akses') == 'keuangan') { ?>
       <div class="vertical-menu">
           <div data-simplebar class="h-100">
               <!--- Sidemenu -->
               <div id="sidebar-menu">
                   <!-- Left Menu Start -->
                   <ul class="metismenu list-unstyled" id="side-menu">



                       <li>
                           <a href="{{ route('jsbn.index') }}" class="waves-effect">
                               <i class="bx bx-store"></i>
                               <span key="t-file-manager">Jasa Balik Nama</span>
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
       </div>
       <!-- Left Sidebar End -->
   <?php   } elseif (Session::get('hak_akses') == 'notaris') { ?>
       <div class="vertical-menu">
           <div data-simplebar class="h-100">
               <!--- Sidemenu -->
               <div id="sidebar-menu">
                   <!-- Left Menu Start -->
                   <ul class="metismenu list-unstyled" id="side-menu">
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
                           <a href="{{ route('dtpng.index') }}" class="waves-effect">
                               <i class="bx bx-file"></i>
                               <span key="t-file-manager">Data Pengguna</span>
                           </a>
                       </li>

                   </ul>
               </div>
               <!-- Sidebar -->
           </div>
       </div>
       <!-- Left Sidebar End -->
   <?php } ?>