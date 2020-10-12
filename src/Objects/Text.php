<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Objects;

/**
 * Description of Text
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Text extends IkentooObject
{

    /**
     * @var string
     */
    private $squareImageUrl;

    /**
     * @var string
     */
    private $friendlyDisplayName;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $locale;
	
	public function getSquareImageUrl()
	{
		return $this->squareImageUrl;
	}

	public function getFriendlyDisplayName()
	{
		return $this->friendlyDisplayName;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getLocale()
	{
		return $this->locale;
	}

	public function setSquareImageUrl($squareImageUrl)
	{
		$this->squareImageUrl = $squareImageUrl;
		return $this;
	}

	public function setFriendlyDisplayName($friendlyDisplayName)
	{
		$this->friendlyDisplayName = $friendlyDisplayName;
		return $this;
	}

	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}

	public function setLocale($locale)
	{
		$this->locale = $locale;
		return $this;
	}

}