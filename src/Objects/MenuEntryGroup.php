<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Objects;

use MaillotF\Ikentoo\IkentooBridgeBundle\Helpers\CastHelper;

/**
 * Description of MenuEntryGroup
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class MenuEntryGroup extends MenuEntry
{

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $color;

	/**
	 * @var MenuEntry[]
	 */
	private $menuEntry;

	public function init()
	{
		$menuEntries = array();
		if (!empty($this->menuEntry))
			foreach ($this->menuEntry as $menuEntry)
			{
				if ($menuEntry['type'] == 'group')
					$menuEntries[] = CastHelper::cast((object) $menuEntry, 'MenuEntryGroup');
				elseif ($menuEntry['type'] == 'menuItem')
					$menuEntries[] = CastHelper::cast((object) $menuEntry, 'MenuEntryItem');
			}
		$this->menuEntry = $menuEntries;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getColor()
	{
		return $this->color;
	}

	public function getMenuEntry(): array
	{
		return $this->menuEntry;
	}

	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	public function setColor($color)
	{
		$this->color = $color;
		return $this;
	}

	public function setMenuEntry(array $menuEntry)
	{
		$this->menuEntry = $menuEntry;
		return $this;
	}

}
