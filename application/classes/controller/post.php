<?php defined('SYSPATH') or die('Bawal yan, walang ganyanan');

class Controller_Post extends Controller {

	public function action_test()
	{
		$post_vars = $this->request->post();
		if (!empty ($post_vars))
		{
			$session['id'] = 99;
			$ws_image      = array('key' => '0a82e8ef64084435841ee3073ddaeda8745787f9');
			$unlink_file   = FALSE;

			if (isset($_FILES['source']['name']) && !empty($_FILES['source']['name']))
			{
				$ws_image['photo']     = '@'.$_FILES['source']['tmp_name'];
				$ws_image['name']      = $_FILES['source']['name'];
			}
			else
			{
				$url_file  = pathinfo($post_vars['url']);
				$save_path = DOCROOT.'asset/c/';
				$iraw      = file_get_contents($post_vars['url']);

				// i-save yung file locally para maipasa sa WS, tapus alisin din mamaya
				$fp = fopen($save_path.$url_file['basename'],'w');
				fputs($fp,$iraw);
				fclose($fp);

				$ws_image['photo']     = '@'.$save_path.$url_file['basename'];
				$ws_image['name']      = $url_file['basename'];

				$unlink_file = TRUE;
			}

//			// i-upload ang image using gspi-ws
//			$ch = curl_init();
//			$options = array(
//				CURLOPT_URL => 'http://blueant.insomnia247.nl/gspi/api/upload_photo',
//				CURLOPT_POST => 1,
//				CURLOPT_POSTFIELDS => $ws_image,
//				CURLOPT_RETURNTRANSFER => true,
//				CURLOPT_VERBOSE => 1
//			);
//			curl_setopt_array($ch, $options);
//			$response = curl_exec($ch);
//			curl_close($ch);
//
//			$image = simplexml_load_string($response);

			$piktyur = new Helper_Piktyur;
			$image = $piktyur->upload($ws_image);

			$article = array(
				'user_id'     => 99,
				'category'    => $this->request->post('category'),
				'title'       => $this->request->post('title'),
				'picture'     => $image->uid,
				'description' => $this->request->post('description'),
			);
			$a = new Model_Article;
			$a->values($article);
			$a->save();

			if ($unlink_file)
			{
				unlink($save_path.$url_file['basename']);
			}
		}
		else
		{
			$this->response->body(View::factory('blocks/post-test'));
		}
	}

	public function action_index()
	{
		if ($this->request->post())
		{
			$session     = Session::instance()->get('user',NULL);
			$ws_image    = array();
			$unlink_file = FALSE;

			// ayusin yung file uploads nung mga picture
			if (isset($_FILES['source']['name']) && !empty($_FILES['source']['name']))
			{
				$ws_image['photo']     = '@'.$_FILES['source']['tmp_name'];
				$ws_image['name']      = $_FILES['source']['name'];
			}
			else
			{
				$url_file  = pathinfo($this->request->post('url'));
				$save_path = DOCROOT.'asset/c/';
				$iraw      = file_get_contents($this->request->post('url'));

				// i-save yung file locally para maipasa sa WS, tapus alisin din mamaya
				$fp = fopen($save_path.$url_file['basename'],'w');
				fputs($fp,$iraw);
				fclose($fp);

				$ws_image['photo']     = '@'.$save_path.$url_file['basename'];
				$ws_image['name']      = $url_file['basename'];

				$unlink_file = TRUE;
			}

			// i-upload ang image using gspi-ws
			$piktyur = new Helper_Piktyur;
			$image = $piktyur->upload($ws_image);

			$article = new Model_Article;
			$article->values(array(
				'user_id'     => $session['id'],
				'category'    => $this->request->post('category'),
				'title'       => $this->request->post('title'),
				'picture'     => $image->uid,
				'description' => $this->request->post('description'),
			));
			$article->save();

			if ($unlink_file)
			{
				unlink($save_path.$url_file['basename']);
			}

			// error checking after saving data and log what happen here
			if ($article->id)
			{
				$log = array(
					'id'      => $article->id,
					'status'  => 'OK',
					'message' => 'Article was posted successfully.',
					'tran_id' => 700
				);
				$this->request->redirect();
			}
			else
			{
				$log = array(
					'status'  => 'FAILED',
					'message' => 'Article was not posted.',
					'tran_id' => 401
				);
			}
		}
	}

	public function action_sawsaw()
	{
//		echo $this->request->is_ajax();
//		Helper_Util::pr($this->request->post());
		if ($this->request->post() && $this->request->is_ajax())
		{
			$session = Session::instance()->get('user',NULL);
			if ($session)
			{
				// post comment now
				$result = array(
					'status'  => 'OK',
					'message' => 'okay',
					'uid'     => $this->request->post('id')
				);
			}
			else
			{
				$result = array(
					'status'  => 'ERROR',
					'message' => 'User not login.'
				);
			}
		}
		else
		{
			$result = array(
				'status'  => 'INVALID',
				'message' => 'Invalid request.'
			);
		}

		echo json_encode($result);
	}

}
/* End of file post.php */
/* Location: ./application/classes/controller/post.php */