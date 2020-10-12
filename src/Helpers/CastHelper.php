<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Helpers;

use MaillotF\Ikentoo\IkentooBridgeBundle\Objects\IkentooObject;

/**
 * Description of CastHelper
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Helpers
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class CastHelper
{

	/**
	 * Cast stdObject to a IkentooObject
	 * 
	 * @param type $instance
	 * @param string $className
	 * @return IkentooObject
	 * @author Flavien Maillot 
	 */
	public static function cast($instance, string $className): IkentooObject
	{
		$className = 'MaillotF\\Ikentoo\\IkentooBridgeBundle\\Objects\\' . $className;
		$result = unserialize(sprintf(
						'O:%d:"%s"%s',
						\strlen($className),
						$className,
						strstr(strstr(serialize($instance), '"'), ':')
		));
		$result->init();
		return ($result);
	}

}
