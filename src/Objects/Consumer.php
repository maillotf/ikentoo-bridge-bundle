<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Objects;

/**
 * Description of Consumer
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Consumer extends IkentooObject
{

	/**
	 * @var string
	 */
	private $id;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var string
	 */
	private $firstName;

	/**
	 * @var string
	 */
	private $lastName;

	/**
	 * @var string
	 */
	private $phoneNumber1;

	/**
	 * @var string
	 */
	private $phoneNumber2;

	/**
	 * @var string
	 */
	private $companyName;

	/**
	 * @var string
	 */
	private $addressLine1;

	/**
	 * @var string
	 */
	private $addressLine2;

	/**
	 * @var int
	 */
	private $zipCode;

	/**
	 * @var string
	 */
	private $city;

	/**
	 * @var string
	 */
	private $email;

	/**
	 * @var string
	 */
	private $taxIdentifier;

	/**
	 * @var string
	 */
	private $fiscalCode;

	/**
	 * @var string
	 */
	private $destinationCode;

	/**
	 * @var string
	 */
	private $state;

	public function getId()
	{
		return $this->id;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getFirstName()
	{
		return $this->firstName;
	}

	public function getLastName()
	{
		return $this->lastName;
	}

	public function getPhoneNumber1()
	{
		return $this->phoneNumber1;
	}

	public function getPhoneNumber2()
	{
		return $this->phoneNumber2;
	}

	public function getCompanyName()
	{
		return $this->companyName;
	}

	public function getAddressLine1()
	{
		return $this->addressLine1;
	}

	public function getAddressLine2()
	{
		return $this->addressLine2;
	}

	public function getZipCode()
	{
		return $this->zipCode;
	}

	public function getCity()
	{
		return $this->city;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getTaxIdentifier()
	{
		return $this->taxIdentifier;
	}

	public function getFiscalCode()
	{
		return $this->fiscalCode;
	}

	public function getDestinationCode()
	{
		return $this->destinationCode;
	}

	public function getState()
	{
		return $this->state;
	}

	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
		return $this;
	}

	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
		return $this;
	}

	public function setPhoneNumber1($phoneNumber1)
	{
		$this->phoneNumber1 = $phoneNumber1;
		return $this;
	}

	public function setPhoneNumber2($phoneNumber2)
	{
		$this->phoneNumber2 = $phoneNumber2;
		return $this;
	}

	public function setCompanyName($companyName)
	{
		$this->companyName = $companyName;
		return $this;
	}

	public function setAddressLine1($addressLine1)
	{
		$this->addressLine1 = $addressLine1;
		return $this;
	}

	public function setAddressLine2($addressLine2)
	{
		$this->addressLine2 = $addressLine2;
		return $this;
	}

	public function setZipCode($zipCode)
	{
		$this->zipCode = $zipCode;
		return $this;
	}

	public function setCity($city)
	{
		$this->city = $city;
		return $this;
	}

	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}

	public function setTaxIdentifier($taxIdentifier)
	{
		$this->taxIdentifier = $taxIdentifier;
		return $this;
	}

	public function setFiscalCode($fiscalCode)
	{
		$this->fiscalCode = $fiscalCode;
		return $this;
	}

	public function setDestinationCode($destinationCode)
	{
		$this->destinationCode = $destinationCode;
		return $this;
	}

	public function setState($state)
	{
		$this->state = $state;
		return $this;
	}

}
