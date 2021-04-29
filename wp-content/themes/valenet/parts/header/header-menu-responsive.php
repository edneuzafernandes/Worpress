<nav>
    <!-- <div class="body-menu-responsive"> -->
        <?php
        wp_nav_menu([
        // 'menu'            => 'top',
            'theme_location' => 'menu_topo',
        // 'container'       => 'div',
            'container_id' => 'bs4navbar',
            'container_class' => 'body-menu-responsive',
            'menu_id' => false,
            'menu_class' => 'lista-menu',
            'depth' => 2,
            'fallback_cb' => 'bs4navwalker::fallback',
            // 'link_before' => '<span>', 
            // 'link_after' => '</span>',
            'walker' => new bs4navwalker()
        ]);
        ?>

<div class="">
                        <a href="https://assinante4.valenet.com.br" class="btn btn-site">Sou Assinante</a>
                    </div>
        <!-- <ul class="lista-menu">
            <li class="nav-item active">
                <a class="nav-link" href="#"> <span> Home </span> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> <span> Portfólio </span> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> <span> Serviços </span> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">  <span> Sobre </span> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> <span> Contato </span> </a>
            </li>
        </ul> -->
    <!-- </div> -->
</nav>