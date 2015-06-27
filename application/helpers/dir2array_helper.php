<?php
/**
 * List directory to array
 */
if(!function_exists('dir2array'))
{
	function dir2array($dir, $separator = DIRECTORY_SEPARATOR, $paths = 'relative') 
	{
	    $result = [];
	    $cdir = scandir($dir);
	    foreach ($cdir as $key => $value)
	    {
	        if (!in_array($value, [".", ".."]))
	        {
	            if (is_dir($dir . $separator . $value))
	            {
	                $result[$value] = dir2array($dir . $separator . $value, $separator, $paths);
	            }
	            /*else
	            {
	                if ($paths == 'relative')
	                {
	                    $result[] = $dir . '/' . $value;                    
	                }
	                elseif ($paths == 'absolute')
	                {
	                    $result[] = base_url() . $dir . '/' . $value;
	                }
	            }*/
	        }
	    }
	    return $result;
	} 
}// end function exists


?>
