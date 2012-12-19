<?php defined('SYSPATH') or die('Bawal yan, walang ganyanan');

class Controller_Umpisa extends Controller_Template_Public {

	public function action_index()
	{

		$bilib = ORM::factory('article')->where('category','=',1)->find_all();
		$asar  = Orm::factory('article')->where('category','=',2)->find_all();

		$view = View::factory('public/umpisa');
		$view->bind('bilib',$bilib);
		$view->bind('asar',$asar);

		$this->template->content = $view;
		$this->template->styles  = array('styles');
//		$session = Session::instance()->get('user',NULL);
//		Helper_Util::pr($session);
	}

	public function action_logout()
	{
		$fb         = FacebookAuth::factory();
		$logout_url = $fb->logout_url();
		//$fb->destroy();

		echo $logout_url;
	}

	public function action_login()
	{
		//echo 'here';
		$this->template->content = View::factory('public/login');
		$this->template->styles  = array('styles');
	}

	public function action_post()
	{
		//$a = new Model_Article;
		//Helper_Util::pr($a);

		//echo time();
		echo date('Y-m-d H:i:s');
		exit;
	}
}
/* End of file umpisa.php */
/* Location: ./application/classes/controller/umpisa.php */
