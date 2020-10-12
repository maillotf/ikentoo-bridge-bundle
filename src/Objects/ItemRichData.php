<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Objects;

use MaillotF\Ikentoo\IkentooBridgeBundle\Helpers\CastHelper;

/**
 * Description of ItemRichData
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class ItemRichData extends IkentooObject
{

	/**
	 * @var string
	 */
	private $squareImageUrl;

	/**
	 * @var string
	 */
	private $rawImageUrl;

	/**
	 * @var Text[]
	 */
	private $texts;

	/**
	 * @var string[]
	 */
	private $allergenCodes;

	/**
	 * @var MenuEntry[]
	 */
	private $menuEntry;

	public function init()
	{
		$texts = array();
		if (!empty($this->texts))
			foreach ($this->texts as $text)
			{
				$texts[] = CastHelper::cast((object) $text, 'Text');
			}
		$this->texts = $texts;
	}
	
	public function getSquareImageUrl()
	{
		return $this->squareImageUrl;
	}

	public function getRawImageUrl()
	{
		return $this->rawImageUrl;
	}

	public function getTexts(): array
	{
		return $this->texts;
	}

	public function getAllergenCodes()
	{
		return $this->allergenCodes;
	}

	public function getMenuEntry(): array
	{
		return $this->menuEntry;
	}

	public function setSquareImageUrl($squareImageUrl)
	{
		$this->squareImageUrl = $squareImageUrl;
		return $this;
	}

	public function setRawImageUrl($rawImageUrl)
	{
		$this->rawImageUrl = $rawImageUrl;
		return $this;
	}

	public function setTexts(array $texts)
	{
		$this->texts = $texts;
		return $this;
	}

	public function setAllergenCodes($allergenCodes)
	{
		$this->allergenCodes = $allergenCodes;
		return $this;
	}

	public function setMenuEntry(array $menuEntry)
	{
		$this->menuEntry = $menuEntry;
		return $this;
	}

}
