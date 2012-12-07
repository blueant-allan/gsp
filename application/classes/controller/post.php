<?php defined('SYSPATH') or die('Bawal yan, walang ganyanan');

class Controller_Post extends Controller {

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

			$article = new Model_Article;
			$article->values(array(
				'user_id'     => $session['id'],
				'category'    => $this->request->post('category'),
				'title'       => $this->request->post('title'),
				'url'         => $this->request->post('url'),
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