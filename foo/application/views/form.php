<form action="/foo/index.php/testcontroller/form" method="post" class="span10">
	<?php echo validation_errors(); // 사용자가 잘못입력한 내용에 대해 공지를 출력?>
	<input type="text" name="title" placeholder="제목" class="span12"/>
	<textarea name="description" placeholder="본문" class="span12" rows="15"></textarea>
	<input type="submit" value="제출" class="btn"/>
</form>