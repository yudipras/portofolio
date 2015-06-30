<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Pagination Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Pagination
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/pagination.html
 */
class CI_Pagination {

	var $base_url			= ''; // The page we are linking to
	var $prefix				= ''; // A custom prefix added to the path.
	var $suffix				= ''; // A custom suffix added to the path.

	var $total_rows			=  0; // Total number of items (database results)
	var $per_page			= 10; // Max number of items you want shown per page
	var $num_links			=  2; // Number of "digit" links to show before/after the currently viewed page
	var $cur_page			=  0; // The current page being viewed
	var $use_page_numbers	= FALSE; // Use page number for segment instead of offset
	var $first_link			= '&lsaquo; First';
	var $next_link			= '&gt;';
	var $prev_link			= '&lt;';
	var $last_link			= 'Last &rsaquo;';
	var $uri_segment		= 3;
	var $index_limit		=15;
	var $full_tag_open		= '';
	var $full_tag_close		= '';
	var $first_tag_open		= '';
	var $first_tag_close	= '&nbsp;';
	var $last_tag_open		= '&nbsp;';
	var $last_tag_close		= '';
	var $first_url			= ''; // Alternative URL for the First Page.
	var $cur_tag_open		= '&nbsp;<strong>';
	var $cur_tag_close		= '</strong>';
	var $next_tag_open		= '&nbsp;';
	var $next_tag_close		= '&nbsp;';
	var $prev_tag_open		= '&nbsp;';
	var $prev_tag_close		= '';
	var $num_tag_open		= '&nbsp;';
	var $num_tag_close		= '';
	var $page_query_string	= FALSE;
	var $query_string_segment = 'per_page';
	var $display_pages		= TRUE;
	var $anchor_class		= '';

	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 */
	public function __construct($params = array())
	{
		if (count($params) > 0)
		{
			$this->initialize($params);
		}

		if ($this->anchor_class != '')
		{
			$this->anchor_class = 'class="'.$this->anchor_class.'" ';
		}

		log_message('debug', "Pagination Class Initialized");
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize Preferences
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 * @return	void
	 */
	function initialize($params = array())
	{
		if (count($params) > 0)
		{
			foreach ($params as $key => $val)
			{
				if (isset($this->$key))
				{
					$this->$key = $val;
				}
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Generate the pagination links
	 *
	 * @access	public
	 * @return	string
	 */
	function create_links()
	{
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0)
		{
			return '';
		}

		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);

		// Is there only one page? Hm... nothing more to do here then.
		if ($num_pages == 1)
		{
			return '';
		}

		// Set the base page index for starting page number
		if ($this->use_page_numbers)
		{
			$base_page = 1;
		}
		else
		{
			$base_page = 0;
		}

		// Determine the current page number.
		$CI =& get_instance();

		if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
		{
			if ($CI->input->get($this->query_string_segment) != $base_page)
			{
				$this->cur_page = $CI->input->get($this->query_string_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}
		else
		{
			if ($CI->uri->segment($this->uri_segment) != $base_page)
			{
				$this->cur_page = $CI->uri->segment($this->uri_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}

		// Set current page to 1 if using page numbers instead of offset
		if ($this->use_page_numbers AND $this->cur_page == 0)
		{
			$this->cur_page = $base_page;
		}

		$this->num_links = (int)$this->num_links;

		if ($this->num_links < 1)
		{
			show_error('Your number of links must be a positive number.');
		}

		if ( ! is_numeric($this->cur_page))
		{
			$this->cur_page = $base_page;
		}

		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->use_page_numbers)
		{
			if ($this->cur_page > $num_pages)
			{
				$this->cur_page = $num_pages;
			}
		}
		else
		{
			if ($this->cur_page > $this->total_rows)
			{
				$this->cur_page = ($num_pages - 1) * $this->per_page;
			}
		}

		$uri_page_number = $this->cur_page;

		if ( ! $this->use_page_numbers)
		{
			$this->cur_page = floor(($this->cur_page/$this->per_page) + 1);
		}

		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		//$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		//$end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;
		$start=max($this->cur_page-intval($this->index_limit/2), 1);
    $end=$start+$this->index_limit-1;

		//$start=max($this->cur_page - intval($this->per_page/2), 1);
    //$end=$start+$this->per_page-1;

		// Is pagination being used over GET or POST?  If get, add a per_page query
		// string. If post, add a trailing slash to the base URL if needed
		if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
		{
			$this->base_url = rtrim($this->base_url).'&amp;'.$this->query_string_segment.'=';
		}
		else
		{
			$this->base_url = rtrim($this->base_url, '/') .'/';
		}


		            $foout="";

								// $foout .=$start;
								// $foout .="-".$end;
								// $foout .="<br>";
		            if($this->cur_page==1) {
		                $foout .='<li class="disabled"><a href="#">Previous</a></li>';
		            } else {
		                $i = $this->cur_page-1;
		                $foout .= '<li><a href="'.$this->base_url.$i.'">Previous</a></li>';
		            }

		            if($start > 1) {
		                $foout .= '<li><a href="'.$this->base_url.'1">1</a></li>';
		                if ($start > 2) {
		                    $foout .='<li class="disabled"><a href="#">...</a></li>';
		                }
		            }

		            for ($i = $start; $i <= $end && $i <= $num_pages; $i++){
		                if($i==$this->cur_page) {
		                    $foout .='<li class="active"><a href="#" >'.$i.'</a>&nbsp;</li>';
		                } else {
		                    $foout .='<li><a href="'.$this->base_url.$i.'" >'.$i.'</a></li>';
		                }
		            }

		            if($num_pages > $end){
		                $i = $num_pages;
		                $foout .='<li class="disabled"><a href="#">...</a></li>';
		                $foout .='<li><a href="'.$this->base_url.$i.'" >'.$i.'</a></li>';
		            }


		            if($this->cur_page < $num_pages) {
		                $i = $this->cur_page+1;
		                //$foout .='<span class="prn">...</span>&nbsp;';
		                $foout .='<li><a href="'.$this->base_url.$this->prefix.$i.$this->suffix.'">Next</a></li>';
		            } else {
		                $foout .='<li class="disabled"><a href="#">Next</a></li>';
		            }



		return $foout;

	}

	// function doPages($page_size, $thepage, $query_string, $total=0){
	//
  //           //per page count
  //           $index_limit = 10;
	//
  //           //set the query string to blank, then later attach it with $query_string
  //           $query='';
	//
  //           if(strlen($query_string)>0){
  //               $query = "&amp;".$query_string;
  //           }
	//
  //           //get the current page number example: 3, 4 etc: see above method description
  //           $current = get_current_page();
	//
  //           $total_pages=ceil($total/$page_size);
  //           $start=max($current-intval($index_limit/2), 1);
  //           $end=$start+$index_limit-1;
	//
  //           echo '<br /><br /><div class="paging">';
	//
  //           if($current==1) {
  //               echo '<span class="prn">&lt; Previous</span>&nbsp;';
  //           } else {
  //               $i = $current-1;
  //               echo '<a href="'.$thepage.'&page='.$i.$query.'" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
  //           }
	//
  //           if($start > 1) {
  //               echo '<a href="'.$thepage.'&page=1'.$query.'" title="go to page '.$i.'">1</a>&nbsp;';
  //               if ($start > 2) {
  //                   echo '<span class="prn">...</span>&nbsp;';
  //               }
  //           }
	//
  //           for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
  //               if($i==$current) {
  //                   echo '<span>'.$i.'</span>&nbsp;';
  //               } else {
  //                   echo '<a href="'.$thepage.'&page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
  //               }
  //           }
	//
  //           if($total_pages > $end){
  //               $i = $total_pages;
  //               echo '<span class="prn">...</span>&nbsp;';
  //               echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
  //           }
	//
	//
  //           if($current < $total_pages) {
  //               $i = $current+1;
  //               //echo '<span class="prn">...</span>&nbsp;';
  //               echo '<a href="'.$thepage.'&page='.$i.$query.'" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
  //           } else {
  //               echo '<span class="prn">Next &gt;</span>&nbsp;';
  //           }
	//
  //           //if nothing passed to method or zero, then dont print result, else print the total count below:
  //           if ($total != 0){
  //               //prints the total result count just below the paging
  //               echo '<p id="total_count">(Total <strong>'.$total.'</strong> Results)</p></div>';
  //           }
	//
  //       }//end of method doPages()
}
// END Pagination Class

/* End of file Pagination.php */
/* Location: ./system/libraries/Pagination.php */
