<?php namespace BoilerplateTelegramPlugin;

class Views
{
	public static $instance = null;

	public static function get_instance()
	{
		null === self::$instance && self::$instance = new self;
		return self::$instance;
	}

	public function __construct() {}

	public function load($file = '', $data = [])
	{
		$file = str_replace('.', DIRECTORY_SEPARATOR, $file);
		$file = BTBP_DIR . '/templates' . DIRECTORY_SEPARATOR . $file . '.php';
		if (!file_exists($file)) return '';

		extract($data);
		require("$file");
	}

	public function section($file, $data = [])
	{
		ob_start();
		$this->load($file, $data);
		return ob_get_clean();
	}
}
