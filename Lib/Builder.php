<?php 
class Builder
{
	private $controller;
    private $base;

	public function __construct($name, $base)
	{
		$this->controller = $name;
        $this->base = $base;
	}

	public function buildList($arrayNews)
	{
		$content = "";

		foreach ($arrayNews as $news) {
			$content .= $this->buildNews($news);
		}

		return $content;
	}

	public function buildNews($news, $text = false)
	{
		$description = '';

		if ($text === true) {
			$width = 380;
			$class = 'lagre';
			$image = ltrim($news->lagre_image, '/');
			$text = $news->text;
		} else {
			$width = 270;
			$class = 'small';
			$image = ltrim($news->small_image, '/');
			$text = '';
			$description = $news->description;
		}

		$content =
			'<div id="$news->news_id" class="news">
				<a href="' . $this->base . strtolower($this->controller) . '/detail/' . $news->news_id . '">
					<img src="' . $this->base . $image . '" width="' . $width . 'px;" alt="' . $news->header . '">
				</a>
				<div class="header">
					<a href="' . $this->base . strtolower($this->controller) . '/detail/' . $news->news_id . '">
						' . $news->header . '
					</a>
				</div>
				<div class="date">' . $news->date . '</div>
				<div class="text">' . $text . '</div>
				<div class="description">' . $description . '</div>
			</div>';

		return $content;
	}

	public function buildTag($tags)
	{
		$content = "<div class='tags'>Теги новости: ";
		$last = count($tags) - 1;

		for ($i = 0; $i < $last; ++$i) { 
			$content .= "<a href='" . $this->base . strtolower($this->controller) . "/tag/{$tags[$i]->tag_id}'>{$tags[$i]->name}</a>, ";
		}

		$content .= "<a href='" . $this->base . strtolower($this->controller) . "/tag/{$tags[$last]->tag_id}'>{$tags[$last]->name}</a>.";

		return $content .= "</div>";
	}
}
