<?php function date_diff1($d1, $d2){
			$isNegative = false;
    		$d1 = (is_string($d1) ? strtotime($d1) : $d1);
    		$d2 = (is_string($d2) ? strtotime($d2) : $d2);
			if($d1-$d2 < 0)
			{
				$isNegative = true;	
			}
    		
    		$diff_secs = abs($d1 - $d2);
    		$base_year = min(date("Y", $d1), date("Y", $d2));
			
    		$diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
   		 return array(
        "years" => date("Y", $diff) - $base_year,
        "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1,
        "months" => date("n", $diff) - 1,
        "days_total" => floor($diff_secs / (3600 * 24)),
        "days" => date("j", $diff) - 1,
        "hours_total" => floor($diff_secs / 3600),
        "hours" => date("G", $diff),
        "minutes_total" => floor($diff_secs / 60),
        "minutes" => (int) date("i", $diff),
        "seconds_total" => $diff_secs,
        "seconds" => (int) date("s", $diff),
   		"negative"=>$isNegative);}
 
 
//credit to logon2 blog author. No name found
 
 function getVariableFromUrl($url)
 {		//we need to see if this URL is passing any GET variables

 	$variablesStart = strpos($url, "?") + 1;

	if (!$variablesStart) {

 		// no variables!

 		return(false);

 	}

		//before we extract the variables, we need to remove any anchors

		$variablesEnd = strpos($url,"#",$variablesStart);

		if ($variablesEnd)
		{
 			$getVariables = substr($url, $variablesStart, $variablesEnd - $variablesStart);
 		}
 		else
 		{
 			$getVariables = substr($url, $variablesStart);
 		}

//next, we split the URL into an arrays containing variable name and value pairs (ie. "variable=value")

 		$variableArray = explode("&", $getVariables);

	//we will iterate through each of the array pairs (ie. "variable=value")

 	foreach ($variableArray as $arraySet)
 	{
		$nameAndValue = explode("=", $arraySet);
		//using the above examples, $nameAndValue[0] would be "variable" and $nameAndValue[1] would be "value"
 		$output[$nameAndValue[0]] = $nameAndValue[1];

	}

	return($output);

}

?>