<?php 
	include_once 'controller/c_tintuc.php';

	$c_tintuc = new C_tintuc();

	// Lấy toàn bộ nội dung
	$noi_dung = $c_tintuc->loaitin();

	// Lấy nội dung menu cấp 1, 2
    $menu1 = $noi_dung['menu1'];
    $menu2 = $noi_dung['menu2'];

    // Lấy loại tin
    $loaitin = $noi_dung['loaitin'];

    // Lấy tin tức
    $tintuc = $noi_dung['tintuc'];

    // Lấy thanh phân trang
    $thanhPhanTrang = $noi_dung['thanhPhanTrang'];

	// print_r($tintuc);
?>

	<?php
		include_once 'library/header.php';
	?>

	<!-- Page Content -->
    <div class="container">
        <div class="row">
            
            <?php
            	include_once 'library/menu.php';
            ?>

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b><?php echo $loaitin[0]->Ten ?></b></h4>
                    </div>

                    <div class="row-item row">
                    	<!-- Item -->
                    	<?php
                    		for ($i = 0; $i < count($tintuc); $i++){
                    			?>
                    				<div class="col-md-3">
			                            <a href="chitiet.php?id=<?php echo $tintuc[$i]->id ?>">
			                                <br>
			                                <img width="200px" height="200px" class="img-responsive" src="public/image/tintuc/<?php echo $tintuc[$i]->Hinh ?>" alt="">
			                            </a>
			                        </div>

			                        <div class="col-md-9">
			                            <h3><?php echo $tintuc[$i]->TieuDe ?></h3>
			                            <p><?php echo $tintuc[$i]->TomTat ?></p>
			                            <a class="btn btn-primary" href="chitiet.php?id=<?php echo $tintuc[$i]->id ?>">Đọc tiếp <span class="glyphicon glyphicon-chevron-right"></span></a>
			                        </div>
			                        <div class="break"></div>
                    			<?php
                    		}
                    	?>

                        <!-- end item -->
                    </div>

                    <!-- Pagination -->
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <?php echo $thanhPhanTrang ?>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->

<?php
	include_once 'library/footer.php';
?>