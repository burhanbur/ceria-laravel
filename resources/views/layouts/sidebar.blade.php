            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                                <i data-feather="home" class="feather-icon"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li class="list-divider"></li>

                        @hasrole('guru')
                        <li class="sidebar-item @if (Request::is('cpanel/kelas*')) selected @endif"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('cpanel.kelas') }}" aria-expanded="false">
                                <i data-feather="briefcase" class="feather-icon"></i>
                                <span class="hide-menu">Kelas</span>
                            </a>
                        </li>

                        <li class="sidebar-item @if (Request::is('cpanel/tugas*')) selected @endif"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('cpanel.tugas') }}" aria-expanded="false">
                                <i data-feather="slack" class="feather-icon"></i>
                                <span class="hide-menu">Tugas</span>
                            </a>
                        </li>
                        @endhasrole

                        @hasrole('orang_tua')
                        <li class="sidebar-item @if (Request::is('cpanel/orangtua-kelas*')) selected @endif"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('cpanel.ortu.kelas') }}" aria-expanded="false">
                                <i data-feather="briefcase" class="feather-icon"></i>
                                <span class="hide-menu">Kelas</span>
                            </a>
                        </li>

                        <li class="sidebar-item @if (Request::is('cpanel/orangtua-tugas*')) selected @endif"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('cpanel.ortu.tugas') }}" aria-expanded="false">
                                <i data-feather="slack" class="feather-icon"></i>
                                <span class="hide-menu">Tugas</span>
                            </a>
                        </li>
                        @endhasrole

                        <li class="sidebar-item @if (Request::is('cpanel/kehadiran*')) selected @endif"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('cpanel.kehadiran') }}" aria-expanded="false">
                                <i data-feather="activity" class="feather-icon"></i>
                                <span class="hide-menu">Kehadiran</span>
                            </a>
                        </li>

                        <li class="sidebar-item @if (Request::is('cpanel/prestasi*')) selected @endif"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('cpanel.prestasi') }}" aria-expanded="false">
                                <i data-feather="cpu" class="feather-icon"></i>
                                <span class="hide-menu">Prestasi</span>
                            </a>
                        </li>

                        <li class="sidebar-item @if (Request::is('cpanel/buletin*')) selected @endif"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('cpanel.buletin') }}" aria-expanded="false">
                                <i data-feather="folder" class="feather-icon"></i>
                                <span class="hide-menu">Buletin</span>
                            </a>
                        </li>

                        <li class="sidebar-item @if (Request::is('cpanel/pengingat*')) selected @endif"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('cpanel.pengingat') }}" aria-expanded="false">
                                <i data-feather="info" class="feather-icon"></i>
                                <span class="hide-menu">Pengingat</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>