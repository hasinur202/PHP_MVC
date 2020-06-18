<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<h2>Update Article</h2>

<?php
	foreach ($postById as $key => $value) {	
?>		
	<form action="<?php echo BASE_URL;?>/Admin/updatePost/<?php echo $value['id'];?>" method="post">
	<table>
			<tr>
				<td>Title</td>
				<td><input type="text" value="<?php echo $value['title'];?>" name="title" required="1"></td>
			</tr>
			<tr>
				<td>Content</td>
				<td>
					<textarea name="content"><?php echo $value['content'];?></textarea>
		                <script>
		                        CKEDITOR.replace( 'content' );
		                </script>
				</td>
				
			</tr>
			<tr>
				<td>Category</td>
				<td>
					<select name="cat" class="cat">
						<?php foreach ($cat as $key => $result) {
					?>
						<option 
							<?php 
								if($value['cat'] == $result['id']){ ?>
									selected="selected"
							<?php } ?>
							value="<?php echo $result['id'];?>"><?php echo $result['name'];?>	
						</option>

					<?php } ?>
					</select>
				</td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Update Article"></td>
			</tr>
		</table>


	</form>

	<?php } ?>	