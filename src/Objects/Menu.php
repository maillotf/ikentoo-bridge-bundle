<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Objects;

use MaillotF\Ikentoo\IkentooBridgeBundle\Helpers\CastHelper;

/**
 * Description of Menu
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Menu extends IkentooObject
{

	/**
	 * @var string
	 */
	private $menuName;

	/**
	 * @var MenuEntryGroup
	 */
	private $menuEntryGroups;

	/**
	 * @var bool
	 */
	private $richDataMissing;

	/**
	 * @var int
	 */
	private $ikentooMenuId;

	public function init()
	{
		$menuEntryGroups = array();
		if (!empty($this->menuEntryGroups))
			foreach ($this->menuEntryGroups as $menuEntryGroup)
			{
				$menuEntryGroups[] = CastHelper::cast((object) $menuEntryGroup, 'MenuEntryGroup');
			}
		$this->menuEntryGroups = $menuEntryGroups;
	}

	public function getMenuName()
	{
		return $this->menuName;
	}

	public function getMenuEntryGroups(): MenuEntryGroup
	{
		return $this->menuEntryGroups;
	}

	public function getRichDataMissing()
	{
		return $this->richDataMissing;
	}

	public function getIkentooMenuId()
	{
		return $this->ikentooMenuId;
	}

	public function setMenuName($menuName)
	{
		$this->menuName = $menuName;
		return $this;
	}

	public function setMenuEntryGroups(MenuEntryGroup $menuEntryGroups)
	{
		$this->menuEntryGroups = $menuEntryGroups;
		return $this;
	}

	public function setRichDataMissing($richDataMissing)
	{
		$this->richDataMissing = $richDataMissing;
		return $this;
	}

	public function setIkentooMenuId($ikentooMenuId)
	{
		$this->ikentooMenuId = $ikentooMenuId;
		return $this;
	}

}
