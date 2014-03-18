<?php

class TagsCloud {
	private static $_tags;
	/**
	 * add tags to the page cloud array
	 * @param String $tags comma separated tags list
	 */
	public static function add($tags){
		//strip array
		$tags=preg_replace("/ {0,}, {0,}/", ",", $tags);
		$tags=explode (",",$tags);
		self::$_tags=is_array(self::$_tags)?array_merge($tags,self::$_tags ):$tags;
		self::$_tags=@array_unique(self::$_tags);
	}
	/**
	 *
	 * prints out added tags
	 */
	public static function view ($parent=0){
		
		//if request is main or category or image  
		if (!is_array(self::$_tags)) return;
		$where= "term LIKE '".implode ("' OR `term` LIKE '", self::$_tags)."'";
		$query = mysql_query("SELECT term, counter FROM search  $where ORDER BY counter DESC LIMIT 30");

			

		$terms=array_fill_keys(self::$_tags, 1);

		if ($query)	{
			while ($row = @mysql_fetch_array($query))
			{
				$term = $row['term'];
				$counter = $row['counter'];

				// update $maximum if this term is more popular than the previous terms
				if ($counter > $maximum) $maximum = $counter;

				$terms[$term] = $counter;

			}
		}else {
			$maximum=100;
			while (list($k,$v)=each($terms)){

				$terms[$k]=rand(1, 100);
			}
		}

		// shuffle terms unless you want to retain the order of highest to lowest
		//shuffle($terms);
		return array($terms,$maximum);
	}


}

