<?php 
	include_once 'library/database.php';

	class M_tintuc extends database{

		// Trang chủ
		public function getSlide(){
			$sql = "SELECT * FROM slide";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		public function getMenu1(){
			$sql = "SELECT tl.* FROM theloai tl INNER JOIN loaitin lt ON tl.id = lt.idTheLoai GROUP BY tl.id";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		public function getMenu2(){
			$sql = "SELECT * FROM loaitin";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		public function getTinTucTomTatNoiBat(){
			$sql = "SELECT DISTINCT tt.id, tt.TieuDe, tt.TieuDeKhongDau, tt.TomTat, tt.Hinh, tt.idLoaiTin FROM tintuc tt INNER JOIN (SELECT DISTINCT lt.* FROM loaitin lt INNER JOIN theloai tl ON lt.idTheLoai = tl.id GROUP BY tl.id) temp ON tt.idLoaiTin = temp.id GROUP BY tt.idLoaiTin";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		// Trang hiển thị danh sách bài theo danh mục
		public function getLoaiTinTheoId($id){
			$sql = "SELECT * FROM loaitin lt WHERE lt.id = $id";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		public function getAllTinTucTheoIdLoaiTin($idLoaiTin){
			$sql = "SELECT * FROM tintuc t WHERE t.idLoaiTin = $idLoaiTin";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		public function getTinTucTheoIdLoaiTin($idLoaiTin, $vitri = 0, $limit = 5){
			$sql = "SELECT * FROM tintuc t WHERE t.idLoaiTin = $idLoaiTin LIMIT $vitri, $limit";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		// Trang hiển thị chi tiết bài viết
		public function getChitietBaiViet($id){
			$sql = "SELECT * FROM tintuc t WHERE t.id = $id";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		public function getBinhLuan($idTinTuc){
			$sql = "SELECT us.name, cm.* FROM comment cm LEFT JOIN users us ON cm.idUser = us.id WHERE cm.idTinTuc = $idTinTuc GROUP BY cm.id";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}
	}
?>