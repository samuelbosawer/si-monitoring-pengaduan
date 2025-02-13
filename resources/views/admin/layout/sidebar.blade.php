     <!-- ========== Left Sidebar Start ========== -->
     <div class="left-side-menu">

         <div class="h-100" data-simplebar>

             <!--- Sidemenu -->
             <div id="sidebar-menu">

                 <ul id="side-menu">

                     <li>
                         <a href="{{ route('dashboard.home') }}">
                             <i data-feather="airplay"></i>
                             <span> Dashboard </span>
                         </a>
                     </li>

                     <li>
                        <a href="{{ route('dashboard.pengaduan') }}">
                            <i data-feather="box"></i>
                            <span> Data Pengaduan </span>
                        </a>
                    </li>



                    <li>
                        <a href="{{ route('dashboard.pendampingan') }}">
                            <i data-feather="package"></i>
                            <span> Data Pendampingan  </span>
                        </a>
                    </li>

                    {{-- <li>
                        <a href="">
                            <i data-feather="archive"></i>
                            <span> Riwayat Pendampingan  </span>
                        </a>
                    </li> --}}



                    <li>
                        <a href="{{route('logout')}}"  onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            <i class="fe-log-out"></i>
                            <span> Keluar </span>
                        </a>
                    </li>





                 </ul>

             </div>
             <!-- End Sidebar -->

             <div class="clearfix"></div>

         </div>
         <!-- Sidebar -left -->

     </div>
     <!-- Left Sidebar End -->
