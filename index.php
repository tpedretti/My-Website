<?php
require_once 'classes/view.php';
require_once 'header.html';

$view = new view();
echo  $view->mainPage();

require_once 'footer.html';
