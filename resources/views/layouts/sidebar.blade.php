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

                        <li class="sidebar-item @if (Request::is('cpanel/kelas*')) selected @endif"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('cpanel.kelas') }}" aria-expanded="false">
                                <i data-feather="briefcase" class="feather-icon"></i>
                                <span class="hide-menu">Kelas</span>
                            </a>
                        </li>

                        <li class="sidebar-item @if (Request::is('cpanel/events*')) selected @endif"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('about') }}" aria-expanded="false">
                                <i data-feather="slack" class="feather-icon"></i>
                                <span class="hide-menu">Tugas</span>
                            </a>
                        </li>

                        <li class="sidebar-item @if (Request::is('cpanel/surveys*', 'cpanel/create-survey', 'cpanel/edit-survey*')) selected @endif"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('about') }}" aria-expanded="false">
                                <i data-feather="activity" class="feather-icon"></i>
                                <span class="hide-menu">Kehadiran</span>
                            </a>
                        </li>

                        <li class="sidebar-item @if (Request::is('cpanel/surveys*', 'cpanel/create-survey', 'cpanel/edit-survey*')) selected @endif"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('about') }}" aria-expanded="false">
                                <i data-feather="cpu" class="feather-icon"></i>
                                <span class="hide-menu">Prestasi</span>
                            </a>
                        </li>

                        <li class="sidebar-item @if (Request::is('cpanel/surveys*', 'cpanel/create-survey', 'cpanel/edit-survey*')) selected @endif"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('about') }}" aria-expanded="false">
                                <i data-feather="folder" class="feather-icon"></i>
                                <span class="hide-menu">Buletin</span>
                            </a>
                        </li>

                        <li class="sidebar-item @if (Request::is('cpanel/surveys*', 'cpanel/create-survey', 'cpanel/edit-survey*')) selected @endif"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('about') }}" aria-expanded="false">
                                <i data-feather="info" class="feather-icon"></i>
                                <span class="hide-menu">Pengingat</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>