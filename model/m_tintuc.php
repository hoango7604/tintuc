<?php 
	include_once 'database.php';

	class M_tintuc extends database{
		public function getSlide(){
			$sql = "SELECT * FROM slide";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		public function getMenu1(){
			$sql = "SELECT * FROM theloai";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		public function getMenu2(){
			$sql = "SELECT * FROM loaitin";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}
	}
?>