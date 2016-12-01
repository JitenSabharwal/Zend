<?php
	namespace Fc\Model;

	class Fc
	{
		public $id ;
		public $month;
		public $revenue;

		//Get data from the table and check for thje values
		public function exchangeArray(array $data){
			$this->id = !empty($data['id'])?$data['id']:null;
			$this->month = !empty($data['month'])?$data['month']:null;
			$this->revenue = !empty($data['revenue'])?$data['revenue']:null;
		}
	}
?>