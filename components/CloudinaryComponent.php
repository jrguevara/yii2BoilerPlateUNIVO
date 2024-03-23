<?php

namespace app\components;

use yii\base\Component;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;


class CloudinaryComponent extends Component
{  
    public $cloud_name;
    public $api_key;
    public $api_secret;

    public function init()
    {
        parent::init();
        $config = Configuration::instance();
        $config->cloud->cloudName = $this->cloud_name;
        $config->cloud->apiKey = $this->api_key;
        $config->cloud->apiSecret = $this->api_secret;
        $config->url->secure = true;
        
    }
    
    public function upload($file, $folder, $options = [])
    {
        $uploadApi = new UploadApi();
        $options = array_merge($options, [
            'folder' => $folder,
            'resource_type' => 'image',
            'secure' => true
        ]);

        $result = $uploadApi->upload($file, $options);

        $url = $result['secure_url'];
        return $url;
    }
}
