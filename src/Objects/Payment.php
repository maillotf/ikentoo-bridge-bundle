<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Objects;

use MaillotF\Ikentoo\IkentooBridgeBundle\Helpers\CastHelper;

/**
 * Description of Payment
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Payment extends IkentooObject
{

	/**
	 * @var string
	 */
	private $code;

	/**
	 * @var string
	 */
	private $description;

	/**
	 * @var int
	 */
	private $paymentMethodId;

	/**
	 * @var float
	 */
	private $netAmountWithTax;

	/**
	 * @var string
	 */
	private $currency;

	/**
	 * @var float
	 */
	private $tip;

	/**
	 * @var Consumer
	 */
	private $consumer;

	/**
	 * @var string
	 */
	private $type;

	/**
	 * @var int
	 */
	private $deviceId;

	/**
	 * @var string
	 */
	private $deviceName;

	/**
	 * @var int
	 */
	private $staffId;

	/**
	 * @var string
	 */
	private $staffName;

	/**
	 * @var string
	 */
	private $authorization;

	/**
	 * @var string
	 */
	private $revenueCenter;

	/**
	 * @var float
	 */
	private $revenueCenterId;

	public function init()
	{
		$this->consumer = CastHelper::cast((object) $this->consumer, 'Consumer');
	}

	public function getCode()
	{
		return $this->code;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getPaymentMethodId()
	{
		return $this->paymentMethodId;
	}

	public function getNetAmountWithTax()
	{
		return $this->netAmountWithTax;
	}

	public function getCurrency()
	{
		return $this->currency;
	}

	public function getTip()
	{
		return $this->tip;
	}

	public function getConsumer(): Consumer
	{
		return $this->consumer;
	}

	public function getType()
	{
		return $this->type;
	}

	public function getDeviceId()
	{
		return $this->deviceId;
	}

	public function getDeviceName()
	{
		return $this->deviceName;
	}

	public function getStaffId()
	{
		return $this->staffId;
	}

	public function getStaffName()
	{
		return $this->staffName;
	}

	public function getAuthorization()
	{
		return $this->authorization;
	}

	public function getRevenueCenter()
	{
		return $this->revenueCenter;
	}

	public function getRevenueCenterId()
	{
		return $this->revenueCenterId;
	}

	public function setCode($code)
	{
		$this->code = $code;
		return $this;
	}

	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}

	public function setPaymentMethodId($paymentMethodId)
	{
		$this->paymentMethodId = $paymentMethodId;
		return $this;
	}

	public function setNetAmountWithTax($netAmountWithTax)
	{
		$this->netAmountWithTax = $netAmountWithTax;
		return $this;
	}

	public function setCurrency($currency)
	{
		$this->currency = $currency;
		return $this;
	}

	public function setTip($tip)
	{
		$this->tip = $tip;
		return $this;
	}

	public function setConsumer(Consumer $consumer)
	{
		$this->consumer = $consumer;
		return $this;
	}

	public function setType($type)
	{
		$this->type = $type;
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

	public function setAuthorization($authorization)
	{
		$this->authorization = $authorization;
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

}
