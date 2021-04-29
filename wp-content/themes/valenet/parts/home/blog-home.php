<?php
    $url         =  'http://fibradosnarede.valenet.com.br/wp-json/wp/v2/posts?_embed&per_page=3';
    $ch = curl_init($url);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
    $result = curl_exec( $ch );
    $result = json_decode( $result, true );

    // foreach($result as $post){
    //     echo $post['title']['rendered'];
    //     // echo $posts->excerpt;
    // }
    $count = 1;
?>

<!-- retira posts do blog

<section class="blog-home main-site inner">
    <div class="container">
        <h4 class="inner"> Blog Fibrados na Rede  </h4>
        <div class="blogposts">
            <div class="col-blog">
                <?php foreach($result as $post){ ?>
                <?php if($count < 2): ?>
                <?php 
                $featuredIndex = $post['_embedded']['wp:featuredmedia'];
                foreach($featuredIndex  as $imgBlog){
                    $urlImg = $imgBlog['media_details']['sizes']['medium']['source_url'] ;
                }
                ?>
                <div class="item-blog">
                    <a href="<?php echo $post['link'] ?>" class='link-blog'>
                        <img src="<?= $urlImg  ?>" alt="<?= $post['title']['rendered']?>" height="">
                        <header>
                            <h5> <?= $post['title']['rendered']; ?> </h5>
                        </header>
                    </a>
                </div>
                <?php endif; ?>
                <?php $count++; ?>
                <?php } ?>
            </div>
            <div class="col-blog sencond-col">
            <?php $countB2 = 1 ?>
            <?php foreach($result as $post){ ?>
                <?php if($countB2 > 1): ?>
                <?php 
                $featuredIndex = $post['_embedded']['wp:featuredmedia'];
                foreach($featuredIndex  as $imgBlog){
                    $urlImg = $imgBlog['media_details']['sizes']['medium']['source_url'] ;
                }
                ?>
                <div class="item-blog">
                    <a href="<?php echo $post['link'] ?>" class='link-blog'>
                        <img src="<?= $urlImg  ?>" alt="<?= $post['title']['rendered']?>" height="">
                        <header>
                            <h5> <?= $post['title']['rendered']; ?> </h5>
                        </header>
                    </a>
                </div>
                <?php endif; ?>
                <?php $countB2++; ?>
                <?php } ?>
                 <div class="item-blog item-blog-secundario">
                    <a href="" class="link-blog">
                        <img src="<?= get_template_directory_uri() ?>/assets/images/img-blog2.png" alt="">
                        <header>
                            <h5> Data Center: o que é a solução e como ela impacta no seu negócio? </h5>
                        </header>
                    </a>
                </div>
                <div class="item-blog item-blog-secundario">
                    <a href="" class="link-blog">
                        <img src="<?= get_template_directory_uri() ?>/assets/images/img-blog3.png" alt="">
                        <header>
                            <h5> Data Center: o que é a solução e como ela impacta no seu negócio? </h5>
                        </header>
                    </a>
                </div> 
            </div>
        </div>
    </div>
</section>
            -->
