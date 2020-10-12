<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use MaillotF\Ikentoo\IkentooBridgeBundle\DependencyInjection\IkentooExtension;

/**
 * Description of IkentooBridgeBundle
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class IkentooBridgeBundle extends Bundle
{

	public function getContainerExtension()
	{
		return new IkentooExtension();
	}

}
