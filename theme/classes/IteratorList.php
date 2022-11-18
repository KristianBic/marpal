<?php 

class IteratorList {
    private $db;
    private $className;
    private $selectors;
    private $mainSelectorIndex;
    private $tableName;
    private $extraQuery;

    private $items = array();
	private $itemsIds = array();
	private $count;
	private $totalCount = 0;
	private $iterator;

    public function __construct($db, $className, $tableName, $selectors = "id", $mainSelectorIndex = 0) {
		$this->db = $db;
		$this->className = $className;
		$this->selectors = $selectors;
		$this->tableName = $tableName;
		$this->mainSelectorIndex = $mainSelectorIndex;
    }

    function load($extraQuery = "", $idsOnly = false, $customSelectorsIndexes = array(0)) {
		$this->items = array();
		$this->itemsIds = array();
		$this->iterator = 0;
		$this->extraQuery = $extraQuery;

/* 		echo "SELECT ".$this->selectors." FROM ".$this->tableName." ".$extraQuery."<br><br>";
 */		$items = $this->db->select("SELECT ".$this->selectors." FROM ".$this->tableName." ".$extraQuery);
		foreach($items as $key => $item) {
			if(!$idsOnly) array_push($this->items, new $this->className($this->db, $item[$this->mainSelectorIndex]));
			else{
				$itemToPush = array();
				foreach ($customSelectorsIndexes as $selector) {
					array_push($itemToPush, $item[$selector]);
				}
				array_push($this->items, $itemToPush);
			}
			array_push($this->itemsIds, $item[0]);
		}
		
		$this->count = count($this->items);
		if($items = $this->db->select("SELECT COUNT(*) FROM ".$this->tableName." ".$extraQuery)){
			$this->totalCount = $items[0][0];
		}
		$this->iterator = 0;
	}
	
	function getNext() {
		if(isset($this->items[$this->iterator])) {
			$item = $this->items[$this->iterator];
			$this->iterator = $this->iterator + 1;
			return $item;
		} 
		$this->iterator = 0;
		return false;
	}
	
	function toStart() {
		$this->iterator = 0;
	}
	
	function getCount() {
		return $this->count;
	}

	function getTotalCount() {
		return $this->totalCount;
	}

	function getTotalCountByQuery(){
		if(strpos($this->extraQuery, "OFFSET") !== false){
			$totalCountExtra = substr($this->extraQuery, 0, strpos($this->extraQuery, "LIMIT"));
			$parts = explode('LIMIT', $totalCountExtra);
			$last = array_pop($parts);
			if(sizeof($parts) > 0){
				$totalCountExtraQuery = implode("LIMIT", $parts);
			} else {
				$totalCountExtraQuery = $totalCountExtra;
			}
			if($items = $this->db->select("SELECT COUNT(*) FROM ".$this->tableName." ".$totalCountExtraQuery)){
				$this->totalCount = $items[0][0];
			}
			return $this->totalCount;
		}
	}

	function getIDsAsString() {
		return implode(", ", $this->itemsIds);
	}
	
	function get($id, $searchByIndex = false) {
		if($searchByIndex){
			return $this->items[$id];
		} else {
			$i = array_search($id, $this->itemsIds);
			if($i === false) {
				return false;
			}
			return $this->items[$i];
		}
	}

	function getIterator(){
	    return $this->iterator;
    }
  }
?>