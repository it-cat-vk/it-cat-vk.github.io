<?php defined("IT_CAT_CMS_RUNNING") or die() ?>
<?php foreach($this->news_list as $elem): ?>
	<article>
		<h2><?php echo $elem->header ?></h2>
		<?php foreach(explode('\n', $elem->text) as $line): ?>
			<p><?php echo $line ?></p>
		<?php endforeach ?>
		<!-- если честно, я сомневаюсь в корректности применения здесь этого тега -->
		<details open>
			<summary>Информация о публикации</summary>
			<address>Автор: <a href="/authors/name.html" rel="author"><?php echo $elem->author ?></a></address>
			<?php
				$iso_date = date("c", $elem->datetime);
				$rus_date = date("d.m.Y H:i", $elem->datetime);
			?>
			<!-- TODO: добавить учёт часовых поясов -->
			<time datetime="<?php echo $iso_date ?>" title="<?php echo $rus_date ?>"><?php echo $rus_date ?></time>
			<!-- Содержимое этого тега будет автоматически обновлятся через JavaScript,
				 основываясь на аттрибуте datetime -->
		</details>
	</article>
<?php endforeach ?>
