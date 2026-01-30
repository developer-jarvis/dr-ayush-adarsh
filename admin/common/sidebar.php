<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.php" class="app-brand-link">

            <img src="../assets/images/logo/logo.jpeg" alt="" class="img-fluid" width="80px">
            <!-- <span class="app-brand-text demo menu-text text-uppercase fw-bolder ms-2">Admin</span> -->
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Gallery Management -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-image"></i>
                <div data-i18n="Gallery">Gallery</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="gallery.php" class="menu-link">
                        <div data-i18n="View Gallery">View Gallery</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="add-gallery.php" class="menu-link">
                        <div data-i18n="Add Gallery">Add Gallery</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- About Sections Management -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="About">About Sections</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="about-sections.php" class="menu-link">
                        <div data-i18n="Manage Sections">Manage Sections</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="add-about-section.php" class="menu-link">
                        <div data-i18n="Add Section">Add Section</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Other Management -->
        <!-- <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Other Management</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="about-manage.php" class="menu-link">
                        <div data-i18n="About Management">About Management</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="migrate-gallery-about.php" class="menu-link">
                        <div data-i18n="Database Setup">Database Setup</div>
                    </a>
                </li>
            </ul>
        </li> -->

    </ul>
</aside>