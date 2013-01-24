<?php defined('SYSPATH') or die('Bawal yan, walang ganyanan');

class Helper_Piktyur {

	const WS_KEY   = '0a82e8ef64084435841ee3073ddaeda8745787f9';
	const ENDPOINT = 'http://blueant.insomnia247.nl/gspi/api/';

	const RESOURCE_UPLOAD_PHOTO = 'upload_photo';
	const RESOURCE_PHOTO        = '';

	public function upload($data)
	{
		$data['key'] = self::WS_KEY;

		// i-upload ang image using gspi-ws
		$ch = curl_init();
		$options = array(
			CURLOPT_URL => self::ENDPOINT.self::RESOURCE_UPLOAD_PHOTO,
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_VERBOSE => 1
		);
		curl_setopt_array($ch, $options);
		$response = curl_exec($ch);
		curl_close($ch);

		return simplexml_load_string($response);
	}

}
/* End of file piktyur.php */
/* Location: ./application/classes/helper/piktyur.php */