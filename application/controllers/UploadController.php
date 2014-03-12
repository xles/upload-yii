<?php 

class UploadController extends CController {
	private $hide = ['.','..'];
	private $config;
	private $db;

	private function authenticate()
	{
		$key = "example_key";
		$token = array(
			"iss" => "http://example.org",
			"aud" => "http://example.com",
			"iat" => 1356999524,
			"nbf" => 1357000000
		);

		$jwt = JWT::encode($token, $key);
		$decoded = JWT::decode($jwt, $key);

		print_r($decoded);
	}

	public function __construct()
	{
	//	$json = file_get_contents("conf.json");
	//	if (($this->config = json_decode($json)) == NULL)
	//		throw new Exception('Unable to parse configuration file.');

		#$this->connect();
	}

	private function connect()
	{
		$this->db = new mysqli(
			$this->config->database->server,
			$this->config->database->user,
			$this->config->database->password,
			$this->config->database->database,
			$this->config->database->port
		);
		
		if ($this->db->connect_errno) {
			echo "Failed to connect to MySQL: (" . $this->db->connect_errno . ") " . $this->db->connect_error;
		}
	}

	private function is_safe($filename)
	{
		$exts = ['gif', 'png', 'apng', 'jpg', 
			'jpeg', 'bmp', 'svg', 'pdf'];
		if (in_array($ext, $exts))
			return true;
		else
			return false;
	}

	private function is_binary($filename)
	{
		// return mime type ala mimetype extension
		$finfo = new finfo(FILEINFO_MIME);

		//check to see if the mime-type starts with 'text'
		if (substr($finfo->file($filename), 0, 4) == 'text') {
			return false;
		} else {
			return true;
		}
	}


	public function __destruct()
	{
		return 0;
	}
}
