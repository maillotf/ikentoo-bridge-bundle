<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Objects;

use MaillotF\Ikentoo\IkentooBridgeBundle\Helpers\CastHelper;

/**
 * Description of DailyFinancial
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class DailyFinancial extends IkentooObject
{

	/**
	 * @var string
	 */
	private $businessName;

	/**
	 * @var string
	 */
	private $nextStartOfDayAsIso8601;

	/**
	 * @var string
	 */
	private $businessLocationId;

	/**
	 * @var Sale[]
	 */
	private $sales;

	/**
	 * @var bool
	 */
	private $dataComplete;

	/**
	 * @var string
	 */
	private $nextPageToken;

	/**
	 * @var Link[]
	 */
	// private $links;

	public function init()
	{
		$sales = array();
		if (!empty($this->sales))
			foreach ($this->sales as $sale)
			{
				$sales[] = CastHelper::cast((object) $sale, 'Sale');
			}
		$this->sales = $sales;
	}

	public function getBusinessName()
	{
		return $this->businessName;
	}

	public function getNextStartOfDayAsIso8601()
	{
		return $this->nextStartOfDayAsIso8601;
	}

	public function getBusinessLocationId()
	{
		return $this->businessLocationId;
	}

	public function getSales(): array
	{
		return $this->sales;
	}

	public function getDataComplete()
	{
		return $this->dataComplete;
	}

	public function getNextPageToken()
	{
		return $this->nextPageToken;
	}

	public function setBusinessName($businessName)
	{
		$this->businessName = $businessName;
		return $this;
	}

	public function setNextStartOfDayAsIso8601($nextStartOfDayAsIso8601)
	{
		$this->nextStartOfDayAsIso8601 = $nextStartOfDayAsIso8601;
		return $this;
	}

	public function setBusinessLocationId($businessLocationId)
	{
		$this->businessLocationId = $businessLocationId;
		return $this;
	}

	public function setSales(array $sales)
	{
		$this->sales = $sales;
		return $this;
	}

	public function setDataComplete($dataComplete)
	{
		$this->dataComplete = $dataComplete;
		return $this;
	}

	public function setNextPageToken($nextPageToken)
	{
		$this->nextPageToken = $nextPageToken;
		return $this;
	}

}
