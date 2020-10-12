<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Objects;

use MaillotF\Ikentoo\IkentooBridgeBundle\Helpers\CastHelper;

/**
 * Description of MenuEntry
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
abstract class MenuEntry extends IkentooObject
{
    /** 
     * @var string
     */
    protected $type;

	public function getType()
	{
		return $this->type;
	}

	public function setType($type)
	{
		$this->type = $type;
		return $this;
	}

}