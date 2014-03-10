<?php

class File extends CFormModel //CActiveRecord
{
	private $hide = ['.','..'];

	public function _listFiles()
	{
		$file = dirname(__FILE__).'/../data/files.json';
		$data = file_get_contents($file);
		return CJSON::decode($data);
		//return 'hello world';
	}

	public function listFiles($target_dir) 
	{
		if ($target_dir[strlen($target_dir)-1] != '/')
			$target_dir .= '/';

		if ($handle = opendir($target_dir)) { 
			while (false !== ($file = readdir($handle))) { 
				if (!in_array($file, $this->hide)) { 
					$files[] = $file;
				} 
			} 
			closedir($handle); 
		} else {
			return false;
		}
		
		$finfo = new finfo(FILEINFO_MIME);
		foreach ($files as $file) {
			$path = $target_dir.$file;
			$tmp[] = [
				'name'     => $file,
				'ext'      => strrchr($file, "."),
				'path'     => realpath($path),
				'size'     => @filesize($path),
				'modified' => filemtime($path),
				'mimetype' => $finfo->file($path)
			];
		}
		return $tmp;
	} 	  

	public static function model($className=__CLASS__)
	{
//		return parent::model($className);
	}
}
