<?php
class News extends Entity
{
	protected $news_id;
	protected $header;
	protected $description;
	protected $text;
	protected $date;
	protected $small_image;
	protected $lagre_image;

	protected function getTableName()
	{
		return "news";
	}

	public function getByTagId($id)
	{
		$this->checkCount();

		try {
			$stm = self::$db->prepare("SELECT * FROM news WHERE news_id IN (SELECT news_id FROM relation WHERE tag_id = ?)");
			$stm->execute(array($id));
			$newsArray = $stm->fetchAll();
		} catch (PDOException $e) {
			new Logger('PDOErrors.txt', $e->getMessage());
			
			exit;
		}

		foreach ($newsArray as $oneNews) {
			$news = new static();
			$collection[] = $news->load($oneNews['news_id']);
		}

		return $collection;
	}

	public function getRandomNews($count)
	{
		$rows = $this->checkCount();

		if ($count > $rows || $count <= 0) {
			$count = 1;
		}

		try {
			$stm = self::$db->query("SELECT news_id FROM news");
			$ids = $stm->fetchAll();
		} catch (PDOException $e) {
			new Logger('PDOErrors.txt', $e->getMessage());

			exit;
		}

		$randoms = array_rand($ids, $count);

		if (is_array($randoms)) {
			foreach ($randoms as $random) {
				$news = new static();
				$collection[] = $news->load($ids[$random]['news_id']);
			}
		} else {
			$news = new static();
			$collection[] = $news->load($ids[$randoms]['news_id']);
		}

		return $collection;
	}

	public function getTagsByNewsId($id)
	{
		try {
			$stm = self::$db->prepare("SELECT tag_id FROM tag WHERE tag_id IN (SELECT tag_id FROM relation WHERE news_id = ?)");
			$stm->execute(array($id));
			$tagsArray = $stm->fetchAll();
		} catch (PDOException $e) {
			new Logger('PDOErrors.txt', $e->getMessage());
			
			exit;
		}

		foreach ($tagsArray as $oneTag) {
			$tag = new Tag();
			$collection[] = $tag->load($oneTag['tag_id']);
		}

		return $collection;
	}
}
