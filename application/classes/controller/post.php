<?php defined('SYSPATH') or die('Bawal yan, walang ganyanan');

class Controller_Post extends Controller {

	public function action_test()
	{
		$post_vars = $this->request->post();
		if (!empty ($post_vars))
		{
			$session['id'] = 99;
			$files = FALSE;

			if (isset($_FILES['source']['name']) && !empty($_FILES['source']['name']))
			{
				$files = Validation::factory($_FILES);
				$directory = 'asset/i/';

				// get extension name
				$file_tokens = explode('.',$files['source']['name']);
				$filename = date('mdyhms').'_00'.$session['id'].'_'.time().'.'.$file_tokens[1];

				Upload::save($files['source'],$filename,$directory);
				$url = $directory.$filename;
			}
			else
			{
				$url = $this->request->post('url');
			}


			$article = array(
				'user_id'     => 99,
				'category'    => $this->request->post('category'),
				'title'       => $this->request->post('title'),
				'picture'     => $url,
				'description' => $this->request->post('description'),
			);
			Helper_Util::pr($article);
			$a = new Model_Article;
			$a->values($article);
			$a->save();
			Helper_Util::pr($this->request->post());
		}
		else
		{
			$this->response->body(View::factory('blocks/post-test'));
		}
	}

	public function action_index()
	{
		$result = array(
			'status'  => 'INVALID',
			'message' => 'Invalid api access.',
			'tran_id' => 400
		);

		if ($this->request->is_ajax())
		{
			$session = Session::instance()->get('user',NULL);

			// ayusin yung file uploads nung mga picture
			if (isset($_FILES['source']['name']) && !empty($_FILES['source']['name']))
			{
				$files = Validation::factory($_FILES);
				$directory = 'asset/i/';

				// get extension name
				$file_tokens = explode('.',$files['source']['name']);
				$filename = date('mdyhms').'_00'.$session['id'].'_'.time().'.'.$file_tokens[1];

				Upload::save($files['source'],$filename,$directory);
				$url = $directory.$filename;
			}
			else
			{
				$url = $this->request->post('url');
			}

			$article = new Model_Article;
			$article->values(array(
				'user_id'     => $session['id'],
				'category'    => $this->request->post('category'),
				'title'       => $this->request->post('title'),
				'picture'     => $url,
				'description' => $this->request->post('description'),
			));
			$article->save();

			if ($article->id)
			{
				$result = array(
					'id'      => $article->id,
					'status'  => 'OK',
					'message' => 'Article was posted successfully.',
					'tran_id' => 700
				);
			}
			else
			{
				$result = array(
					'status'  => 'FAILED',
					'message' => 'Article was not posted.',
					'tran_id' => 401
				);
			}
		}

		echo json_encode($result);
	}

}
/* End of file post.php */
/* Location: ./application/classes/controller/post.php */