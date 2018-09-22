<!-- Menu -->
<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
        	Menu
        </li>

        <?php
            $j = 0;
            for ($i = 0; $i < count($menu1); $i++){
                ?>
                    <li href="#" class="list-group-item menu1">
                        <?php echo $menu1[$i]->Ten ?>
                    </li>
                        <ul>
                        <?php
                            while ($j < count($menu2) && $menu2[$j]->idTheLoai == $menu1[$i]->id){
                                ?>
                                    <li class="list-group-item">
                                        <a href="loaitin.php?idLoaiTin=<?php echo $menu2[$j]->id ?>"><?php echo $menu2[$j]->Ten ?></a>
                                    </li>
                                <?php
                                $j++;
                            }
                        ?>
                        </ul>
                <?php
            }
        ?>
    </ul>
</div>
<!-- end menu -->