<?php defined('SYSPATH') or die('Bawal yan, walang ganyanan');

class Model_User extends ORM {

	public function save(Validation $validation = NULL)
	{
		if (!$this->id)
		{
			$this->created = date('Y-m-d H:i:s');
		}

		parent::save($validation);
	}
}
/* End of file user.php */
/* Location: ./application/classes/model/user.php */