<?php defined('SYSPATH') or die('Bawal yan, walang ganyanan');

class Controller_Facebook extends Controller {

	public function action_index()
	{
		$fb = FacebookAuth::factory();

		if($fb->logged_in())
		{
			$user = ORM::factory('user')
				->where('facebook_uid', '=', $fb->get('uid'))
				->find();

			if ($user->loaded())
			{
				$user->num_logins    = $user->num_logins + 1;
				$user->email         = $fb->get('email');
				$user->last_login    = date('Y-m-d H:i:s');
				$user->last_login_ip = Request::$client_ip;
				$user->picture       = $fb->get('pic');
				$user->save();

//				echo 'here';
//				echo Html::image($user->picture,array('height' => '60'));

				Session::instance()->set('user',array(
					'id'       => $user->id,
					'username' => $user->username,
					'name'     => $user->name,
					'picture'  => $user->picture
				));
//				Helper_Util::pr($_SESSION);

				$this->request->redirect();
			}
			else
			{
				$user = new Model_User;

				$user->username      = $fb->get('username');
				$user->email         = $fb->get('email');
				$user->facebook_uid  = $fb->get('uid');
				$user->name          = $fb->get('name');
				$user->picture       = $fb->get('pic');
				$user->last_login    = date('Y-m-d H:i:s');
				$user->last_login_ip = Request::$client_ip;
				$user->num_logins    = 0;
				$user->save();

			}
		}
		else
		{
			Request::current()->redirect($fb->login_url());
		}
	}

	public function action_logout()
	{



		try
		{
			$fb = FacebookAuth::factory();
		}
		catch (Exception $ex)
		{
			echo $ex->getMessage();
		}



//		$logout_url = $fb->logout_url();
//		$session = Session::instance()->get('user',NULL);

//		$fb->destroy();
//		Helper_Util::pr($fb);

//		if ($session)
//		{
//			Session::instance()->delete('user');
//		}

//		echo $logout_url;
//		$this->request->redirect($logout_url);
	}

}

/* End of file facebook.php */
/* Location: ./application/classes/controller/facebook.php */