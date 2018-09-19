<?php 
	include_once 'model/m_tintuc.php';

	class C_tintuc{
		public function index(){
			// Tạo mới model tintuc
			$m_tintuc = new M_tintuc();

			// Lấy thông tin slide
			$slide = $m_tintuc->getSlide();

			// Lấy thông tin menu cấp 1, 2
			$menu1 = $m_tintuc->getMenu1();
			$menu2 = $m_tintuc->getMenu2();

			// Trả ra giá trị của toàn bộ model tintuc
			return array('slide'=>$slide, 'menu1'=>$menu1, 'menu2'=>$menu2);
		}
	}
?>