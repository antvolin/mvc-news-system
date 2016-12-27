<?php
class Logger
{
	public function __construct($fileName, $message)
	{
		file_put_contents(__dir__ . '/../src/logs/' . $fileName, date("Y-m-d H:i:s") . ' ' . $message . "\n", FILE_APPEND);
	}
}
