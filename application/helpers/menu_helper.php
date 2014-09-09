<?php

if(!function_exists('menu'))
{
	function menu($dir = 'modules/', $separator = DIRECTORY_SEPARATOR, $paths = 'relative')
	{
			$result = array();
			$cdir = scandir($dir);
			foreach ($cdir as $key => $value)
			{
				if (!in_array($value, array(".", "..")))
				{
					if (is_dir($dir . $separator . $value))
					{
						$result[] = array('name'=>$value,'label'=> set_label($value));
					}
				}
			}
			return $result;
	}
}
		
		