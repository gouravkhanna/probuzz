<?php
//for defining root path to use at various links
define("ROOTPATH","http://probuzz.com/");
define("DOC_PATH",$_SERVER["DOCUMENT_ROOT"]."");
define("UPLOAD_PATH",DOC_PATH."data/userdata/resume/");
define('DOC_ROOT',$_SERVER['DOCUMENT_ROOT']);

define('SITE_ROOT',DOC_ROOT);
define('SITE_PATH','http://'.$_SERVER['HTTP_HOST']);
define('IMAGE_PATH',SITE_PATH.'images/');
define('CSS_PATH',SITE_PATH.'css/');
define('JS_PATH',SITE_PATH.'js/');
define('LIBRARY_ROOT',SITE_ROOT.'library/');
define('VIEW_PATH',SITE_ROOT.'views/');
define('MODEL_PATH',SITE_ROOT.'class/');

?>
