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

	//	$this->file = File::model();
		$this->file = new File();
	}

	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		$uploadCtrl = Yii::app()->createController('upload')[0];
		var_dump(
			$uploadCtrl
		);
		$dir = dirname(__FILE__).'/../../userfiles/bopper/';
		if (isset($_GET['files']))
			$this->listFiles($dir);

		if (isset($_GET['upload'])) {
			header('Content-type: text/plain');
			var_dump($_SERVER);
			var_dump($_REQUEST);
		}
	}

	private function listFiles($dir)
	{
		$data['files'] = $this->file->listFiles($dir);
		return $this->renderJSON($data);
	}

	/**
	 * Return data to browser as JSON and end application.
	 * @param array $data
	 */
	protected function renderJSON($data)
	{
		header('Content-type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
		Yii::app()->end();
	}
}
