<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class SiteController extends CController
{
	private $file;

	public function __construct()
	{
		parent::__construct($this->id);//, $this->module);

		$this->file = File::model();
	}

	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		if (isset($_GET['files']))
			return $this->file->listFiles();
		echo $this->file->greeting();
	}
}
