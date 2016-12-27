<?php
abstract class Entity
{
	protected static $db;

	public function __get($name)
	{
		return $this->$name;
	}

	protected function checkCount()
	{
		try {
			$sth = self::$db->query("SELECT COUNT(*) FROM news");
			$rows = $sth->fetchColumn();
		} catch (PDOException $e) {
			new Logger('PDOErrors.txt', $e->getMessage());

			exit;
		}

		try {
			if ($rows <= 0) {
				throw new CountNewsException('Number of requested data does not correspond to the presence of.');
			}
		} catch (CountNewsException $e) {
			new Logger('NewsError.txt', $e->getMessage());

			exit;
		}

		return $rows;
	}

	public function load($id)
	{
		$this->checkCount();

		try {
			$stm = self::$db->prepare("SELECT * FROM {$this->getTableName()} WHERE {$this->getTableName()}_id = ?");
			$stm->execute(array($id));
			$propArray = $stm->fetch();
		} catch (PDOException $e) {
			new Logger('PDOErrors.txt', $e->getMessage());

			exit;
		}

		foreach ($propArray as $key => $value) {
			if (property_exists($this, $key)) {
				$this->$key = $value;
			}
		}

		return $this;
	}

	abstract protected function getTableName();

	public static function setDb($db)
	{
		self::$db = $db;
	}
}
