<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Objects;

/**
 * Description of Source
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Source extends IkentooObject
{
    /**
     * @var string
     */
    private $initialAccountId;
    
    /**
     * @var string
     */
    private $previousAccountId;
	
	public function getInitialAccountId()
	{
		return $this->initialAccountId;
	}

	public function getPreviousAccountId()
	{
		return $this->previousAccountId;
	}

	public function setInitialAccountId($initialAccountId)
	{
		$this->initialAccountId = $initialAccountId;
		return $this;
	}

	public function setPreviousAccountId($previousAccountId)
	{
		$this->previousAccountId = $previousAccountId;
		return $this;
	}

}