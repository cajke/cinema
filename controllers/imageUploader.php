<?php

class ImageUploader extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->loadModel("imageUploader");
    }

    public function uploadPath($table,$id)
    {
        if ($_FILES['file']['error'] > 0) {
            echo 'Error during uploading, try again';

        }
        $extsAllowed = array('jpg', 'jpeg', 'png', 'gif');
        $extUpload = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
        if (in_array($extUpload, $extsAllowed)) {
            $name = "web/images/{$_FILES['file']['name']}";
            $actual_name = pathinfo($name,PATHINFO_FILENAME);
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $i = 1;
            while(file_exists("web/images/".$actual_name.".".$extension))
            {
                $actual_name = (string)$actual_name."(".$i.")";
                $name = "web/images/".$actual_name.".".$extension;
                $i++;
            }
            $result = move_uploaded_file($_FILES['file']['tmp_name'], $name);
            
            if ($result) {
                $postData['path'] = $name;
                $this->model->uploadPath($table,$postData,$id);
                return $name;
            }

        } else {
            return false;
        }


    }


}