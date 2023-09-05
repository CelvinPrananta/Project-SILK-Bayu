<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ set_active(['home']) }}">
                    <a href="{{ route('home') }}" class="{{ set_active(['home']) ? 'noti-dot' : '' }}">
                        <i class="la la-dashboard"></i>
                        <span> Dashboard</span>
                    </a>
                </li>

                @if (Auth::user()->role_name == 'Admin')
                    <li class="menu-title"> <span>Verifikasi Identitas</span> </li>
                    <li
                        class="{{ set_active(['search/user/list', 'userManagement', 'activity/log', 'activity/login/logout']) }} submenu">
                        <a href="#"
                            class="{{ set_active(['search/user/list', 'userManagement', 'activity/log', 'activity/login/logout']) ? 'noti-dot' : '' }}">
                            <i class="la la-user-secret"></i> <span> Kendali Pengguna</span> <span
                                class="menu-arrow"></span>
                        </a>
                        <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                            <li><a class="{{ set_active(['search/user/list', 'userManagement']) }}"
                                    href="{{ route('userManagement') }}">Daftar Pengguna</a></li>
                            <li><a class="{{ set_active(['activity/log']) }}" href="{{ route('activity/log') }}">Riwayat
                                    Aktivitas</a></li>
                            <li><a class="{{ set_active(['activity/login/logout']) }}"
                                    href="{{ route('activity/login/logout') }}">Aktivitas Pengguna</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">
                        <span>Informasi Riwayat</span>
                    </li>
                    <li class="{{ request()->routeIs('riwayat-pendidikan') ? 'active' : '' }}">
                        <a href="{{ route('riwayat-pendidikan') }}"
                            class="{{ request()->routeIs('riwayat-pendidikan') ? 'noti-dot' : '' }}">
                            <i class="la la-mortar-board"></i>
                            <span>Riwayat Pendidikan</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('riwayat-golongan') ? 'active' : '' }}">
                        <a href="{{ route('riwayat-golongan') }}"
                            class="{{ request()->routeIs('riwayat-golongan') ? 'noti-dot' : '' }}">
                            <i class="la la-group"></i>
                            <span>Riwayat Golongan</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('riwayat-jabatan') ? 'active' : '' }}">
                        <a href="{{ route('riwayat-jabatan') }}"
                            class="{{ request()->routeIs('riwayat-jabatan') ? 'noti-dot' : '' }}">
                            <i class="la la-area-chart"></i>
                            <span>Riwayat Jabatan</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('riwayat-diklat') ? 'active' : '' }}">
                        <a href="{{ route('riwayat-diklat') }}"
                            class="{{ request()->routeIs('riwayat-diklat') ? 'noti-dot' : '' }}">
                            <i class="la la-suitcase"></i>
                            <span>Riwayat Diklat</span>
                        </a>
                    </li>

                    <li class="menu-title"> <span>Pengaturan Profil</span> </li>
                    <li class="{{ set_active(['profile_user']) }}">
                        <a href="{{ route('profile_user') }}"
                            class="{{ set_active(['profile_user']) ? 'noti-dot' : '' }}">
                            <i class="la la-user"></i>
                            <span> Profil</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role_name == 'Super Admin')
                    <li class="menu-title"> <span>Rekapitulasi Data</span> </li>
                    <li class="{{ set_active(['rekapitulasi']) }}">
                        <a href="{{ route('rekapitulasi') }}"
                            class="{{ set_active(['rekapitulasi']) ? 'noti-dot' : '' }}">
                            <i class="la la-edit"></i>
                            <span> Rekapitulasi</span>
                        </a>
                    </li>
                    <li class="menu-title"> <span>Pengaturan Profil</span> </li>
                    <li class="{{ set_active(['profile_user']) }}">
                        <a href="{{ route('profile_user') }}"
                            class="{{ set_active(['profile_user']) ? 'noti-dot' : '' }}">
                            <i class="la la-user"></i>
                            <span> Profil</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role_name == 'User')
                    <li class="menu-title"> <span>Pengaturan Profil</span> </li>
                    <li class="{{ set_active(['profile_user']) }}">
                        <a href="{{ route('profile_user') }}"
                            class="{{ set_active(['profile_user']) ? 'noti-dot' : '' }}">
                            <i class="la la-user"></i>
                            <span> Profil</span>
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
