<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Service;

/**
 * Class IkentooService
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Service
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class IkentooService implements IkentooInterface
{

	/**
	 *
	 * @var FinancialInterface
	 */
	public $financial;

	/**
	 *
	 * @var OrderAndPaymentInterface
	 */
	public $orderAndPayment;

	public function __construct(
			FinancialInterface $financial,
			FinancialInterface $orderAndPayment
	)
	{
		$this->financial = $financial;
		$this->orderAndPayment = $orderAndPayment;
	}

	/**
	 * Define another financial service
	 * 
	 * @param \MaillotF\Ikentoo\IkentooBridgeBundle\Service\FinancialInterface $financial
	 * @return type
	 */
	public function setFinancial(FinancialInterface $financial): IkentooInterface
	{
		$this->financial = $financial;
		return ($this);
	}

	/**
	 * Get the current financial service
	 * 
	 * @return \MaillotF\Ikentoo\IkentooBridgeBundle\Service\FinancialInterface
	 * @author Flavien Maillot 
	 */
	public function getFinancial(): FinancialInterface
	{
		return ($this->financial);
	}

	/**
	 * Define another order and payment service
	 * 
	 * @param \MaillotF\Ikentoo\IkentooBridgeBundle\Service\OrderAndPaymentInterface $orderAndPayment
	 * @return type
	 */
	public function setOrderAndPayment(OrderAndPaymentInterface $orderAndPayment): IkentooInterface
	{
		$this->orderAndPayment = $orderAndPayment;
		return ($this);
	}

	/**
	 * Get the current order and payment service
	 * 
	 * @return \MaillotF\Ikentoo\IkentooBridgeBundle\Service\OrderAndPaymentInterface
	 * @author Flavien Maillot 
	 */
	public function getOrderAndPayment(): OrderAndPaymentInterface
	{
		return ($this->orderAndPayment);
	}

}
