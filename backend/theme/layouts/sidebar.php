<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Rektor', 'icon' => 'tachometer-alt','url'=>['/rektor/']],
                    ['label' => 'Dekan', 'icon' => 'tachometer-alt','url'=>['/fakultet-dekan/']],
                    ['label' => 'Dekan Muovin', 'icon' => 'tachometer-alt','url'=>['/fakultet-dekan-movin/']],
                    ['label' => 'Talabalar', 'icon' => 'tachometer-alt','url'=>['/talabalar/']],
                    ['label' => 'Fakultetlar', 'icon' => 'tachometer-alt','url'=>['/fakultetlar/']],
                    ['label' => "O'qish turi", 'icon' => 'tachometer-alt','url'=>['/uqish-turi/']],
                    ['label' => "Talaba turi", 'icon' => 'tachometer-alt','url'=>['/talaba-turi/']],
                    ['label' => "Kafedra ", 'icon' => 'tachometer-alt','url'=>['/kafedra/']],
                    ['label' => "Kafedra mudiri", 'icon' => 'tachometer-alt','url'=>['/kafedra-mudiri/']],
                    ['label' => "Talaba turi", 'icon' => 'tachometer-alt','url'=>['/talaba-turi/']],
                    ['label' => "Talaba turi", 'icon' => 'tachometer-alt','url'=>['/talaba-turi/']],

                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>