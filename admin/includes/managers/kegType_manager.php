<?php
require_once __DIR__.'/../models/kegType.php';

class KegTypeManager{

    protected $link = null;

    public function __construct($link){
        $this->link = $link;
    }


    function GetAll(){
		$sql="SELECT * FROM kegTypes ORDER BY displayName";
		$qry = mysqli_query($this->link,$sql);
		
		$kegTypes = array();
		while($i = mysqli_fetch_array($qry)){
			$kegType = new KegType();
			$kegType->setFromArray($i);
			$kegTypes[$kegType->get_id()] = $kegType;		
		}
		
		return $kegTypes;
	}
	
	
		
	function GetById($id){
		$sql="SELECT * FROM kegTypes WHERE id = $id";
		$qry = mysqli_query($this->link,$sql);
		
		if( $i = mysqli_fetch_array($qry) ){
			$kegType = new KegType();
			$kegType->setFromArray($i);
			return $kegType;
		}

		return null;
	}
}