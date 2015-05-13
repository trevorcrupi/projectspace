<form action="<?php echo URL ?>/items/add" method="post">
<input type="text" value="I have to..." onclick="this.value=''" name="todo"><br />
<input type="text" value="When?" onclick="this.value=''" name="date"><br /><br />
<input type="submit" value="Submit">
</form>
<br/><br/>
<?php $number = 0?>

<?php foreach ($todo as $todoitem):?>
	<a class="big" href="<?php echo URL?>items/view/<?php echo $todoitem['id']?>/<?php echo strtolower(str_replace(" ","-",$todoitem['item_name']))?>">
	<span class="item">
	<?php echo ++$number?>
	<?php echo $todoitem['item_name']?>
	</span>
	</a><br/>
<?php endforeach?>
