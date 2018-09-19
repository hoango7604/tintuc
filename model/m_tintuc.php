<?php 
	include_once 'database.php';

	class M_tintuc extends database{

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
			$sql = "SELECT DISTINCT tt.TieuDe, tt.TieuDeKhongDau, tt.TomTat, tt.Hinh, tt.idLoaiTin FROM tintuc tt INNER JOIN (SELECT DISTINCT lt.* FROM loaitin lt INNER JOIN theloai tl ON lt.idTheLoai = tl.id GROUP BY tl.id) temp ON tt.idLoaiTin = temp.id GROUP BY tt.idLoaiTin";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		public function getLoaiTinTheoId($id){
			$sql = "SELECT * FROM loaitin lt WHERE lt.id = $id";
			$this->setQuery($sql);
			return $this->loadAllRows(array($id));
		}

		public function getTinTucTheoIdLoaiTin($idLoaiTin){
			$sql = "SELECT * FROM tintuc t WHERE t.idLoaiTin = $idLoaiTin";
			$this->setQuery($sql);
			return $this->loadAllRows(array($idLoaiTin));
		}
	}
?>