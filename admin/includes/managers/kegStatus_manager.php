<?php
require_once __DIR__.'/../models/kegStatus.php';

class KegStatusManager{

    protected $link = null;

    public function __construct($link){
        $this->link = $link;
    }


    function GetAll(){
		$sql="SELECT * FROM kegStatuses ORDER BY name";
		$qry = mysqli_query($this->link,$sql);
		
		$kegStatuses = array();
		while($i = mysqli_fetch_array($qry)){
			$kegStatus = new KegStatus();
			$kegStatus->setFromArray($i);
			$kegStatuses[$kegStatus->get_code()] = $kegStatus;		
		}
		
		return $kegStatuses;
	}	
		
	function GetByCode($code){
		$sql="SELECT * FROM kegStatuses WHERE code = '$code'";
		$qry = mysqli_query($this->link,$sql);
		
		if( $i = mysqli_fetch_array($qry) ){
			$kegStatus = new KegStatus();
			$kegStatus->setFromArray($i);
			return $kegStatus;
		}

		return null;
	}
	
}