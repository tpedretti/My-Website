<?php
require_once 'classes/view.php';
require_once 'semantics/header/header.html';

$view = new view();
echo  $view->mainPage();

require_once 'semantics/footer/footer.html';
