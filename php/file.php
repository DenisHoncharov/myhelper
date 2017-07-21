<html>
<head>
	<title>Download file on disc</title>
</head>
<body>
	<?php
		echo "hello from php";

		echo "<br>";
		$file = fopen("test.txt", "w+t");
		fwrite ($file, "Hello\n There is test file");
		fseek($file, 0);
		while(!feof($file)){
			echo fread($file, 1)."<br>";
		}
		fseek($file, 4);
		echo "<br><hr>".fread($file, 1);
		echo "<hr><br>";
		file_put_contents("c.txt", "say hello");

		if(file_exists("b.txt")){
			echo file_get_contents("c.txt");
		}else{
			echo "can't found file";
		}
		echo "<br>".filesize("c.txt")."<br>";
		fseek($file, 0);
		echo fread($file, filesize("test.txt"));

		fclose($file);
		unlink("c.txt");
		unlink("test.txt");
		phpinfo();
	?>
</body>
</html>
