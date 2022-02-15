<?php
include 'db.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
<style type="text/css">
		table {
    text-align: center;
        margin: 0px auto;

}
img{
	height: 20px;
}
	</style>
	<script type="text/javascript">
    $(function() {
        $('$data-ia1').click(function() {
            return confirm("Are You sure that You want to delete this?");
        });
    });
</script>
  </head>
  <body>
  	<div class="container">
          <form action="availability.php" method="post" id="fupForm">
  <div class="mb-3">
   Enter a website
    <input type="website" class="form-control" id="website" name="webside">
    
  </div>
  
 
  <button type="submit" name="submit" class="btn btn-primary" id="submit">Submit</button>
</form>
</div>

      </body>
</html>
<?php
if( isset($_POST['submit']))
{
	$webside = $_POST['webside'];
	$query = "INSERT INTO  krisa (webside) VALUES('$webside')";
		$res = mysqli_query($conn,$query);
	
}
?>

<?php
function url_test($url)
{
	$timeout = 101;
	$ch =curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_TIMEOUT,$timeout);

	$http_respond = curl_exec($ch);
	$http_respond = trim(strip_tags($http_respond));
	$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	if(($http_code == "200") || ($http_code == "302"))
	{
		return true;
	}
	else
	{
		return false;
	}
	curl_close($ch);

}
echo "<table border='1'>

<tr>

<th>Id</th>

<th>website</th>

<th>activity</th>



</tr>";

                  
                    $status = "SELECT * FROM krisa";
                    $status = mysqli_query($conn,$status);
                    while($row = mysqli_fetch_array($status)){  


echo" <tr>

<td>" . $row['id'] .  "</td>

<td> " . $row['webside'] .  "</td>

   <td>";

               if(url_test( $row['webside'] ))
{
	echo  " <img src='img/webside.png'/> ";
}
else
{
	echo  " <img src='img/red.png'/> ";
}
                echo "</td>


</tr>";

 }
   ?>