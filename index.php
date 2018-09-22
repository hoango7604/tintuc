<?php
    include_once 'controller/c_tintuc.php';

    // Tạo mới controller tintuc
    $c_tintuc = new C_tintuc();

    // Lấy toàn bộ nội dung
    $noi_dung = $c_tintuc->index();

    // Lấy nội dung slide
    $slide = $noi_dung['slide'];

    // Lấy nội dung menu cấp 1, 2
    $menu1 = $noi_dung['menu1'];
    $menu2 = $noi_dung['menu2'];

    // Lấy tin tức tóm tắt nổi bật
    $tintuc = $noi_dung['tintuc'];

    // print_r();
?>

<?php
    include_once 'library/header.php';
?>

    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                            for ($i = 0; $i < count($slide); $i++){
                                if ($i == 0){
                                    ?>
                                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i?>" class="active"></li>
                                    <?php
                                }
                                else{
                                    ?>
                                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i?>"></li>
                                    <?php
                                }
                            }
                        ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php 
                            for ($i = 0; $i < count($slide); $i++){
                                if ($i == 0){
                                    ?>
                                    <div class="item active">
                                        <img class="slide-image" src="public/image/slide/<?php echo $slide[$i]->Hinh?>" alt="">
                                    </div>
                                    <?php
                                }
                                else{
                                    ?>
                                    <div class="item">
                                        <img class="slide-image" src="public/image/slide/<?php echo $slide[$i]->Hinh?>" alt="">
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end slide -->

        <div class="space20"></div>

        <div class="row main-left">
            
            <?php
                include_once 'library/menu.php';
            ?>

            <!-- Tin tức -->
            <div class="col-md-9">
	            <div class="panel panel-default">
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;"> Tin Tức</h2>
	            	</div>

	            	<div class="panel-body">
                        <?php 
                            $j = 0;
                            for ($i = 0; $i < count($menu1); $i++){
                                ?>
                                    <!-- item -->
                                    <div class="row-item row">
                                        <h3>
                                            <?php echo $menu1[$i]->Ten ?> |
                                <?php
                                    while ($j < count($menu2) && $menu2[$j]->idTheLoai == $menu1[$i]->id){
                                        ?>
                                        <small><a href="loaitin.php?idLoaiTin=<?php echo $menu2[$j]->id ?>"><i><?php echo $menu2[$j]->Ten.' ' ?></i></a>/</small>
                                        <?php
                                        $j++;
                                    }
                                ?>
                                        </h3>
                                        <div class="col-md-12 border-right">
                                            <div class="col-md-3">
                                                <a href="chitiet.html">
                                                    <img class="img-responsive" src="public/image/tintuc/<?php echo $tintuc[$i]->Hinh ?>" alt="">
                                                </a>
                                            </div>

                                            <div class="col-md-9">
                                                <h3><?php echo $tintuc[$i]->TieuDe ?></h3>
                                                <p><?php echo $tintuc[$i]->TomTat ?></p>
                                                <a class="btn btn-primary" href="chitiet.html">Đọc tiếp <span class="glyphicon glyphicon-chevron-right"></span></a>
                                            </div>

                                        </div>

                                        <div class="break"></div>
                                    </div>
                                    <!-- end item -->
                                <?php
                            }
                        ?>
	            	</div>
	            </div>
        	</div>
            <!-- end tin tức -->
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

<?php 
    include_once 'public/footer.php';
?>
