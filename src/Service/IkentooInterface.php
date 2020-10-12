<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Service;

/**
 * 
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Service
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
interface IkentooInterface
{

	public function setFinancial(FinancialInterface $historical): IkentooInterface;

	public function getFinancial(): FinancialInterface;

	public function setOrderAndPayment(OrderAndPaymentInterface $orderAndPayment): IkentooInterface;

	public function getOrderAndPayment(): OrderAndPaymentInterface;
}
