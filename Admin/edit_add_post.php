<?php $edit_item_id = $_GET['edit']; ?>
	<div class="content">
	<h3>Edit Post</h3>
<form action="" method="POST">
<label>post title</label><input type="text" name="post_title" class="form-control"></br>
<label>post content</label><input type="text" name="post_content" class="form-control"></br>
<label>post tags</label><input type="text" name="post_tags" class="form-control"></br>
<input type="submit" name="update" class="post" value="Edit">
</form>
</div>
<?php 
if(isset($_POST['update'])){
	$a = $_POST['post_title'];
	$b = $_POST['post_content'];
	$c = $_POST['post_tags'];
	
	$query = "update posts set post_title='{$a}',post_content={$b},post_tags='{$c}' where post_id={$edit_item_id}";
	$result = mysqli_query($connection,$query);
	if(!$result){
	 die('QUERY FAILED'.mysqli_error($connection));
 }
}