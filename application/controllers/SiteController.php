<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class SiteController extends CController
{
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		$m = File::model();
		if (isset($_GET['files']))
			return 0;
		echo $m->greeting();
	}
}