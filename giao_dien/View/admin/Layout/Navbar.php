<div class="theme-setting-wrapper">
    <div id="settings-trigger"><i class="ti-settings"></i></div>
    <div id="theme-settings" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
        </div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
        </div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
        </div>
    </div>
</div>
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_settings-panel.html -->
    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">User Pages</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="index.php?controller=Login"> Login </a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/documentation/documentation.html">
                    <i class="ti-palette menu-icon"></i>
                    <span class="menu-title">Color</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/documentation/documentation.html">
                    <i class="ti-ruler-pencil menu-icon"></i>
                    <span class="menu-title">Size</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=categoryAdmin">
                    <i class="ti-menu-alt menu-icon"></i>
                    <span class="menu-title">Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/documentation/documentation.html">
                    <i class="ti-credit-card menu-icon"></i>
                    <span class="menu-title">Payment method</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/documentation/documentation.html">
                    <i class="ti-truck menu-icon"></i>
                    <span class="menu-title">Delivery method</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/documentation/documentation.html">
                    <i class="ti-user menu-icon"></i>
                    <span class="menu-title">Costumer</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/documentation/documentation.html">
                    <i class="ti-headphone-alt menu-icon"></i>
                    <span class="menu-title">Staff</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=productAdmin">
                    <i class="ti-shopping-cart menu-icon"></i>
                    <span class="menu-title">Product</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/documentation/documentation.html">
                    <i class="ti-shopping-cart-full menu-icon"></i>
                    <span class="menu-title">Product detail</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/documentation/documentation.html">
                    <i class="ti-wallet menu-icon"></i>
                    <span class="menu-title">Order</span>
                </a>
            </li>
        </ul>
    </nav>