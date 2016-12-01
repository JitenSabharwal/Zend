<?php
/*
	This page consist of all the logic by which we get the data from the database
*/
	namespace Fc\Model;

	use RuntimeException ;
	use Zend\Db\TableGateway\TableGatewayInterface;
	
	class FcTable{

		private $tableGateway;
		
		public function __construct(TableGatewayInterface  $tableGateway)
		{
			$this->tableGateway = $tableGateway;
		}
		
		public function fetchAll(){
			return $this->tableGateway->select();
		}

		public function getAlbum($id){
			$id = (int) $id;
			$rowset = $this->tableGateway->select(['id' => $id]);
			$row = $rowset->current();
			if(! $row){
				throw new RuntimeException(sprintf('Could not find ',$id
				));
			}
			return $row;
		}

	}
?>