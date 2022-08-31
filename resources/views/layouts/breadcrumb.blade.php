                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-0">Selamat Pagi <label style="color: #5f76e8">{{ Auth::user()->name }}</label>!</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    @if (Request::is('cpanel/dashboard*'))
                                        <li class="breadcrumb-item"><a href="" class="text-muted">Dashboard</a></li>
                                    @endif

                                    @if (Request::is('cpanel/kelas*'))
                                        <li class="breadcrumb-item"><a href="" class="text-muted">Kelas</a></li>
                                    @endif

                                    @if (Request::is('cpanel/tugas*'))
                                        <li class="breadcrumb-item"><a href="" class="text-muted">Tugas</a></li>
                                    @endif

                                    @if (Request::is('cpanel/my-tasks*'))
                                        <li class="breadcrumb-item"><a href="" class="text-muted">Task</a></li>
                                    @endif
                                    <!-- <li class="breadcrumb-item text-muted active" aria-current="page"></li> -->
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>