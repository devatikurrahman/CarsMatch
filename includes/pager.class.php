<?php
include("database.php");
class pager {

    public $tableName;
    public $numRecords;
    public $numPages;
    public $query;
    public $currPage;

    function pager($table_name, $page = 1, $rpp = 10, $where_array = array(), $query = '',$orderby='',$order_type='') {
				//echo $query;
        $this->setTable($table_name);
		if($query == "") {	
			$this->setNumRecords(Database::getNumRecords($table_name, $where_array));
		} else {
			$this->setNumRecords(mysql_num_rows(Database::Read($query)));
		}
				
        $this->setNumPages(ceil($this->getNumRecords() / $rpp));
		$this->setCurrPage(($page == '') ? 1 : $page);

        $where_string = Database::getWhereString($where_array);

        $offset = ($this->currPage > 1) ? ($this->currPage - 1) * $rpp : 0;
		
		if(!empty($orderby) && !empty($order_type)) {
			$order_str = " order by ".$orderby." ".$order_type ;
		}
		
        if($query == '') { 
          
		  $q = Database::Read("SELECT * FROM " . $table_name . $where_string . $order_str. "  limit " . $offset . " , " . $rpp);
          //print "SELECT * FROM " . $table_name . $where_string . " limit " . $offset . " , " . $rpp;
        } else {
          $q = Database::Read("SELECT * FROM " . $table_name ." where 1=1 ".$query. " limit " . $offset . " , " . $rpp);
        }
		$this->setQuery($q);
    }

    private function setTable($table_name) {

        $this->tableName = $table_name;
    }

    private function setNumRecords($num_records) {

        $this->numRecords = $num_records;
    }

    private function setNumPages($num_pages) {

        $this->numPages = $num_pages;
    }

    private function setQuery($query) {
		
        $this->query = $query;
    }

    private function setCurrPage($page) {
				if($page < 1) {
					$this->currPage = 1;
				} elseif($page > $this->numPages) {
					$this->currPage = $this->numPages;
				} else {
					$this->currPage = $page;
				}
    }

    public function getNumRecords() {

        return $this->numRecords;
    }

    public function getQuery() {

        return $this->query;
    }

    public function getNext() {

        return ($this->currPage != $this->numPages) ? $this->currPage + 1 : 0;
    }

    public function getPrevious() {
        return ($this->currPage != 1) ? $this->currPage - 1 : 0;
    }

    public function getFirst() {
        return 1;
    }

    public function getLast() {

        return $this->numPages;
    }

    public function getPagerString($file_name,$querystr='') {
        $pagerStr = '';
        if($this->numPages > 1) {
            if(strpos($file_name, '?')) {
                $joint = '&';
            } else {
                $joint = '?';
            }
        $file_name = $file_name.$joint;
		$pagerStr = "<ul>";
        if ($this->currPage != 1) {
            $pagerStr .= "<li style='margin-right:10px;'><a href='".$file_name."page=1".$querystr."'><i class=\"fa fa-chevron-left\"></i></a></li>";
        } else {
            $pagerStr .= "<li class='disabled' style='margin-right:10px;'><a href='#'><i class=\"fa fa-chevron-left\"></i></a></li>";
        }
        
				$chunk = 5;
				if($this->getLast() < $chunk) {
				$chunk = $this->getLast();
				}
				$n = ($this->currPage == 1)  ? $this->currPage : (($this->currPage == $this->getLast()) ? $this->getLast() - $chunk + 1 : $this->currPage - 1);
				$i = 0;
        while ($n < ($this->currPage / $chunk + 1) * $chunk && $n <= $this->getLast() && $i < $chunk) {
            if ($n != $this->currPage)
                $pagerStr .= "<li><a href='".$file_name."page=" . $n . "".$querystr."'>$n</a></li>";
            else
                $pagerStr .= "<li class='active'><a href=''>" . $n . "</a></li>";
            $n++;
					$i++;
        }
        if ($this->numPages != $this->currPage) {
            $pagerStr .= "<li style='margin-left:10px;'><a href='".$file_name."page=" . $this->getLast() . "".$querystr."'><i class=\"fa fa-chevron-right\"></i></a></li>";
        } else {
            $pagerStr .= "<li class='disabled' style='margin-left:10px;'><a href='#'><i class=\"fa fa-chevron-right\"></i></a></li>";
        }
        }
		$pagerStr .= "</ul>";
        return $pagerStr;
    }

}

?>
