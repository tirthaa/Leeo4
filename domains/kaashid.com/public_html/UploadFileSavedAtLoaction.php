<?php

include_once('UploadCSVfile.php.php');

	$display_table='';
	if(isset($_POST['upload']) && $_POST['upload']=='Upload CSV')
	{
		//$display_table='test';
		$upload_dir=getcwd().DIRECTORY_SEPARATOR.'/uploads';
		if($_FILES['csv']['error']==UPLOAD_ERR_OK)
		{
			$tmp_name=$_FILES['csv']['tmp_name'];
			$name=basename($_FILES['csv']['name']);
			$csvfile=$upload_dir.'/'.$name;
			move_uploaded_file($tmp_name,$csvfile);
			
			echo ($display_table);
			
			
			echo 'uploaded';
			
			header("Location: https://kaashid.com/login.html");
			
			$display_table=get_html($csvfile);

		}
	}

?>