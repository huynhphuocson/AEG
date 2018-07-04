<html>
    <head>
        <?php $this->load->view('admin/head')?>
    </head>

    <body>
        <div class="pace  pace-inactive">
            <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
                <div class="pace-progress-inner">
                </div>
            </div>
            <div class="pace-activity">
            </div>
        </div>
        <div class="app">
            <div class="layout">
                <!-- left -->
                <div class="side-nav">
                    <?php $this->load->view('admin/left', $this->data)?>
                </div>
                <!-- End left -->
                <!-- page container -->
                <div class="page-container">
                    <!--header start -->
                    <div class="header navbar">
                        <div class="header-container">
                            <?php $this->load->view('admin/header')?>
                        </div>
                    </div>
                    <!--header End -->
                    <!--side pannel start -->
                    <div class="side-panel">
                        <?php /*$this->load->view('admin/side_panel')*/?>
                    </div>
                    <!--side pannel end -->
                    <!-- theme configurator START -->
                    <div class="theme-configurator">
                        <?php /*$this->load->view('admin/theme_configurator')*/?>
                    </div>
                    <!-- theme configurator End -->
                    <!-- Theme Toggle Button START -->
                    <button class="theme-toggle btn btn-rounded btn-icon">
                        <i class="ti-palette"></i>
                    </button>
                    <!-- Theme Toggle Button End -->
                    <!-- Content Wrapper START -->
                    <div class="main-content">
                        <div class="container-fluid">
                            <?php $this->load->view($temp, $this->data)?>
                        </div>
                    </div>
                    <!-- Content Wrapper End -->
                    <!-- Footer START -->
                    <div class="content-footer">
                        <?php $this->load->view('admin/footer')?>
                    </div>
                    <!-- Footer End -->
                </div>
                <!-- End page container -->
            </div>
        </div>
        <?php $this->load->view('admin/js')?>
    </body>
</html>