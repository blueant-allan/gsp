<?php defined('SYSPATH') or die('Bawal yan, walang ganyanan');

class Controller_Umpisa extends Controller_Template_Public {

	public function action_index()
	{

		$bilib = ORM::factory('article')->where('category','=',1)->order_by('id','DESC')->find_all();
		$asar  = Orm::factory('article')->where('category','=',2)->order_by('id','DESC')->find_all();

		$view = View::factory('public/umpisa');
		$view->bind('bilib',$bilib);
		$view->bind('asar',$asar);

		$this->template->content = $view;
		$this->template->styles  = array('styles');
	}

	public function action_login()
	{
		$this->template->content = View::factory('public/login');
		$this->template->styles  = array('styles');
	}
}
/* End of file umpisa.php */
/* Location: ./application/classes/controller/umpisa.php */
