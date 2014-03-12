<?php

class User extends CFormModel //CActiveRecord
{
	private $hide = ['.','..'];


	public function list_users($target_dir)
	{
		if ($target_dir[strlen($target_dir)-1] != '/')
			$target_dir .= '/';

		if ($handle = opendir($target_dir)) {
			while (false !== ($dir = readdir($handle))) { 
				if ((!in_array($dir, $this->hide))) {
					$dirs[] = $dir;
				} 
			} 
			closedir($handle); 
		} else {
			return false;
		}

		foreach ($dirs as $dir) {
			$path = $target_dir.$dir;
			if ($size = $this->dirsize($path))
				$tmp[] = [
					'name' => $dir,
					'path' => $path,
					'size' => $size
				];
		}
		return $tmp;
	}

	private function dirsize($dir, $recursive = false) 
	{
		if ($dir[strlen($dir)-1] != '/')
			$dir .= '/';
		$size = 0;
		if ($fp = @opendir($dir)) {
			while (false !== ($file = readdir($fp))) { 
				$path = $dir.$file;
				if (!in_array($file, $this->hide)) {
					if (is_dir($path) && $recursive)
						$size += $this->dirsize($path, true);
					else 
						$size += filesize($path);
				}
			}
			closedir($fp);
			return $size; 
		} else {
			return false;
		}
	}

	public static function model($className=__CLASS__)
	{
//		return parent::model($className);
	}
}
