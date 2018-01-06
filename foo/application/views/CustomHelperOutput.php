<div class="span10">
	<article>
		<h1><?=$title?></h1>
		<div>
			<!-- custom_helper.php# kordate() 커스텀헬퍼함수 사용 -->
			<div><?=kordate($created)?></div>
		    <!-- auto_link를 하지 않으면 하이퍼링크가 걸리지 않는다. -->
			<?=auto_link($description)?>
		</div>
	</article>
</div>