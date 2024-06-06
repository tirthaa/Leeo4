<?php
	function get_html($csvfile)
	{
		$html='<table border="1">';
		$file = fopen($csvfile, 'r');
		$header_arr = fgetcsv($file);
		$html.='<thead>';
		foreach($header_arr as $k=>$v)
		{
			$html.='<th>'.$v.'</th>';
		}
		
		$html.='<thead>';
		
		$html.='<tbody>';
		
		while($line = fgetcsv($file))
		{
		$html.='<tr>';
		foreach($line as $k=>$v)
		{
			$html.='<td>'.$v.'</td>';
		}
		$html.='</tr>';	
		}
		
		$html.='</tbody>';

		$html.='</table>';		
		return $html;
	}

?>