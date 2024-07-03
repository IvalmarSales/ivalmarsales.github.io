        <?php include 'Controllers/arrays.php'; ?>

        <!-- AREA FIXA, LINKS -->
        <section class="section first-section">
            <div class="container-fluid">

                <!-- Outdoors -->
                <div class="masonry-blog clearfix">
                    
                    <div class="left-side-fix">
                        <div class="masonry-box post-media">
                             <a href="index.php?page=<?php echo md5('Emaga'); ?>" title="Escola de Música">
                                <img src="Public/images/outdoor_emaga.jpg" alt="" class="img-fluid">
                            </a>                             
                        </div><!-- end post-media -->
                    </div><!-- end <div class="left-side-fix"> -->

                    <div class="left-side-fix">
                        <div class="masonry-box post-media">
                             <a href="index.php?page=<?php echo md5('LeiPG'); ?>" title="Lei Paulo Gustavo">
                                <img src="Public/images/outdoor_lpg.jpg" alt="" class="img-fluid">
                            </a>                             
                        </div><!-- end post-media -->
                    </div><!-- end <div class="left-side-fix"> -->
                    
                    <div class="left-side-fix">
                        <div class="masonry-box post-media">
                             <a href="index.php?page=<?php echo md5('PNAB'); ?>" title="Lei Aldir Blanc">
                                <img src="Public/images/outdoor_pnab.jpg" alt="" class="img-fluid">
                            </a>                             
                        </div><!-- end post-media -->
                    </div><!-- end <div class="left-side-fix">-->

                    <div class="right-side-fix">
                        <div class="masonry-box post-media">
                             <a href="index.php?page=<?php echo md5('StaCecil'); ?>" title="Banda Santa Cecília">
                                <img src="Public/images/outdoor_stacecil.jpg" alt="" class="img-fluid">
                            </a>                             
                        </div><!-- end post-media -->
                    </div><!-- end <div class="right-side-fix">-->

                </div><!-- end <div class="masonry-blog clearfix"> -->
                <!-- end Outdoors -->
                    
            </div><!-- end <div class="container-fluid"> -->
        </section><!-- end <section class="section first-section"> -->
        <!-- END - AREA FIXA, LINKS -->  
        
        <?php
            //Conexao com o banco de dados.
            require_once 'Models/Read.php';

            // Tabela alvo
            $table = 'tbl_blognews';

            // Exemplo de leitura de registros com condições
            $read = new Read($pdo, $table);
            $conditions = ['id_category' => 1, 'is_highlight' => 0, 'is_active' => 1];
            $orderBy = 'date_created'; // Ordenar por date_created decrescente
            $limit = 2;
            $records = $read->readRecords($conditions, $limit, $orderBy);

            // Fechar conexão
            $db->disconnect();
        ?>
        
        <section class="section first-section">
            <div class="container-fluid">

                <div class="masonry-blog clearfix">

                    <!-- NOTICIA 1 -->                    
                     <div class="left-side"><!-- class="hidden-md-down" -->
                        <div class="masonry-box post-media">
                             <img src="Public/upload/<?php echo $records[0]['photo_main']; ?>_home_534x468.jpg" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-<?php echo  $arr_category[ $records[0]['id_category'] ][1]; ?>">
                                            <a href="index.php?page=<?php echo md5('blog-category-01'); ?>&id=<?php echo $records[0]['id_category']; ?>" title="">
                                                <?php echo $arr_category[ $records[0]['id_category'] ][0] ?>
                                            </a>
                                        </span>
                                        <h4>
                                            <a href="index.php?page=<?php echo md5('singlehtml'); ?>&id=<?php echo $records[0]['id']; ?>" title="">
                                                <?php echo $records[0]['title']; ?>
                                            </a>
                                        </h4>
                                        <small> 

                                            <a href="index.php?page=<?php echo md5('singlehtml'); ?>&idtime=<?php echo date('Y-m-d', strtotime($records[0]['date_created'])); ?>" title="">
                                                <?php                                                 
                                                echo date('d-m-y H:i', strtotime($records[0]['date_created']));
                                                ?>
                                            </a>
                                        </small>
                                        <small>
                                            <a href="blog-author.html?id=<?php echo $records[0]['id_author']; ?>" title="">
                                                <?php echo $arr_author[ $records[0]['id_author'] ][0]; ?>
                                            </a>
                                        </small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadoweffect -->
                        </div><!-- end <div class="masonry-box post-media"> -->
                    </div><!-- end left-side -->
                    <!-- NOTICIA 1 : END -->

                    <!-- ESPAÇO CENTRAL entre NOTICIA 1 e 2 -->
                    <div class="center-side">

                        <!-- CENTRO ARTEZANATOS -->                        
                        <div class="masonry-box post-media">
                             <a href="index.php?page=<?php echo md5('CentroArt'); ?>" title="Centro de Artezanatos">
                                <img src="Public/images/outdoor_centrart.jpg" alt="" class="img-fluid">
                            </a>
                        </div><!-- end post-media -->
                        <!-- CENTRO ARTEZANATOS -->

                        <!-- NOTICIA MINI 1 -->
                        <div class="masonry-box small-box post-media hidden-md-down">
                             <img src="Public/upload/blog_masonry_03.jpg" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-green">
                                            <a href="blog-category-01.html" title="">Travel</a>
                                        </span>
                                        <h4>
                                            <a href="single.html" title="">Separate your place with exotic hotels</a>
                                        </h4>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadoweffect -->
                        </div><!-- end post-media -->
                        <!-- NOTICIA MINI 1 : END -->

                        <!-- NOTICIA MINI 2 -->                        
                        <div class="masonry-box small-box post-media hidden-md-down">
                             <img src="Public/upload/blog_masonry_04.jpg" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-green">
                                            <a href="blog-category-01.html" title="">Travel</a>
                                        </span>
                                        <h4>
                                            <a href="single.html" title="">What you need to know for child health</a>
                                        </h4>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadoweffect -->
                        </div><!-- end post-media -->
                        <!-- NOTICIA MINI 2 : END -->

                    </div><!-- end <div class="center-side"> -->
                    <!-- END - ESPAÇO CENTRAL entre NOTICIA 1 e 2 -->

                    <!-- NOTICIA 2 -->
                    <div class="right-side">
                        <div class="masonry-box post-media">
                             <img src="Public/upload/<?php echo $records[1]['photo_main']; ?>_home_534x468.jpg" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-<?php echo $arr_category[ $records[1]['id_category'] ][1]; ?>">
                                            <a href="index.php?page=<?php echo md5('blog-category-01'); ?>&id=<?php echo $records[1]['id_category']; ?>" title="">
                                                <?php echo $arr_category[ $records[1]['id_category'] ][0]; ?>
                                            </a>
                                        </span>
                                        <h4>
                                            <a href="index.php?page=<?php echo md5('singlehtml'); ?>&id=<?php echo $records[1]['id']; ?>" title="">
                                                <?php echo $records[1]['title']; ?>
                                            </a>
                                        </h4>
                                        <small>
                                            <a href="index.php?page=<?php echo md5('singlehtml'); ?>&idtime=<?php echo date('Y-m-d', strtotime($records[1]['date_created'])); ?>" title="">
                                                <?php                                                 
                                                echo date('d-m-y H:i', strtotime($records[1]['date_created'])); ?>
                                            </a>
                                        </small>
                                        <small>
                                            <a href="blog-author.html?id=<?php echo $records[1]['id_author']; ?>" title="">
                                                <?php echo $arr_author[ $records[1]['id_author'] ][0];; ?>
                                            </a>
                                        </small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                             </div><!-- end shadoweffect -->
                        </div><!-- end post-media -->
                    </div><!-- end right-side -->                    
                    <!-- NOTICIA 2 : END -->
                    
                </div><!-- <div class="masonry-blog clearfix"> -->

            </div><!-- end <div class="container-fluid"> --> 
        </section><!-- end <section class="section first-section"> --> 

        <section class="section">
            <div class="container">

                <div class="row">
                    <!-- AREA DESTAQUES - highlight -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <?php
                                    unset($records);

                                    // Exemplo de leitura de registros com condições
                                    $read = new Read($pdo, $table);
                                    $conditions = [ 'is_highlight' => 1, 'is_active' => 1 ];
                                    $orderBy = 'date_created'; // Ordenar por date_created decrescente
                                    $limit = 1;
                                    $records = $read->readRecords($conditions, $limit, $orderBy);

                                    // Fechar conexão
                                    $db->disconnect();                                    
                                ?>

                        <div class="section-title">
                            <h3 class="color-<?php echo $arr_category[ $records[0]['id_category'] ][1]; ?>">
                                <a href="index.php?page=<?php echo md5('blog-category-01'); ?>&id=<?php echo $records[0]['id_category']; ?>" title="">
                                    <?php echo $arr_category[ $records[0]['id_category'] ][0]; ?>
                                </a>
                            </h3>
                        </div><!-- end title -->

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="blog-box">

                                    <div class="post-media">
                                        <a href="index.php?page=<?php echo md5('singlehtml'); ?>&id=<?php echo $records[0]['id']; ?>" title="">
                                            <img src="Public/upload/<?php echo $records[0]['photo_main']; ?>_highlight_1024x550.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div><!-- end hovereffect -->
                                        </a>
                                    </div><!-- end media -->

                                    <div class="blog-meta big-meta">
                                        <h4>
                                            <a href="index.php?page=<?php echo md5('singlehtml'); ?>&id=<?php echo $records[0]['id']; ?>" title="">
                                                <?php echo $records[0]['title']; ?>
                                            </a>
                                        </h4>
                                        <p><?php echo substr( $records[0]['content'] , 0, 310) . "..."; ?></p>
                                        <small>
                                            <a href="blog-category-01.html" title="">
                                                <?php echo substr( $records[0]['tags_array'] , 0, 34); ?>
                                            </a>
                                        </small>
                                        <small>
                                            <a href="index.php?page=<?php echo md5('singlehtml'); ?>&idtime=<?php echo date('Y-m-d', strtotime($records[0]['date_created'])); ?>" title="">
                                                <?php                                                 
                                                    echo date('d-m-y H:i', strtotime($records[0]['date_created']));
                                                ?>
                                            </a>
                                        </small>
                                        <small><a href="blog-author.html" title=""><?php echo $arr_author[ $records[0]['id_author'] ][0]; ?></a></small>
                                    </div><!-- end meta -->

                                </div><!-- end <div class="blog-box"> -->

                            </div><!-- end <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
                        </div><!-- end <div class="row"> -->

                    </div><!-- end <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> -->
                    <!-- AREA DESTAQUES - highlight -->


                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                        <?php
                            unset($records);

                            // Exemplo de leitura de registros com condições
                            $read = new Read($pdo, $table);
                            $conditions = [ 'id_category' => 6, 'is_active' => 1 ];
                            $orderBy = 'date_created'; // Ordenar por date_created decrescente
                            $limit = 2;
                            $records = $read->readRecords($conditions, $limit, $orderBy);

                            // Fechar conexão
                            $db->disconnect();
                        ?>

                        <div class="section-title">
                            <h3 class="color-aqua">
                                <a href="index.php?page=<?php echo md5('blog-category-01'); ?>&id=6" title="">Eventos</a>
                            </h3>
                        </div><!-- end title -->

                        <!-- AREA FLYER EVENTOS -->
                        <div class="row">

                            <!-- Flyer 1, Evento -->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <div class="blog-box">

                                    <div class="post-media">
                                        <a href="index.php?page=<?php echo md5('singlehtml'); ?>&id=<?php echo $records[0]['id']; ?>" title="">
                                            <img src="Public/upload/<?php echo $records[0]['photo_main']; ?>_fly_690x1024.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div><!-- end hovereffect -->
                                        </a>
                                    </div><!-- end media -->

                                    <div class="blog-meta">
                                        <h4>
                                            <a href="index.php?page=<?php echo md5('singlehtml'); ?>&id=<?php echo $records[0]['id']; ?>" title="">
                                                <?php echo $records[0]['title']; ?>
                                            </a>
                                        </h4>
                                        <small>
                                            <a href="blog-category-01.html" title=""><?php echo $records[0]['tags_array']; ?></a>
                                        </small>
                                        <small><a href="index.php?page=<?php echo md5('singlehtml'); ?>&idtime=<?php echo date('Y-m-d', strtotime($records[0]['date_created'])); ?>" title="">
                                            <?php                                                 
                                                echo date('d-m-y', strtotime($records[0]['date_created']));
                                            ?>
                                        </a></small>
                                    </div><!-- end meta -->

                                </div><!-- end blog-box -->

                            </div><!-- end <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> -->
                            <!-- end - Flyer 1, Evento -->

                            <!-- Flyer 2, Evento -->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <div class="blog-box">

                                    <div class="post-media">
                                        <a href="index.php?page=<?php echo md5('singlehtml'); ?>&id=<?php echo $records[1]['id']; ?>" title="">
                                            <img src="Public/upload/<?php echo $records[1]['photo_main']; ?>_fly_690x1024.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div><!-- end hovereffect -->
                                        </a>
                                    </div><!-- end media -->                              

                                    <div class="blog-meta">
                                        <h4><a href="index.php?page=<?php echo md5('singlehtml'); ?>&id=<?php echo $records[1]['id']; ?>" title=""><?php echo $records[1]['title']; ?></a></h4>
                                        <small><a href="blog-category-01.html" title="">
                                            <?php echo $records[1]['tags_array']; ?>
                                        </a></small>
                                        <small><a href="index.php?page=<?php echo md5('singlehtml'); ?>&idtime=<?php echo date('Y-m-d', strtotime($records[1]['date_created'])); ?>" title="">
                                            <?php                                                 
                                                echo date('d-m-y', strtotime($records[1]['date_created']));
                                            ?> 
                                        </a></small>
                                    </div><!-- end meta -->
                                    
                                </div><!-- end <div class="blog-box"> -->

                            </div><!-- end <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> -->
                            <!-- end - Flyer 2, Evento -->

                        </div><!-- end <div class="row"> -->
                        <!-- END - AREA FLYER EVENTOS -->

                    </div><!-- end <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> -->

                </div><!-- end <div class="row"> -->

                <hr class="invis1">

                <div class="row">

                    <div class="col-lg-9">

                        <div class="blog-list clearfix">

                            <div class="section-title">
                                <h3 class="color-green"><a href="blog-category-01.html" title="">Travel</a></h3>
                            </div><!-- end title -->

                            <div class="blog-box row">

                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="single.html" title="">
                                            <img src="Public/upload/blog_square_01.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end <div class="col-md-4"> -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="single.html" title="">5 Beautiful buildings you need to visit without dying</a></h4>
                                    <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                    <small><a href="blog-category-01.html" title="">Travel</a></small>
                                    <small><a href="single.html" title="">21 July, 2017</a></small>
                                    <small><a href="blog-author.html" title="">by Boby</a></small>
                                </div><!-- <div class="blog-meta big-meta col-md-8"> -->

                            </div><!-- end <div class="blog-box row"> -->

                            <hr class="invis">

                            <div class="blog-box row">

                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="single.html" title="">
                                            <img src="Public/upload/blog_square_02.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end <div class="col-md-4"> -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="single.html" title="">Let's make an introduction to the glorious world of history</a></h4>
                                    <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                    <small><a href="blog-category-01.html" title="">Travel</a></small>
                                    <small><a href="single.html" title="">20 July, 2017</a></small>
                                    <small><a href="blog-author.html" title="">by Samanta</a></small>
                                </div><!-- end <div class="blog-meta big-meta col-md-8"> -->

                            </div><!-- end <div class="blog-box row"> -->

                        </div><!-- end <div class="blog-list clearfix"> -->

                        <hr class="invis">

                        <div class="blog-list clearfix">

                            <div class="section-title">
                                <h3 class="color-red"><a href="blog-category-01.html" title="">Food</a></h3>
                            </div><!-- end title -->

                            <div class="blog-box row">

                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="single.html" title="">
                                            <img src="Public/upload/blog_square_05.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end <div class="col-md-4"> -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="single.html" title="">Banana-chip chocolate cake recipe</a></h4>
                                    <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                    <small><a href="blog-category-01.html" title="">Food</a></small>
                                    <small><a href="single.html" title="">11 July, 2017</a></small>
                                    <small><a href="blog-author.html" title="">by Matilda</a></small>
                                </div><!-- end <div class="blog-meta big-meta col-md-8"> -->

                            </div><!-- end <div class="blog-box row"> -->

                        </div><!-- end <div class="blog-list clearfix"> -->

                    </div><!-- end <div class="col-lg-9"> -->

                    <div class="col-lg-3">

                        <div class="section-title">
                            <h3 class="color-yellow"><a href="blog-category-01.html" title="">Vlogs</a></h3>
                        </div><!-- end title -->

                        <div class="blog-box">

                            <div class="post-media">
                                <a href="single.html" title="">
                                    <img src="Public/upload/blog_10.jpg" alt="" class="img-fluid">
                                    <div class="hovereffect">
                                        <span class="videohover"></span>
                                    </div><!-- end hover -->
                                </a>
                            </div><!-- end media -->

                            <div class="blog-meta">
                                <h4><a href="single.html" title="">We are guests of ABC Design Studio - Vlog</a></h4>
                                <small><a href="blog-category-01.html" title="">Videos</a></small>
                                <small><a href="blog-category-01.html" title="">21 July, 2017</a></small>
                            </div><!-- end meta -->

                        </div><!-- end <div class="blog-box"> -->

                        <hr class="invis">

                        <div class="blog-box">

                            <div class="post-media">
                                <a href="single.html" title="">
                                    <img src="Public/upload/blog_11.jpg" alt="" class="img-fluid">
                                    <div class="hovereffect">
                                        <span class="videohover"></span>
                                    </div><!-- end hover -->
                                </a>
                            </div><!-- end media -->

                            <div class="blog-meta">
                                <h4><a href="single.html" title="">Nostalgia at work. Nostalgia at work</a></h4>
                                <small><a href="blog-category-01.html" title="">Videos</a></small>
                                <small><a href="blog-category-01.html" title="">20 July, 2017</a></small>
                            </div><!-- end meta -->

                        </div><!-- end <div class="blog-box"> -->

                        <hr class="invis">

                        <div class="section-title">
                            <h3 class="color-grey"><a href="blog-category-01.html" title="">Health</a></h3>
                        </div><!-- end title -->

                        <div class="blog-box">

                            <div class="post-media">
                                <a href="single.html" title="">
                                    <img src="Public/upload/blog_07.jpg" alt="" class="img-fluid">
                                    <div class="hovereffect">
                                        <span></span>
                                    </div><!-- end hover -->
                                </a>
                            </div><!-- end media -->

                            <div class="blog-meta">
                                <h4><a href="single.html" title="">Opened the doors of the Istanbul spa center</a></h4>
                                <small><a href="blog-category-01.html" title="">Spa</a></small>
                                <small><a href="blog-category-01.html" title="">21 July, 2017</a></small>
                            </div><!-- end meta -->

                        </div><!-- end <div class="blog-box"> -->

                    </div><!-- end <div class="col-lg-3"> -->

                </div><!-- end <div class="row"> -->

            </div><!-- end <div class="container"> -->
        </section><!-- end <section class="section"> -->