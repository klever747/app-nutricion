<?php

//header('Location:Vista/index.php');
require_once "controllers/template.controller.php";
require_once "controllers/curl.controller.php";
require_once "controllers/users.controller.php";

require_once "extensiones/vendor/autoload.php";

$index = new TemplateController();
$index-> index();

