<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Objects;

use MaillotF\Ikentoo\IkentooBridgeBundle\Helpers\CastHelper;

/**
 * Description of SaleLine
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class SaleLine extends IkentooObject
{
    /**
     * @var string|null
     */
    private $id;
    /**
     * @var string|null
     */
    private $parentLineId;
    /**
     * @var float|null
     */
    private $totalNetAmountWithTax;
    /**
     * @var float|null
     */
    private $totalNetAmountWithoutTax;
    /**
     * @var float
     */
    private $menuListPrice;
    /**
     * @var float
     */
    private $unitCostPrice;
    /**
     * @var float
     */
    private $serviceCharge;
    /**
     * @var float
     */
    private $serviceChargeRate;
    /**
     * @var float
     */
    private $discountAmount;
    /**
     * @var float
     */
    private $taxAmount;
    /**
     * @var string
     */
    private $discountType;
    /**
     * @var string
     */
    private $discountCode;
    /**
     * @var string
     */
    private $discountName;

    /**
     * @var float
     */
    private $accountDiscountAmount;
    /**
     * @var string
     */
    private $accountDiscountType;
    /**
     * @var string
     */
    private $accountDiscountCode;
    /**
     * @var string
     */
    private $accountDiscountName;
    /**
     * @var float
     */
    private $totalDiscountAmount;

    /**
     * @var string
     */
    private $sku;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $statisticGroup;
    /**
     * @var float
     */
    private $taxRatePercentage;    
    /**
     * @var AccountingGroup
     */
    private $accountingGroup;    

    /**
     * @var string
     */
    private $currency;       
    /**
     * @var string[]
     */
    private $tags; 
    /**
     * @var float
     */
    private $quantity;
    /**
     * @var string
     */
    private $revenueCenter;
    /**
     * @var float
     */
    private $revenueCenterId;
    /**
     * @var Category[]
     */
    private $categories;
    /**
     * @var string
     */
    private $timeOfSale;
    /**
     * @var int
     */
    private $staffId;
    /**
     * @var string
     */
    private $staffName;
    /**
     * @var int
     */
    private $deviceId;
    /**
     * @var string
     */
    private $deviceName;
    /**
     * @var string
     */
    private $voidReason;
    /**
     * @var string
     */
    private $accountProfileCode;

    public function init()
	{
        $this->accountingGroup = CastHelper::cast((object) $this->accountingGroup, 'AccountingGroup');

		$categories = array();
		if (!empty($this->categories))
			foreach ($this->categories as $category)
			{
				$categories[] = CastHelper::cast((object) $category, 'Category');
			}
        $this->categories = $categories;
	}
	
	public function getId()
	{
		return $this->id;
	}

	public function getParentLineId()
	{
		return $this->parentLineId;
	}

	public function getTotalNetAmountWithTax()
	{
		return $this->totalNetAmountWithTax;
	}

	public function getTotalNetAmountWithoutTax()
	{
		return $this->totalNetAmountWithoutTax;
	}

	public function getMenuListPrice()
	{
		return $this->menuListPrice;
	}

	public function getUnitCostPrice()
	{
		return $this->unitCostPrice;
	}

	public function getServiceCharge()
	{
		return $this->serviceCharge;
	}

	public function getServiceChargeRate()
	{
		return $this->serviceChargeRate;
	}

	public function getDiscountAmount()
	{
		return $this->discountAmount;
	}

	public function getTaxAmount()
	{
		return $this->taxAmount;
	}

	public function getDiscountType()
	{
		return $this->discountType;
	}

	public function getDiscountCode()
	{
		return $this->discountCode;
	}

	public function getDiscountName()
	{
		return $this->discountName;
	}

	public function getAccountDiscountAmount()
	{
		return $this->accountDiscountAmount;
	}

	public function getAccountDiscountType()
	{
		return $this->accountDiscountType;
	}

	public function getAccountDiscountCode()
	{
		return $this->accountDiscountCode;
	}

	public function getAccountDiscountName()
	{
		return $this->accountDiscountName;
	}

	public function getTotalDiscountAmount()
	{
		return $this->totalDiscountAmount;
	}

	public function getSku()
	{
		return $this->sku;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getStatisticGroup()
	{
		return $this->statisticGroup;
	}

	public function getTaxRatePercentage()
	{
		return $this->taxRatePercentage;
	}

	public function getAccountingGroup(): AccountingGroup
	{
		return $this->accountingGroup;
	}

	public function getCurrency()
	{
		return $this->currency;
	}

	public function getTags()
	{
		return $this->tags;
	}

	public function getQuantity()
	{
		return $this->quantity;
	}

	public function getRevenueCenter()
	{
		return $this->revenueCenter;
	}

	public function getRevenueCenterId()
	{
		return $this->revenueCenterId;
	}

	public function getCategories(): array
	{
		return $this->categories;
	}

	public function getTimeOfSale()
	{
		return $this->timeOfSale;
	}

	public function getStaffId()
	{
		return $this->staffId;
	}

	public function getStaffName()
	{
		return $this->staffName;
	}

	public function getDeviceId()
	{
		return $this->deviceId;
	}

	public function getDeviceName()
	{
		return $this->deviceName;
	}

	public function getVoidReason()
	{
		return $this->voidReason;
	}

	public function getAccountProfileCode()
	{
		return $this->accountProfileCode;
	}

	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	public function setParentLineId($parentLineId)
	{
		$this->parentLineId = $parentLineId;
		return $this;
	}

	public function setTotalNetAmountWithTax($totalNetAmountWithTax)
	{
		$this->totalNetAmountWithTax = $totalNetAmountWithTax;
		return $this;
	}

	public function setTotalNetAmountWithoutTax($totalNetAmountWithoutTax)
	{
		$this->totalNetAmountWithoutTax = $totalNetAmountWithoutTax;
		return $this;
	}

	public function setMenuListPrice($menuListPrice)
	{
		$this->menuListPrice = $menuListPrice;
		return $this;
	}

	public function setUnitCostPrice($unitCostPrice)
	{
		$this->unitCostPrice = $unitCostPrice;
		return $this;
	}

	public function setServiceCharge($serviceCharge)
	{
		$this->serviceCharge = $serviceCharge;
		return $this;
	}

	public function setServiceChargeRate($serviceChargeRate)
	{
		$this->serviceChargeRate = $serviceChargeRate;
		return $this;
	}

	public function setDiscountAmount($discountAmount)
	{
		$this->discountAmount = $discountAmount;
		return $this;
	}

	public function setTaxAmount($taxAmount)
	{
		$this->taxAmount = $taxAmount;
		return $this;
	}

	public function setDiscountType($discountType)
	{
		$this->discountType = $discountType;
		return $this;
	}

	public function setDiscountCode($discountCode)
	{
		$this->discountCode = $discountCode;
		return $this;
	}

	public function setDiscountName($discountName)
	{
		$this->discountName = $discountName;
		return $this;
	}

	public function setAccountDiscountAmount($accountDiscountAmount)
	{
		$this->accountDiscountAmount = $accountDiscountAmount;
		return $this;
	}

	public function setAccountDiscountType($accountDiscountType)
	{
		$this->accountDiscountType = $accountDiscountType;
		return $this;
	}

	public function setAccountDiscountCode($accountDiscountCode)
	{
		$this->accountDiscountCode = $accountDiscountCode;
		return $this;
	}

	public function setAccountDiscountName($accountDiscountName)
	{
		$this->accountDiscountName = $accountDiscountName;
		return $this;
	}

	public function setTotalDiscountAmount($totalDiscountAmount)
	{
		$this->totalDiscountAmount = $totalDiscountAmount;
		return $this;
	}

	public function setSku($sku)
	{
		$this->sku = $sku;
		return $this;
	}

	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	public function setStatisticGroup($statisticGroup)
	{
		$this->statisticGroup = $statisticGroup;
		return $this;
	}

	public function setTaxRatePercentage($taxRatePercentage)
	{
		$this->taxRatePercentage = $taxRatePercentage;
		return $this;
	}

	public function setAccountingGroup(AccountingGroup $accountingGroup)
	{
		$this->accountingGroup = $accountingGroup;
		return $this;
	}

	public function setCurrency($currency)
	{
		$this->currency = $currency;
		return $this;
	}

	public function setTags($tags)
	{
		$this->tags = $tags;
		return $this;
	}

	public function setQuantity($quantity)
	{
		$this->quantity = $quantity;
		return $this;
	}

	public function setRevenueCenter($revenueCenter)
	{
		$this->revenueCenter = $revenueCenter;
		return $this;
	}

	public function setRevenueCenterId($revenueCenterId)
	{
		$this->revenueCenterId = $revenueCenterId;
		return $this;
	}

	public function setCategories(array $categories)
	{
		$this->categories = $categories;
		return $this;
	}

	public function setTimeOfSale($timeOfSale)
	{
		$this->timeOfSale = $timeOfSale;
		return $this;
	}

	public function setStaffId($staffId)
	{
		$this->staffId = $staffId;
		return $this;
	}

	public function setStaffName($staffName)
	{
		$this->staffName = $staffName;
		return $this;
	}

	public function setDeviceId($deviceId)
	{
		$this->deviceId = $deviceId;
		return $this;
	}

	public function setDeviceName($deviceName)
	{
		$this->deviceName = $deviceName;
		return $this;
	}

	public function setVoidReason($voidReason)
	{
		$this->voidReason = $voidReason;
		return $this;
	}

	public function setAccountProfileCode($accountProfileCode)
	{
		$this->accountProfileCode = $accountProfileCode;
		return $this;
	}

}