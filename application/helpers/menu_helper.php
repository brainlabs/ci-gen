<?php
/**
 * Menu Helper
 */
if(!function_exists('menu'))
{
	function menu($dir = 'modules/', $separator = DIRECTORY_SEPARATOR, $paths = 'relative')
	{
			$result = [];
			$cdir = scandir($dir);
			foreach ($cdir as $key => $value)
			{
				if (!in_array($value, [".", ".."]))
				{
					if (is_dir($dir . $separator . $value))
					{
						$result[] = ['name'=>$value,'label'=> set_label($value)];
					}
				}
			}
			return $result;
	}
}
		
