<?php
spl_autoload_register(function ($class)
{
	$classDirs = array('Model', 'Controller', 'Lib', 'Lib/Exceptions');

	foreach ($classDirs as $dir) {
		$pathToClass = $dir . DIRECTORY_SEPARATOR . $class . '.php';

		if (file_exists($pathToClass)) {
			include_once($pathToClass);
		}
	}
});

$host = 'localhost';
$db = 'koshkapp_news';
$charset = 'utf8';
$user = 'koshkapp_root';
$pass = 'Waa30*@!';

$dsn = 'mysql:host=' . $host . ';dbname=' . $db . ';charset=' . $charset;
$opt = array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

try {
	$dbh = new PDO($dsn, $user, $pass, $opt);
} catch (PDOException $e) {
	new Logger('PDOErrors.txt', $e->getMessage());

	exit;
}

Entity::setDb($dbh);
