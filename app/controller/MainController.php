<?php
class MainController extends Controller
{
	function render()
	{
		$this->f3->set('view', 'template/home.htm');
		//рендерим в view
		echo \Template::instance()->render('layoutView.htm');
	}
}
