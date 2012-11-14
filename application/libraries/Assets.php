<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 *	Yoozi
 *
 *
 *
 *	@package	Yoozi
 *	@author		Yoozi Dev Team
 *	@copyright	Copyright (c) 2010, Yoozi.org
 *	@since		Version 1.0.0
 *	@filesource
 */

// ------------------------------------------------------------------------

/**
 *	用于获取Js，CSS，图片的路径和生成其HTML标签代码
 *
 *
 *	@package	Yoozi
 *	@subpackage Libraries
 *	@category	Libraries
 *	@author		Saturn <yangg.hu@yoozi.org>
 *	@link
 */
class Assets
{
	// Don't touch any configs below, since they will be auto populated
	private $_dir = '';
	private $_version = '';
	private $_servers = array();

	protected $server = '';
	protected $origin = '';

	// --------------------------------------------------------------------

	public function __construct($config = array())
	{
		// Notice: Config array corresponding with the class are automatically
		// loaded when loading the library itself
		if ( ! empty($config))
		{
			// loop through the configs
			foreach ($config as $key => $val)
			{
				// whether the key is set or not?
				if(isset($this->{'_' . $key}))
				{
					// set properties
					$this->{'_' . $key} = $val;
				}
			}
		}

		// Populate the $server for fallback purpose
		$this->server = config_item('base_url') . 'assets/';

		// Make sure this origin exists!
		if(isset($this->_servers[ENVIRONMENT]))
		{
			$this->server = $this->_servers[ENVIRONMENT];
		}

		log_message('debug', "Assets Class Initialized.");
	}

	// --------------------------------------------------------------------

	/**
	 * assets_server
	 *
	 * Get current assets server url
	 *
	 * @access	public
	 * @return	string
	 */
	public function assets_server()
	{
		return $this->server;
	}

	// --------------------------------------------------------------------

	/**
	 * Parse
	 *
	 *	 Generate asset meta tags - <link>, <img> OR <script>
	 *
	 * @access	public
	 * @param	string	 the type of the asset: 'js', 'css' OR 'image'
	 * @param	string	 the name of the file or asset
	 * @param	array	 optional, attribute of the <link> tag
	 * @param	string	 optional, main version of this asset
	 * @param	bool	 optional, return asset url OR return HTML tag
	 * @return	string	 HTML code for CSS asset
	 */
	public function parse($type, $asset_name, $attributes = array(), $version = '', $return = FALSE)
	{
		// Determine the asset url
		$asset_url = $this->server;
		if(isset($this->_dir[$type]))
		{
			$asset_url .= rtrim($this->_dir[$type], '/') . '/';
		}

		// Is this file versionable?
		if($type != 'image')
		{
			$parts = explode('.', $asset_name);
			// Fetch the last $part from the file segments, they are commonly file extensions
			$last = end($parts);
			// Remove the last part from the $parts
			array_pop($parts);

			// Attach version to the file
			$parts[] = $version ? $version : $this->_version;

			// Recover the last part and file name
			$parts[] = $last;

			$asset_name = implode('.', $parts);
		}

		// Append the asset name to the url
		$asset_url .= $asset_name;

		// Call the handler
		return $return ? $asset_url : $this->{'_' . strtolower($type)}($asset_url, $attributes);
	}

	// --------------------------------------------------------------------

	/**
	 * _css
	 *
	 * Generate the css meta tag - <link>
	 *
	 * @access	private
	 * @param	string	$url of the asset
	 * @param	array	$attr of the asset
	 * @return	void
	 */
	private function _css($url, $attr = array())
	{
		$str = $attr ? $this->_parse_attributes($attr) : '';
		if( ! preg_match('/rel="([^\"]+)"/', $str)) $str .= ' rel="stylesheet"';

		return '<link href="'. base_url($url) . '" type="text/css"' . $str . ' />' . "\n";
	}

	// --------------------------------------------------------------------

	/**
	 * _image
	 *
	 * Generate the img tag - <link>
	 *
	 * @access	private
	 * @param	string	$url of the asset
	 * @param	array	$attr of the asset
	 * @return	void
	 */
	private function _image($url, $attr = array())
	{
		// No alternative text given? Use the filename, better than nothing!
		$str = $attr ? $this->_parse_attributes($attr) : '';
		return '<img src="' . base_url($url) . '"'. $str . ' />' . "\n";
	}

	// --------------------------------------------------------------------

	/**
	 * _js
	 *
	 * Generate the js tag - <link>
	 *
	 * @access	private
	 * @param	string	$url of the asset
	 * @param	array	$attr of the asset
	 * @return	void
	 */
	private function _js($url, $attr = array())
	{
		$str = $attr ? $this->_parse_attributes($attr) : '';
		return '<script type="text/javascript" src="'. base_url($url) . '"></script>' . "\n";
	}

	// ------------------------------------------------------------------------

	/**
	 * Parse HTML Attributes
	 *
	 * Turns an array of attributes into a string
	 *
	 * @access		private
	 * @param		mixed		attributes to be parsed
	 * @return		string 		string of html attributes
	 */
	private function _parse_attributes($attributes = NULL)
	{
		$str = '';
		if(is_string($attributes))
		{
			$str = $attributes;
		}
		else if(is_array($attributes) OR is_object($attributes))
		{
			foreach($attributes as $key => $value)
			{
				$str .= ' ' . $key . '="' . $value . '"';
			}
		}

		return $str;
	}
}