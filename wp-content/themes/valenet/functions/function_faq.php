<?php
function agrupaFaq($idTerm, $termName){
    ?>
    <div class="accordion" id="<?= $termName ?>">
        <?php
        $argsFaq = array(
            'post_type'         => 'faq',
            'posts_per_page'    => -1,
            'tax_query'         => array(
                array(
                    'taxonomy'  => 'categoria-faq',
                    'field'     => 'term_id',
                    'terms'     => $idTerm
                )
            )
        ); 
        $faq = new WP_Query($argsFaq);
        if($faq->have_posts()):
            $count = 1;
            while($faq->have_posts()): $faq->the_post();
                $idPost = get_the_ID();
                $namePost = get_post($idPost);
                // echo $namePost->name;
                // var_dump($namePost);
                ?>
                    <div class="item-faq">
                        <div class="cr" id="<?= $termName ?>">
                            <h5 class="mb-0">
                                <a class="link-faq" data-toggle="collapse" data-target="#<?php echo $namePost->post_name ?>" aria-expanded="true" aria-controls="<?= get_the_ID() ?>">
                                    <?php echo $count . " ) "; the_title() ?>
                                </a>
                            </h5>
                        </div>

                        <div id="<?php echo $namePost->post_name ?>" class="collapse" aria-labelledby="<?= $termName ?>" data-parent="#<?= $termName ?>">
                            <div class="card-body">
                                <?php the_content() ?>
                            </div>
                        </div>

                    </div>
                <?php
                $count++;
            endwhile;
        endif;
        ?>
    </div>
    <?php
}