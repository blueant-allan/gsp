<?php defined('SYSPATH') or die('Bawal yan, walang ganyanan');

class Model_Article extends ORM {

	public function save(Validation $validation = NULL)
	{
		if ($this->id)
		{
			$this->modified = date('Y-m-d H:i:s');
		}
		else
		{
			$this->created = date('Y-m-d H:i:s');
		}

		parent::save();
	}

}
/* End of file article.php */
/* Location: ./application/classes/model/article.php */