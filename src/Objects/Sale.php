<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Objects;

use MaillotF\Ikentoo\IkentooBridgeBundle\Helpers\CastHelper;

/**
 * Description of Sale
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Sale extends IkentooObject
{

	/**
	 * @var string
	 */
	private $accountReference;

	/**
	 * @var string
	 */
	private $accountFiscId;

	/**
	 * @var string
	 */
	private $receiptId;

	/**
	 * @var Source
	 */
	private $source;

	/**
	 * @var Sale[]
	 */
	private $salesLines;

	/**
	 * @var Payment[]
	 */
	private $payments;

	/**
	 * @var string
	 */
	private $timeOfOpening;

	/**
	 * @var string
	 */
	private $timeOfCloseAndPaid;

	/**
	 * @var string
	 */
	private $cancelled;

	/**
	 * @var string
	 */
	private $tableNumber;

	/**
	 * @var string
	 */
	private $externalFiscalNumber;

	/**
	 * @var string
	 */
	private $tableName;

	/**
	 * @var string
	 */
	private $accountProfileCode;

	/**
	 * @var string
	 */
	private $ownerName;

	/**
	 * @var int
	 */
	private $ownerId;

	/**
	 * @var string
	 */
	private $type;

	/**
	 * @var array
	 */
	private $externalReferences;

	/**
	 * @var float
	 */
	private $nbCovers;

	/**
	 * @var bool
	 */
	private $dineIn;

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

	public function init()
	{
		$this->source = CastHelper::cast((object) $this->source, 'Source');

		$salesLines = array();
		if (!empty($this->salesLines))
			foreach ($this->salesLines as $salesLine)
			{
				$salesLines[] = CastHelper::cast((object) $salesLine, 'SaleLine');
			}
		$this->salesLines = $salesLines;

		$payments = array();
		if (!empty($this->payments))
			foreach ($this->payments as $payment)
			{
				$payments[] = CastHelper::cast((object) $payment, 'Payment');
			}
		$this->payments = $payments;
	}

	public function getAccountReference()
	{
		return $this->accountReference;
	}

	public function getAccountFiscId()
	{
		return $this->accountFiscId;
	}

	public function getReceiptId()
	{
		return $this->receiptId;
	}

	public function getSource(): Source
	{
		return $this->source;
	}

	public function getSalesLines(): array
	{
		return $this->salesLines;
	}

	public function getPayments(): array
	{
		return $this->payments;
	}

	public function getTimeOfOpening()
	{
		return $this->timeOfOpening;
	}

	public function getTimeOfCloseAndPaid()
	{
		return $this->timeOfCloseAndPaid;
	}

	public function getCancelled()
	{
		return $this->cancelled;
	}

	public function getTableNumber()
	{
		return $this->tableNumber;
	}

	public function getExternalFiscalNumber()
	{
		return $this->externalFiscalNumber;
	}

	public function getTableName()
	{
		return $this->tableName;
	}

	public function getAccountProfileCode()
	{
		return $this->accountProfileCode;
	}

	public function getOwnerName()
	{
		return $this->ownerName;
	}

	public function getOwnerId()
	{
		return $this->ownerId;
	}

	public function getType()
	{
		return $this->type;
	}

	public function getExternalReferences()
	{
		return $this->externalReferences;
	}

	public function getNbCovers()
	{
		return $this->nbCovers;
	}

	public function getDineIn()
	{
		return $this->dineIn;
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

	public function setAccountReference($accountReference)
	{
		$this->accountReference = $accountReference;
		return $this;
	}

	public function setAccountFiscId($accountFiscId)
	{
		$this->accountFiscId = $accountFiscId;
		return $this;
	}

	public function setReceiptId($receiptId)
	{
		$this->receiptId = $receiptId;
		return $this;
	}

	public function setSource(Source $source)
	{
		$this->source = $source;
		return $this;
	}

	public function setSalesLines(array $salesLines)
	{
		$this->salesLines = $salesLines;
		return $this;
	}

	public function setPayments(array $payments)
	{
		$this->payments = $payments;
		return $this;
	}

	public function setTimeOfOpening($timeOfOpening)
	{
		$this->timeOfOpening = $timeOfOpening;
		return $this;
	}

	public function setTimeOfCloseAndPaid($timeOfCloseAndPaid)
	{
		$this->timeOfCloseAndPaid = $timeOfCloseAndPaid;
		return $this;
	}

	public function setCancelled($cancelled)
	{
		$this->cancelled = $cancelled;
		return $this;
	}

	public function setTableNumber($tableNumber)
	{
		$this->tableNumber = $tableNumber;
		return $this;
	}

	public function setExternalFiscalNumber($externalFiscalNumber)
	{
		$this->externalFiscalNumber = $externalFiscalNumber;
		return $this;
	}

	public function setTableName($tableName)
	{
		$this->tableName = $tableName;
		return $this;
	}

	public function setAccountProfileCode($accountProfileCode)
	{
		$this->accountProfileCode = $accountProfileCode;
		return $this;
	}

	public function setOwnerName($ownerName)
	{
		$this->ownerName = $ownerName;
		return $this;
	}

	public function setOwnerId($ownerId)
	{
		$this->ownerId = $ownerId;
		return $this;
	}

	public function setType($type)
	{
		$this->type = $type;
		return $this;
	}

	public function setExternalReferences($externalReferences)
	{
		$this->externalReferences = $externalReferences;
		return $this;
	}

	public function setNbCovers($nbCovers)
	{
		$this->nbCovers = $nbCovers;
		return $this;
	}

	public function setDineIn($dineIn)
	{
		$this->dineIn = $dineIn;
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

}
