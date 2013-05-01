<?php foreach($comments as $comment):?>
<div class="comment">
	<div class="author">
	<?php echo CHtml::encode($comment->createUser->username);?>
	</div>
	<div class="time">
	on <?php echo date('d-m-Y \a\t h:i a',strtotime($comment->create_time));
?>
	</div>
	<div class="content">
	<?php echo nl2br(CHtml::encode($comment->content));?>
	</div>
	<hr/>
	
	</div>
	<?php endforeach;?>
	