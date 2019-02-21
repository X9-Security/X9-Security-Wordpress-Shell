<?php

$type = shell_exec('uname -a');
$OS = "";
if($type == "")
{
	$OS = shell_exec('ver');
}
else
{
	$OS = shell_exec('uname -m -o');
}




$dir = base64_decode($_GET['dir']);
if(strpos($OS, "Windows") === false)
{
	if(substr($dir, strlen($dir)-1, strlen($dir)) !== "/")
	{
		$dir = $dir . "/";
	}
}
else
{
	if(substr($dir, strlen($dir)-1, strlen($dir)) !== "\\")
        {
                $dir = $dir . "\\";
        }
}


if(is_writable($dir) == 1)
{
echo '<font style="color:green;">Yes</font>';
}
else
{
echo '<font style="color:red;">No</font>';
}
?>
