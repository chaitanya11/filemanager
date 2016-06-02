<?php 
$dir = ".";
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>	
<script>
function zipdown(click_id) {
        if (window.XMLHttpRequest) {
            xhttp = new XMLHttpRequest();
        } else {
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      //document.getElementById("demo").innerHTML = xhttp.responseText;
      window.open("./"+xhttp.responseText);
    }
  };
  xhttp.open("GET", "./ajax/compres.php?q="+click_id, true);
  xhttp.send();
}
function Delete(click_id){
        if (window.XMLHttpRequest) {
            xhttp = new XMLHttpRequest();
        } else {
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      //document.getElementById("demo").innerHTML = xhttp.responseText;
      document.location.reload(true);
    }
  };
  xhttp.open("GET", "./ajax/delete.php?q="+click_id, true);
  xhttp.send();
}
</script>
<title><?php echo $dir."directory"; ?></title>
</head>
<body>
<p id="demo" style="position: absolute; right: 10%;"></p>
<div class="table-responsive">
<table class="table">
    <thead>
      <tr>
        <th>FileName</th>
        <th>Compress</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody>
<?php

if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) { if(!($file == 'ajax' || $file == 'index.php' || $file == '.' || $file == "..")){?>
            <tr>
            	<td><p><?php echo $file; ?></p></td>
            	<td><button id="<?php echo $file; ?>" class="btn btn-info" onclick="zipdown(this.id)">Zip Download</button></td> 
            	<td><button id="<?php echo $file; ?>" class="btn btn-info" onclick="Delete(this.id)">Delete</button></td> 
            <?php	} ?>
            </tr>
<?php
        }
        closedir($dh);
    }
}
?>
</tbody>
</table>
</div>
</body>