<div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <li class="nav-item  ">
                                <a href="<?= site_url('staff') ?>" class="nav-link ">
                                    <i class="icon-layers"></i>
                                    <span class="title">Dashboard</span>
                                </a>
                                <a href="<?= site_url('staff/profile') ?>" class="nav-link ">
                                    <i class="icon-user"></i>
                                    <span class="title">profile</span>
                                </a>
                            </li>
                            <li class="heading">
                                <h3 class="uppercase">Data Pengetahuan</h3>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-list"></i>
                                    <span class="title">Tacit</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?=site_url('staff/tambah_tacit');?>" class="nav-link ">
                                            <span class="title">Tambah Tacit</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="<?=site_url('staff/tacit');?>" class="nav-link ">
                                            <span class="title">List Tacit</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-list"></i>
                                    <span class="title">Explicit</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?=site_url('staff/tambah_explicit');?>" class="nav-link ">
                                            <span class="title">Tambah Explicit</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?=site_url('staff/explicit');?>" class="nav-link ">
                                            <span class="title">List Explicit</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="heading">
                                <h3 class="uppercase">Search</h3>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?=site_url("staff/search")?>" class="nav-link nav-toggle">
                                    <i class="icon-list"></i>
                                    <span class="title">Search</span>
                                    <span class="arrow"></span>
                                </a>
                            </li>
                            <li class="heading">
                                <h3 class="uppercase">Video Konferensi</h3>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-list"></i>
                                    <span class="title">Video Konferensi</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?= base_url('staff/tambah-video') ?>" class="nav-link ">
                                            <span class="title">Tambah Video</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="<?= base_url('staff/data_video') ?>" class="nav-link ">
                                            <span class="title">Data Video</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <div class="page-fixed-main-content">