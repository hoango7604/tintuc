<?php 
	include_once 'model/m_tintuc.php';

	class C_tintuc{

		private $m_tintuc = '';

		public function C_tintuc(){
			// Tạo mới model tintuc
			$this->m_tintuc = new M_tintuc();
		}
		
		public function index(){

			// Lấy thông tin slide
			$slide = $this->m_tintuc->getSlide();

			// Lấy thông tin menu cấp 1, 2
			$menu1 = $this->m_tintuc->getMenu1();
			$menu2 = $this->m_tintuc->getMenu2();

			// Lấy thông tin tóm tắt lên trang chủ
			$tintuc = $this->m_tintuc->getTinTucTomTatNoiBat();

			// Trả ra giá trị của toàn bộ model tintuc
			return array('slide'=>$slide, 'menu1'=>$menu1, 'menu2'=>$menu2, 'tintuc'=>$tintuc);
		}

		public function loaitin(){

			// Lấy id loại tin trên url
			$idLoaiTin = $_GET['idLoaiTin'];

			// Lấy thông tin menu cấp 1, 2
			$menu1 = $this->m_tintuc->getMenu1();
			$menu2 = $this->m_tintuc->getMenu2();

			// Lấy loại tin
			$loaitin = $this->m_tintuc->getLoaiTinTheoId($idLoaiTin);

			//Lấy tin tức
			$tintuc = $this->m_tintuc->getTinTucTheoIdLoaiTin($idLoaiTin);

			return array('menu1'=>$menu1, 'menu2'=>$menu2, 'loaitin'=>$loaitin,'tintuc'=>$tintuc);
		}
	}
?>