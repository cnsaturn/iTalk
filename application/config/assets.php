<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Mapping between assets CDN Server and app environment variable
|--------------------------------------------------------------------------
|
|
*/
$config['servers'] = array(
	'development'	=> '/assets/',
	'testing' 	=> '/assets/',
	'production'	=> '/assets/'
);

/*
|--------------------------------------------------------------------------
| Current Assets Version
|--------------------------------------------------------------------------
|
| Specify the current assets version!
|
| THIS VALUE CAN BE OVERRIDED ON A PER-FILE BASIS!
|
*/
$config['version'] = 'v100';

/*
|--------------------------------------------------------------------------
| Assets Directory
|--------------------------------------------------------------------------
|
| 图片，Javascript和CSS文件夹的名字，可以随意修改，但需与已存在的文件夹名称相匹配。
|
| 请勿加任何斜杠！！！
|
|	默认结构：
|		+ assets
|			- imgs
|			- js
|			- css
|
*/
$config['dir'] = array(
	'image' => 'imgs',
	'js'	=> 'scripts',
	'css'	=> 'styles'
);