<?php


class pagination {
    public $paging_size = 10; // default 5
    public $page_interval = 10; //interval for panging 1...10 11...20 etc, default 10
    protected $get_page;
    protected $max_page;
	protected $current_page;
    protected $startpaging;
    protected $endpaging;
    protected $total;

    function __construct($config = array()){
		if(count($config) > 0)
		foreach($config as $key=>$value){
			if(is_int($value) && $value > 0) $this->$key = $value;
		}
    }

    function position($num_query,$get_page){ 

    // for page number
		$num_query = (!is_numeric($num_query) || $num_query == '') ? 0 : $num_query;
		$this->total = $num_query;
		$this->max_page = ceil($num_query/$this->paging_size);

		$this->get_page=$get_page;
			if($this->get_page == "" || $this->get_page < 1) {
				$currentPage=0;
				$this->get_page=1;
		} elseif($this->get_page > $this->max_page) {
			$currentPage=($this->max_page-1)*$this->paging_size;
		} else $currentPage=($this->get_page-1)*$this->paging_size;
		return $currentPage;
    }

    protected function set_link(){
		if($this->get_page <= $this->page_interval){
			$this->startpaging = 1;
			$this->endpaging = ($this->max_page > $this->page_interval) ? $this->page_interval : $this->max_page;
		} else {
			if($this->get_page > $this->max_page || $this->get_page == $this->max_page){
			$size = ceil($this->max_page/$this->page_interval);
			$this->startpaging = ($this->max_page > $this->page_interval) ? ($size - 1) * $this->page_interval + 1 : 1;
			$this->endpaging = $this->max_page;
			} elseif($this->get_page > $this->page_interval && $this->get_page < $this->max_page){
			$size = ceil($this->get_page/$this->page_interval);
			$this->startpaging = ($size - 1) * $this->page_interval + 1;
			$this->endpaging = (($var = $size * $this->page_interval) > $this->max_page) ? $this->max_page : $var;
			}
		}
    }

    function paging($page = ''){

		if(empty($page)) return false;

		$limiter = (strpos($page, "=") === false) ? "?" : "&";

		if($this->max_page > 1){
			$this->set_link();
			$link = "<ul class=\"pagination\">";
			// Link for First and Previous
			if($this->max_page > $this->page_interval){
				if ($this->get_page > 1){
					$previous = $this->get_page-1;
					$link .= "<li><a href=\"$page$limiter"."page=1\" > First</a></li>";
					$link .= "<li><a href=\"$page$limiter"."page=$previous\"> Previous</a></li>";
				} else $link .= "<li><span class=\"disabled\" > First </span><span class=\"disabled\" > Previous </span></li>";
			}
			// Link for page 1,2,3, ...
			$num=$this->startpaging - 1;
			$link .= ($this->get_page > $this->page_interval && $this->max_page >= $this->get_page || $this->max_page < $this->get_page) ? "<a href=\"$page$limiter"."page=$num\" class=\"paging\" > ... </a>" : "";

			for($i=$this->startpaging;$i<=$this->endpaging;$i++){
				if ($i == $this->get_page) {$link .= "<li class=\"active\"><span class=\"current\" >$i</span><li>";$this->current_page = $i;}
				else {
					if ($i == $this->endpaging && $this->get_page > $this->max_page) {$link .= "<span class=\"current\" >$i</span>"; $this->current_page = $i;}
					else $link .= "<li><a href=\"$page$limiter"."page=$i\" class=\"paging\" >$i</a></li>";
				}
			}
			$link .= ($i-1 < $this->max_page) ? "<li><a href=\"$page$limiter"."page=$i\" class=\"paging\" > ... </a></li>" : "";

			// Link for Next dan Last
			if($this->max_page > $this->page_interval){
				if ($this->get_page < $this->max_page){
					$next=$this->get_page+1;
					$link .= "<li><a href=\"$page$limiter"."page=$next\" >Next</a></li>";
					$link .= "<li><a href=\"$page$limiter"."page=$this->max_page\" >Last</a></li>";
				} else $link .= "<span class=\"disabled\"> Next </span><span class=\"disabled\" > Last </span>";
			}

			$link .= "</ul><br><span class=\"pagestat\" >Halaman : {$this->current_page} of {$this->total}</span> ";
			$link .= "<br><span class=\"total\" >Total Data : {$this->total} Data</span>";
			echo $link;
		}
    }

	function __destruct(){
		// Jika mau di isi silahkan.
		// jikalaupun tidak diisi, biarkan fungsi ini tetap ada, PHP otomatis mengoptimalkan
		// objek yang akan dihancurkan ketika proses selesai
	}
}
?>