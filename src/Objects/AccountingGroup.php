<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Objects;

/**
 * Description of AccountingGroup
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class AccountingGroup extends IkentooObject
{

	/**
	 * @var float
	 */
	private $accountingGroupId;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $statisticGroup;

	/**
	 * @var string
	 */
	private $code;

	public function setAccountingGroupId(float $accountingGroupId): AccountingGroup
	{
		$this->accountingGroupId = $accountingGroupId;
		return ($this);
	}

	public function getAccountingGroupId(): float
	{
		return ($this->accountingGroupId);
	}

	public function setName(string $name): AccountingGroup
	{
		$this->name = $name;
		return ($this);
	}

	public function getName(): string
	{
		return ($this->name);
	}

	public function setStatisticGroup(string $statisticGroup): AccountingGroup
	{
		$this->statisticGroup = $statisticGroup;
		return ($this);
	}

	public function getStatisticGroup(): string
	{
		return ($this->statisticGroup);
	}

	public function setCode(string $code): AccountingGroup
	{
		$this->code = $code;
		return ($this);
	}

	public function getCode(): string
	{
		return ($this->code);
	}

}
