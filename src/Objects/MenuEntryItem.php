<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Objects;

use MaillotF\Ikentoo\IkentooBridgeBundle\Helpers\CastHelper;

/**
 * Description of MenuEntryItem
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class MenuEntryItem extends MenuEntry
{

	/**
	 * @var string
	 */
	private $productName;

	/**
	 * @var float
	 */
	private $productPrice;

	/**
	 * @var string
	 */
	private $color;

	/**
	 * @var string
	 */
	private $sku;

	/**
	 * @var bool
	 */
	private $asSubItem;

	/**
	 * @var bool
	 */
	private $customItemNameEnabled;

	/**
	 * @var string
	 */
	private $pricingStrategy;

	/**
	 * @var float
	 */
	private $defaultTaxAmount;

	/**
	 * @var float
	 */
	private $defaultTaxPercentage;

	/**
	 * @var float
	 */
	private $typdefaultTaxPercentagee;

	/**
	 * @var array
	 */
	private $productionInstructionList;

	/**
	 * @var bool
	 */
	private $taxIncludedInPrice;

	/**
	 * @var ItemRichData
	 */
	private $itemRichData;

	public function init()
	{
		$productionInstructionList = array();
		if (!empty($this->productionInstructionList) && count($this->productionInstructionList) > 1)
		{
			foreach ($this->productionInstructionList as $productionInstruction)
			{
				$productionInstructionList[] = CastHelper::cast((object) $productionInstruction, 'ProductionInstruction');
			}
		}
		$this->productionInstructionList = $productionInstructionList;

		if (!empty($this->itemRichData))
		{
			$this->itemRichData = CastHelper::cast((object) $this->itemRichData, 'ItemRichData');
		}
	}

	public function getProductName()
	{
		return $this->productName;
	}

	public function getProductPrice()
	{
		return $this->productPrice;
	}

	public function getColor()
	{
		return $this->color;
	}

	public function getSku()
	{
		return $this->sku;
	}

	public function getAsSubItem()
	{
		return $this->asSubItem;
	}

	public function getCustomItemNameEnabled()
	{
		return $this->customItemNameEnabled;
	}

	public function getPricingStrategy()
	{
		return $this->pricingStrategy;
	}

	public function getDefaultTaxAmount()
	{
		return $this->defaultTaxAmount;
	}

	public function getDefaultTaxPercentage()
	{
		return $this->defaultTaxPercentage;
	}

	public function getTypdefaultTaxPercentagee()
	{
		return $this->typdefaultTaxPercentagee;
	}

	public function getProductionInstructionList()
	{
		return $this->productionInstructionList;
	}

	public function getTaxIncludedInPrice()
	{
		return $this->taxIncludedInPrice;
	}

	public function getItemRichData(): ItemRichData
	{
		return $this->itemRichData;
	}

	public function setProductName($productName)
	{
		$this->productName = $productName;
		return $this;
	}

	public function setProductPrice($productPrice)
	{
		$this->productPrice = $productPrice;
		return $this;
	}

	public function setColor($color)
	{
		$this->color = $color;
		return $this;
	}

	public function setSku($sku)
	{
		$this->sku = $sku;
		return $this;
	}

	public function setAsSubItem($asSubItem)
	{
		$this->asSubItem = $asSubItem;
		return $this;
	}

	public function setCustomItemNameEnabled($customItemNameEnabled)
	{
		$this->customItemNameEnabled = $customItemNameEnabled;
		return $this;
	}

	public function setPricingStrategy($pricingStrategy)
	{
		$this->pricingStrategy = $pricingStrategy;
		return $this;
	}

	public function setDefaultTaxAmount($defaultTaxAmount)
	{
		$this->defaultTaxAmount = $defaultTaxAmount;
		return $this;
	}

	public function setDefaultTaxPercentage($defaultTaxPercentage)
	{
		$this->defaultTaxPercentage = $defaultTaxPercentage;
		return $this;
	}

	public function setTypdefaultTaxPercentagee($typdefaultTaxPercentagee)
	{
		$this->typdefaultTaxPercentagee = $typdefaultTaxPercentagee;
		return $this;
	}

	public function setProductionInstructionList($productionInstructionList)
	{
		$this->productionInstructionList = $productionInstructionList;
		return $this;
	}

	public function setTaxIncludedInPrice($taxIncludedInPrice)
	{
		$this->taxIncludedInPrice = $taxIncludedInPrice;
		return $this;
	}

	public function setItemRichData(ItemRichData $itemRichData)
	{
		$this->itemRichData = $itemRichData;
		return $this;
	}

}
