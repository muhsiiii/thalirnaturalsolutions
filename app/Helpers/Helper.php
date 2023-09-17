<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{

	static function wordLim($text, $limit) 
	{
		if (str_word_count($text, 0) > $limit) 
			{
				$words = str_word_count($text, 2);
				$pos   = array_keys($words);
				$text  = substr($text, 0, $pos[$limit]) . '...';
			}
		return $text;
	}
	
}

?>