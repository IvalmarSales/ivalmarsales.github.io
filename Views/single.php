<?php
    if ( isset($_GET['page']) AND $_GET['page'] === md5('singlehtml') 
        AND isset($_GET['id']) AND is_numeric($_GET['id']) )
    {  
            $getId = $_GET["id"];       

            require_once 'Models/Read.php';

            // Tabela alvo
            $table = 'tbl_blognews';
            
            // Limpa os dados para uma nova pesquisa
            unset($records);
            
            // Exemplo de leitura de registros com condições
            $read = new Read($pdo, $table);
            $conditions = [ 'id' => $getId ];
            
            $orderBy = 'date_created'; // Ordenar por date_created decrescente  
            $limit = 1;
            $records = $read->readRecords($conditions, $limit, $orderBy);
            
            // Fechar conexão
            $db->disconnect(); 

            //print_r($records);

            //echo $records[0]['id_category'];

            include 'Controllers/arrays.php';
?>
        <section class="section wb">
            <div class="container">
                <div class="row">

                    <!-- AREA DE CONTEUDO PRINCIPAL DA DIREITA -->
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">                        
                        <div class="page-wrapper">

                            <!-- AREA DE EXIBIÇÃO DA NOTICIA BLOG -->

                            <!-- Titulo do conteudo -->                             
                            <div class="blog-title-area">

                                <span class="color-<?php echo  $arr_category[ $records[0]['id_category'] ][1]; ?>">
                                    <a href="index.php?page=<?php echo md5('blog-category-01'); ?>&id=<?php echo $records[0]['id_category']; ?>" title="">
                                        <?php echo $arr_category[ $records[0]['id_category'] ][0]; ?>
                                    </a>
                                </span>
                                
                                <h3><?php echo $records[0]['title']; ?></h3>

                                <div class="blog-meta big-meta">
                                    <small>
                                        <a href="index.php?page=<?php echo md5('singlehtml'); ?>&idtime=<?php echo date('Y-m-d', strtotime($records[0]['date_created'])); ?>" title="">
                                            <?php echo date('d-m-y H:i', strtotime($records[0]['date_created'])); ?>
                                        </a>
                                    </small>
                                    <small>
                                        <a href="blog-author.html?id=<?php echo $records[0]['id_author']; ?>" title="">
                                            <?php echo $arr_author[ $records[0]['id_author'] ][0]; ?>
                                        </a>
                                    </small>
                                    <?php $trendView = 1 + (int)$records[0]['trend_view']; ?>
                                    <small><a href="#" title=""><i class="fa fa-eye"></i> <?php echo $trendView; ?></a></small>
                                </div><!-- end meta <div class="blog-meta big-meta"> -->

                            </div><!-- end title <div class="blog-title-area"> -->

                            <!-- Foto principal do conteudo saojoaointinerante2024 -->
                            <div class="single-post-media">
                                <?php if ($records[0]['id_category'] == 1) { ?>
                                <img src="Public/upload/<?php echo $records[0]['photo_main']; ?>_single_800x460.jpg" alt="" class="img-fluid">
                                <?php ; } ?>
                                <?php if ($records[0]['id_category'] == 6) { ?>
                                <img src="Public/upload/<?php echo $records[0]['photo_main']; ?>_fly_690x1024.jpg" alt="" class="img-fluid">
                                <?php ; } ?>

                            </div><!-- end media <div class="single-post-media"> -->
                            
                            <!-- Texto do conteudo - ( Quebrar informaçoes com string "<pp>" ) -->
                            <div class="blog-content">                                
                               
                                <div class="pp">
                                    <p><?php echo nl2br($records[0]['content']); ?></p>
                                </div>                               
                             
                            </div><!-- end content -->

                            <?php
                                /* ATUALIZA A QUANTIDADE DE VISUALIZAÇOES DO CONTEUDO */
                                require_once 'Models/Update.php';
                                // Tabela alvo
                                //$table = 'tbl_blognews';
                                
                                // Exemplo de atualização de registro
                                $update = new Update($pdo, $table);

                                $data = [ 'trend_view' => (int)$trendView ];
                                $conditions = [ 'id' => $getId ];
                                
                                $update->updateRecord($data, $conditions);
                                
                                /* if ($update->updateRecord($data, $conditions)) { echo "Registro atualizado com sucesso!"; } else { echo "Erro ao atualizar o registro."; } */                              
                                
                                // Fechar conexão
                                $db->disconnect();                                  
                            ?>
                            <!-- END - AREA DE EXIBIÇÃO DA NOTICIA BLOG -->    

                            <!-- TAGS AREA & SHARING AREA -->
                            <div class="blog-title-area">

                                <div class="tag-cloud-single">
                                    <span>Tags</span>
                                    <?php                                         
                                        $tags_arr = explode(", ", $records[0]['tags_array']);
                                        foreach ($tags_arr as $key => $value) {                                            
                                            echo "<small><a href='#' title=''>{$value}</a></small>";
                                        }
                                    ?>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#" class="fb-button btn btn-primary">
                                            <i class="fa fa-facebook-square"></i>
                                                <span class="down-mobile">Share on Facebook</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="tw-button btn btn-primary">
                                                <i class="fa fa-twitter"></i> 
                                                <span class="down-mobile">Tweet on Twitter</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="gp-button btn btn-primary">
                                                <i class="fa fa fa-instagram"></i>
                                                <span class="down-mobile">Post on Instagram</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- end post-sharing -->

                            </div><!-- end title <div class="blog-title-area"> -->
                            <!-- TAGS AREA & SHARING AREA -->

                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">About author</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="Public/upload/author.jpg" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#">Jessica</a></h4>
                                        <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Cloapedia!</p>

                                        <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box <div class="custombox authorbox clearfix"> -->

                            <hr class="invis1">

                            <!-- AREA COMENTARIOS -->                            
                            <div class="custombox clearfix">

                                <h4 class="small-title">3 Comments</h4>

                                <div class="row">                                    
                                    <div class="col-lg-12">
                                        <div class="comments-list">

                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="Public/upload/author.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name">Amanda Martines <small>5 days ago</small></h4>
                                                    <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar jean.</p>
                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>

                                            <!-- Ultimo comentario da lista "last-child" -->
                                            <div class="media last-child">
                                                <a class="media-left" href="#">
                                                    <img src="Public/upload/author_02.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">

                                                    <h4 class="media-heading user_name">Marie Johnson <small>5 days ago</small></h4>
                                                    <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>

                                        </div><!-- end col <div class="comments-list"> -->
                                    </div><!-- end col -->
                                </div><!-- end row -->

                            </div><!-- end custom-box -->
                            <!-- END - AREA COMENTARIOS -->

                            <hr class="invis1">

                            <!-- AREA FORMULARIO COMENTARIOS -->
                            <div class="custombox clearfix">
                                <h4 class="small-title">Deixe seu comentario</h4>
                                <div class="row">
                                    <div class="col-lg-12">

                                        <form class="form-wrapper">
                                            <input type="text" class="form-control" placeholder="Seu Nome">
                                            <input type="text" class="form-control" placeholder="Endereço de Email">
                                            <textarea class="form-control" placeholder="Escreva seu comentario para analise."></textarea>
                                            <button type="submit" class="btn btn-primary">Enviar Comentario</button>
                                        </form>

                                    </div>
                                </div>
                            </div><!-- end col <div class="custombox clearfix"> --> 
                            <!-- AREA FORMULARIO COMENTARIOS -->

                        </div><!-- end page-wrapper -->
                    </div><!-- end col <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12"> -->
                    <!-- END - AREA DE CONTEUDO PRINCIPAL DA DIREITA -->

                    <!-- AREA DE FERRAMENTAS DA ESQUERDA -->
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            
                            <!-- Pesquisar -->
                            <div class="widget">
                                <h2 class="widget-title">Pesquisar</h2>
                                <form class="form-inline search-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Pesquisar neste site">
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </form>
                            </div><!-- end widget -->

                            <!-- Conteudos recente -->
                            <div class="widget">
                                <h2 class="widget-title">Conteudos recente</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">

                                    <?php        
                                        // Limpa os dados para uma nova pesquisa
                                        unset($records);

                                        // Exemplo de leitura de registros com condições
                                        $read = new Read($pdo, $table);
                                        $conditions = [ 'id' => ['not' => $getId], 'id_category' => ['not' => 6], 'is_active' => 1 ];

                                        $orderBy = 'date_created'; // Ordenar por date_created decrescente
                                        $limit = 5;
                                        
                                        $records = $read->readRecords($conditions, $limit, $orderBy);

                                        // Fechar conexão
                                        $db->disconnect();

                                        $total_records = count($records);
                                        $count_row = 0;

                                        // Loop para percorrer os itens e retornar os valores
                                        foreach ($records as $record) 
                                        { 
                                            ++$count_row;
                                        ?>   
                                            <a href="single.html?id=<?php echo $record['id']; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <?php if ($count_row < $total_records){ ?> <div class="w-100 justify-content-between"> <?php } else { ?> <div class="w-100 last-item justify-content-between"> <?php ; } ?>
                                                    <!-- <img src="Public/upload/  -->
                                                     <?php //echo $record['photo_main']; ?>
                                                    <!--  _blogsquare_800x800.jpg" alt="" class="img-fluid float-left"> -->
                                                    <h5 class="mb-1"><?php echo $record['title']; ?></h5>
                                                    <small><?php echo date('d/m/Y H:i', strtotime($record['date_created'])); ?></small>
                                                </div>
                                            </a>
                                        <?php
                                        }
                                    ?>
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <!-- Advertising FOTO DESTAQUE  -->
                            <div class="widget">
                                <h2 class="widget-title">Advertising</h2>
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="Public/upload/banner_03.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget -->

                            <!-- Album de fotos -->
                            <div class="widget">
                                <h2 class="widget-title">Album de fotos</h2>

                                <div class="instagram-wrapper clearfix">
                                    <a href="#"><img src="Public/upload/insta_01.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="Public/upload/insta_02.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="Public/upload/insta_03.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="Public/upload/insta_04.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="Public/upload/insta_05.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="Public/upload/insta_06.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="Public/upload/insta_07.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="Public/upload/insta_08.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="Public/upload/insta_09.jpeg" alt="" class="img-fluid"></a>
                                </div><!-- end Instagram wrapper -->

                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Categorias</h2>

                                <div class="link-widget">
                                    <ul>
                                        <li><a href="#">Fahsion <span>(21)</span></a></li>
                                        <li><a href="#">Lifestyle <span>(15)</span></a></li>
                                        <li><a href="#">Art & Design <span>(31)</span></a></li>
                                        <li><a href="#">Health Beauty <span>(22)</span></a></li>
                                        <li><a href="#">Clothing <span>(66)</span></a></li>
                                        <li><a href="#">Entertaintment <span>(11)</span></a></li>
                                        <li><a href="#">Food & Drink <span>(87)</span></a></li>
                                    </ul>
                                </div><!-- end link-widget -->
                                
                            </div><!-- end widget -->

                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                    <!-- END - AREA DE FERRAMENTAS DA ESQUERDA -->

                </div><!-- end row -->
            </div><!-- end container -->
        </section>
<?php 
    }
    else
    { include_once('./views/mainpage.php'); }
?>