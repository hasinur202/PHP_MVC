
	<article class="postcontent">
		<?php
			foreach ($allPost as $key => $value) {
			
		?>
		<div class="post">
			<div class="title">
				<h2><a href="<?php echo BASE_URL; ?>/Index/postDetails/<?php echo $value['id'];?>"><?php echo $value['title']; ?></a></h2>
				
				<p>Category: <a href="<?php echo BASE_URL;?>/Index/postByCat/<?php echo $value['cat']; ?>"><?php echo $value['name']; ?></a></p>
			</div>

			<p><?php 
				$text = $value['content'];
				if(strlen($text) > 200){
					$text = substr($text, 0, 200);
					echo $text;
				}

			?> </p>

			<div class="readmore"><a href="<?php echo BASE_URL; ?>/Index/postDetails/<?php echo $value['id'];?>">Read More..</a></div>
		</div>

		<?php } ?>


	</article>


	


  