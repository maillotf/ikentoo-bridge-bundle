<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Objects;

/**
 * Description of ProductionInstruction
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class ProductionInstruction extends IkentooObject
{

	/**
	 * @var bool
	 */
	private $multiSelectionPermitted;

	/**
	 * @var string
	 */
	private $productionInstructionGroupName;

	/**
	 * @var int
	 */
	private $productionIntructionGroupId;

	public function getMultiSelectionPermitted()
	{
		return $this->multiSelectionPermitted;
	}

	public function getProductionInstructionGroupName()
	{
		return $this->productionInstructionGroupName;
	}

	public function getProductionIntructionGroupId()
	{
		return $this->productionIntructionGroupId;
	}

	public function setMultiSelectionPermitted($multiSelectionPermitted)
	{
		$this->multiSelectionPermitted = $multiSelectionPermitted;
		return $this;
	}

	public function setProductionInstructionGroupName($productionInstructionGroupName)
	{
		$this->productionInstructionGroupName = $productionInstructionGroupName;
		return $this;
	}

	public function setProductionIntructionGroupId($productionIntructionGroupId)
	{
		$this->productionIntructionGroupId = $productionIntructionGroupId;
		return $this;
	}

}
