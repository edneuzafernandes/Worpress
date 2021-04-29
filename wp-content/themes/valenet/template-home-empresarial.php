<?php /* template name: Home empresarial */ ?>
<?php get_header() ?>
    <?php get_template_part('parts/home/banner-principal') ?>
    <?php get_template_part('parts/home/bar-menu-sistema') ?>
    <main class="main-site main-site-empresa inner">
        <?php get_template_part('parts/home/planos-empresarial') ?>
        <?php get_template_part('parts/home/produtos-valenet') ?>
    </main>
    <?php get_template_part('parts/home/banner-institucional') ?>
    <?php get_template_part('parts/home/blog-home') ?>

<?php get_footer() ?>