
<h2>UI Option</h2>

<?php
	if(!empty($_GET['msg'])){
		//$msg = $_GET['msg'];
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo "<sapn style='color:blue; font-weight: bold;'>".$value."</sapn>";
		}
	}
	
?>



	<form action="<?php echo BASE_URL;?>/Admin/changeUI" method="post">
		<table>
			<tr>
				<td>Change Background Color</td>
				<td><input type="color" name="color" required="1"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Save"></td>
			</tr>

		</table>
	</form>