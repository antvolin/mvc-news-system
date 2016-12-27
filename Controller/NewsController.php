<?php
class NewsController
{
	private $name;
	private $title;
    private $src;
    private $base;
    private $baseController;

	public function __construct()
	{
        $this->base = '/';
        $this->name = "News";
        $this->src = '/src/';
        $this->baseController = '/news/';
	}

	public function __get($name)
	{
		return $this->$name;
	}

	public function newsList($count)
	{
		$this->title = "News list";
		$news = new News();
		$arrayNews = $news->getRandomNews($count);

		include_once('View/list.php');
	}

	public function detail($id)
	{
		$this->title = "News page";
		$news = new News();
		$news->load($id);
		$arrayTags = $news->getTagsByNewsId($news->news_id);

		include_once('View/detail.php');
	}

	public function tag($id)
	{
		$this->title = "Tags page";
		$news = new News();
		$arrayNews = $news->getByTagId($id);

		include_once('View/tag.php');
	}

	public function filter()
	{
		$this->title = "Filter";
		$filter = new Filter();
		$ids = $filter->getIds();

		include_once('View/filter.php');
	}
}
