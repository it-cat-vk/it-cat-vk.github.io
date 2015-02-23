<?php

define("IT_CAT_CMS_RUNNING", 1);

// TODO: исправить разделитель каталогов
require("app/router.php");
require("app/database.php");
require("mods/index.php");
require("template/index.php");

$router = new Router();
$module = $router->get_module();
$data = $module->get_data();
$template = new Template();

$template->draw($data);
