<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admins/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Marvel 2000</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admins/dist/img/g.jpg') }}" style="width: 50px;" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Gizem Yıldız</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Anasayfa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="slider.php" class="nav-link">
                        <i class="nav-icon fas fa-photo-video"></i>
                        <p>
                            Slider
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Hakkımızda
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Ayarlar
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="settings.php?page=settings" class="nav-link ">
                                <i class="fas fa-cogs"></i>
                                <p>Genel Ayarlar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="settings.php?page=user" class="nav-link">
                                <i class="fas fa-user-cog"></i>
                                <p>Kullanıcı Ayarları</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="settings.php?page=social" class="nav-link">
                                <i class="fab fa-facebook"></i>
                                <p>Sosyal Medya</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-item">
                    <a href="resume.php" class="nav-link">
                        <i class=" fa fa-comment-alt"></i>
                        <p>
                           Özgeçmiş
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="services.php" class="nav-link">
                        <i class=" fa fa-comment-alt"></i>
                        <p>
                           Servisler
                            <!-- <span class="right badge badge-danger"></span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="blogs.php" class="nav-link">
                        <i class=" fa fa-comment-alt"></i>
                        <p>
                            Blog yazıları
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="gallery.php" class="nav-link">
                        <i class="fas fa-image"></i>
                        <p>
                            Galeri
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="team_members.php" class="nav-link">
                        <i class="fas fa-user-friends"></i>
                        <p>
                            Ekibimiz
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="category.php" class="nav-link">
                        <i class="fas fa-ellipsis-v"></i>
                        <p>
                            Kategoriler
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="comments.php" class="nav-link">
                        <i class="fas fa-comments"></i>
                        <p>
                            Yorumlar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link" style="background: none; border: none; padding: 0; text-align: left;">
                            <i class="fas fa-sign-out-alt"></i>
                            <p style="display: inline;">Çıkış Yap</p>
                        </button>
                    </form>
                </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>