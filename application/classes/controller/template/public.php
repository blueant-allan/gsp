<?php defined('SYSPATH') or die('Bawal yan, walang ganyanan');

class Controller_Template_Public extends Controller_Template {

	public $template = 'templates/public';

	public function before()
	{
		parent::before();

		$this->template->title            = 'ganitosapinas.com';
		$this->template->meta_description = '';
		$this->template->content          = '';
		$this->template->styles           = array();
		$this->template->scripts          = array();
	}

	public function after()
	{
		if ($this->auto_render)
		{
			// clean the script values
			$idx = 0; // reset the array index position
			foreach ($this->template->scripts as $script)
			{
				if (!stristr($script,'.js'))
				{
					$this->template->scripts[$idx] = $script.'.js';
				}
				$idx++;
			}

			// clean the styles values
			$idx = 0; // reset the array index position
			foreach ($this->template->styles as $style)
			{
				if (!stristr($style,'.css'))
				{
					$this->template->styles[$idx] = $style.'.css';
				}
				$idx++;
			}
		}

		parent::after();
	}

}
/* End of file public.php */
/* Location: ./application/classes/controller/template/public.php */