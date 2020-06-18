<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<h2>Add New Article</h2>

<?php
	if(isset($postErrors)){
echo '<div style="color:red; border:1px solid red; padding:5px 10px; margin:5px;">';
		foreach ($postErrors as $key => $value) {
			switch($key){
				case 'title':
					foreach ($value as $val){
						echo "Title: ".$val."<br/>";
					}
					break;

				case 'content':
					foreach ($value as $val){
						echo "Content: ".$val."<br/>";
					}
					break;

				case 'cat':
					foreach ($value as $val){
						echo "Category: ".$val."<br/>";
					}
					break;
				default: 
					break;
			}
		}
		echo "</div>";
	}


?>

	<form action="<?php echo BASE_URL;?>/Admin/insertPost" method="post">
		<table>
			<tr>
				<td>Title</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<td>Content</td>
				<td>
					<textarea name="content"></textarea>
		                <script>
		                        CKEDITOR.replace( 'content' );
		                </script>
				</td>
				
			</tr>
			<tr>
				<td>Category</td>
				<td>
					<select name="cat" class="cat">
						<option>Select One</option>
						<?php
							foreach ($cat as $key => $value) {
						?>
						<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
					<?php } ?>
						
					</select>
				</td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Save Article"></td>
			</tr>

		</table>
	</form>