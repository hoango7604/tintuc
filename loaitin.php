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

	// print_r($loaitin);
?>

	<?php
		include_once 'public/header.php';
	?>

	<!-- Page Content -->
    <div class="container">
        <div class="row">
            
            <?php
            	include_once 'public/menu.php';
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
			                            <a href="chitiet.html">
			                                <br>
			                                <img width="200px" height="200px" class="img-responsive" src="public/image/tintuc/<?php echo $tintuc[$i]->Hinh ?>" alt="">
			                            </a>
			                        </div>

			                        <div class="col-md-9">
			                            <h3><?php echo $tintuc[$i]->TieuDe ?></h3>
			                            <p><?php echo $tintuc[$i]->TomTat ?></p>
			                            <a class="btn btn-primary" href="chitiet.html">Đọc tiếp <span class="glyphicon glyphicon-chevron-right"></span></a>
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
                            <ul class="pagination">
                                <li>
                                    <a href="#">&laquo;</a>
                                </li>
                                <li class="active">
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li>
                                    <a href="#">4</a>
                                </li>
                                <li>
                                    <a href="#">5</a>
                                </li>
                                <li>
                                    <a href="#">&raquo;</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->

<?php
	include_once 'public/footer.php';
?>