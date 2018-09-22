<?php 
	include_once 'model/m_tintuc.php';
	include_once 'library/pager.php';

	class C_tintuc{

		private $m_tintuc = '';

		public function C_tintuc(){
			// Tạo mới model tintuc
			$this->m_tintuc = new M_tintuc();
		}
		
		// Controller cho trang chính
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

		// Controller cho trang hiển thị tin theo danh mục
		public function loaitin(){

			// Lấy id loại tin trên url
			$idLoaiTin = $_GET['idLoaiTin'];

			// Lấy số trang hiện tại
			$currentPage = (isset($_GET['page']) && $_GET['page'] > 0)?$_GET['page']:1;

			// Lấy loại tin
			$loaitin = $this->m_tintuc->getLoaiTinTheoId($idLoaiTin);

			//Lấy tin tức
			$tintuc = $this->m_tintuc->getAllTinTucTheoIdLoaiTin($idLoaiTin);

			// Tạo đối tượng phân trang
			$pagination = new pagination(count($tintuc), $currentPage);

			// Tạo thanh phân trang
			$paginationHTML = $pagination->showPagination();

			// Lấy tin tức đã phân trang
			$limit = $pagination->get_nItemOnPage();
			$vitri = ($pagination->getCurrentPage() - 1)*$limit;
			$tintuc = $this->m_tintuc->getTinTucTheoIdLoaiTin($idLoaiTin, $vitri, $limit);

			// Lấy thông tin menu cấp 1, 2
			$menu1 = $this->m_tintuc->getMenu1();
			$menu2 = $this->m_tintuc->getMenu2();

			return array('menu1'=>$menu1, 'menu2'=>$menu2, 'loaitin'=>$loaitin,'tintuc'=>$tintuc, 'thanhPhanTrang'=>$paginationHTML);
		}

		// Controller cho trang hiển thị chi tiết bài viết
	}
?>