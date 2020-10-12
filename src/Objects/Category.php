<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Objects;

/**
 * Description of Category
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Category extends IkentooObject
{

	/**
	 * @var string
	 */
	private $category;

	/**
	 * @var string
	 */
	private $value;

	public function getCategory()
	{
		return $this->category;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function setCategory($category)
	{
		$this->category = $category;
		return $this;
	}

	public function setValue($value)
	{
		$this->value = $value;
		return $this;
	}

}
