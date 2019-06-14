<?php
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/Form.php';
require 'libs/Form/Validation.php';
//
require 'controllers/imageUploader.php';


// Library
require 'libs/Database.php';
require 'libs/Session.php';
require 'libs/Cookie.php';

require 'config/paths.php';
require 'config/db_config.php';
require 'config/constants.php';


$app = new Bootstrap();
