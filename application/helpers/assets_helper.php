<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *  Yoozi
 *
 *
 *
 *  @package    Yoozi
 *  @author     Yoozi Dev Team
 *  @copyright  Copyright (c) 2010, Yoozi.org
 *  @since      Version 1.0.0
 *  @filesource
 */

// ------------------------------------------------------------------------

/**
 *  静态文件助手函数
 *
 *
 *
 *  @package    Yoozi
 *  @subpackage Helpers
 *  @category   Helpers
 *  @author     Saturn <yangg.hu@yoozi.org>
 *  @link
 */

// ------------------------------------------------------------------------

/**
 * Generate js asset tag - <script>
 *
 * @access	public
 * @param	string	 the name of the file or asset
 * @param	string	 optional, main version of this asset
 * @param	array	 optional, attribute of the <script> tag
 * @return	string	 HTML code for CSS asset
 */
function js($name, $version = '', $attributes = array())
{
	$CI = & get_instance();
	return $CI->assets->parse('js', $name, $attributes, $version);
}

// --------------------------------------------------------------------

/**
 * Generate img asset tag - <img>
 *
 * @access	public
 * @param	string	 the name of the file or asset
 * @param	array	 optional, attribute of the <img> tag
 * @return	string	 HTML code for CSS asset
 */
function image($name, $attributes = array())
{
	$CI = & get_instance();
	return $CI()->assets->parse('image', $name, $attributes);
}

// --------------------------------------------------------------------

/**
 * Generate img asset url
 *
 * @access	public
 * @param	string	 the name of the file or asset
 * @return	string	 HTML code for CSS asset
 */
function image_url($name)
{
	$CI = & get_instance();
	return $CI->assets->parse('image', $name, array(), '', TRUE);
}

// --------------------------------------------------------------------

/**
 * Generate CSS asset meta tags - <link>
 *
 * @access	public
 * @param	string	 the name of the file or asset
 * @param	array	 optional, attribute of the <link> tag
 * @return	string	 HTML code for CSS asset
 */
function css($name, $version = '', $attributes = array())
{
	$CI = & get_instance();
	return $CI->assets->parse('css', $name, $attributes, $version);
}