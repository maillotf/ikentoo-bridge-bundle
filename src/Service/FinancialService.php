<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Service;

use MaillotF\Ikentoo\IkentooBridgeBundle\Helpers\CastHelper;
use MaillotF\Ikentoo\IkentooBridgeBundle\Helpers\ClientHelper;
use MaillotF\Ikentoo\IkentooBridgeBundle\Manager\ManagerInterface;
use MaillotF\Ikentoo\IkentooBridgeBundle\Objects\Financial;

/**
 * Description of FinancialService
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Service
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class FinancialService implements FinancialInterface
{

	/**
	 *
	 * @var ManagerInterface
	 */
	private $manager = null;

	public function __construct(ManagerInterface $manager)
	{
		$this->manager = clone($manager);
		$config = $this->manager
				->constructEndpoint('f')
				->getConfig();
		$this->manager->setClient(ClientHelper::constructAndGetOAuthClient($config));
	}

	/**
	 * Lookup accounting groups of a business location.
	 * 
	 * Match with https://console.ikentoo.com/items/groups
	 * @param int $businessLocationId
	 * @return AccountingGroup[]|null
	 * @author Flavien Maillot 
	 */
	public function getItemsGroups(int $businessLocationId): ?array
	{
		$response = $this->manager->get('finance/' . $businessLocationId . '/accountingGroups');
		if ($this->manager->getResponseClient()->getStatusCode() == 200)
		{
			$rawAccountingGroupList = $response->getResponseDecoded()['_embedded']['accountingGroupList'];
			$accountingGroupList = array();
			foreach ($rawAccountingGroupList as $accountingGroup)
			{
				$accountingGroupList[] = CastHelper::cast((object) $accountingGroup, 'AccountingGroup');
			}
			return ($accountingGroupList);
		}
		return (null);
	}

	/**
	 * Get the financial data for the business day (or for the given date).
	 * 
	 * Match with https://console.ikentoo.com/receipt/transactions
	 * @param int $businessLocationId
	 * @param array $include (V3 only) Possible values are: staff, table, consumer, revenue_center, account_profile, payment_authorization.
	 * @param \DateTime $date The date concerned (not required, by default this is the current date). ISO Date Format yyyy-MM-dd, e.g. "2000-10-31".
	 * @return array|null
	 * {
	  "accountReference" : "0c901700-b964-11e7-8b58-13be377c10re",
	  "accountFiscId" : "A4275.9",
	  "source" : {
	  "initialAccountId" : "A4275.3",
	  "previousAccountId" : "A4275.3"
	  },
	  "salesLines" : [ {
	  "totalNetAmountWithTax" : "5.50",
	  "menuListPrice" : "5.50",
	  "serviceCharge" : "0.50",
	  "serviceChargeRate" : "10.00",
	  "taxAmount" : "4.6296",
	  "sku" : "SKU-BEER",
	  "name" : "beer",
	  "quantity" : "1.000",
	  "taxRatePercentage" : "1.08",
	  "accountingGroup" : {
	  "accountingGroupId" : 123,
	  "name" : "DRINKS",
	  "code" : "1200"
	  },
	  "currency" : "CHF",
	  "revenueCenter" : "Poste fixe",
	  "revenueCenterId" : 123456,
	  "categories" : [ {
	  "category" : "default",
	  "value" : "Boissons"
	  } ]
	  } ],
	  "payments" : [ {
	  "code" : "AMEX",
	  "description" : "American Express",
	  "netAmountWithTax" : "5.50",
	  "currency" : "CHF",
	  "tip" : "1.00",
	  "consumer" : {
	  "id" : "b3854d5a-ea22-44fd-b822-017cdfc83f07",
	  "title" : "Sir",
	  "firstName" : "John",
	  "lastName" : "Doe",
	  "phoneNumber1" : "0041 22 700 45 45",
	  "phoneNumber2" : "078 123 45 67",
	  "companyName" : "iKentoo",
	  "addressLine1" : "Route des Jeunes 5",
	  "zipCode" : "1227",
	  "city" : "Les Acacias",
	  "email" : "johnDoe@iKentoo.com"
	  },
	  "type" : "NORMAL",
	  "revenueCenter" : "Poste fixe",
	  "revenueCenterId" : 123456
	  } ],
	  "timeOfOpening" : "2020-01-14T14:30:00+02:00",
	  "timeOfCloseAndPaid" : "2020-01-14T14:35:00+02:00",
	  "type" : "SALE",
	  "externalReferences" : [ "RESA-XX:some-external-id" ],
	  "nbCovers" : 6.0,
	  "dineIn" : true
	  }
	 * @author Flavien Maillot 
	 */
	public function getReceiptTransactions(int $businessLocationId, ?array $include = [], ?\DateTime $date = null): ?Financial
	{
		$isParams = false;
		$params = '?';
		if (!empty($include))
		{
			$isParams = true;
			$params .= 'include=' . implode(',', $include);
		}
		if ($date != null)
		{
			if ($isParams == true)
				$params .= '&';
			$params .= 'date=' . $date->format('Y-m-d');
		}

		$response = $this->manager->get('finance/' . $businessLocationId . '/dailyFinancials' . $params);
		if ($this->manager->getResponseClient()->getStatusCode() == 200)
		{
			$dailyFinancial = CastHelper::cast((object) $response->getResponseDecoded(), 'Financial');
			return ($dailyFinancial);
		}
		return (null);
	}

	/**
	 * Get financial for a given time range.
	 * 
	 * Match with https://console.ikentoo.com/receipt/transactions
	 * @param int $businessLocationId
	 * @param array $include (V3 only) Possible values are: staff, table, consumer, revenue_center, account_profile, payment_authorization.
	 * @param \DateTime $date The date concerned (not required, by default this is the current date). ISO Date Format yyyy-MM-dd, e.g. "2000-10-31".
	 * @return array|null
	 * {
	  "businessName" : "My business location",
	  "businessLocationId" : 1234567,
	  "sales" : [ {
	  "accountReference" : "0c901700-b964-11e7-8b58-13be377c10re",
	  "accountFiscId" : "A4275.9",
	  "source" : {
	  "initialAccountId" : "A4275.3",
	  "previousAccountId" : "A4275.3"
	  },
	  "salesLines" : [ {
	  "totalNetAmountWithTax" : "5.50",
	  "menuListPrice" : "5.50",
	  "serviceCharge" : "0.50",
	  "serviceChargeRate" : "10.00",
	  "taxAmount" : "4.6296",
	  "sku" : "SKU-BEER",
	  "name" : "beer",
	  "quantity" : "1.000",
	  "taxRatePercentage" : "1.08",
	  "accountingGroup" : {
	  "accountingGroupId" : 123,
	  "name" : "DRINKS",
	  "code" : "1200"
	  },
	  "currency" : "CHF",
	  "revenueCenter" : "Poste fixe",
	  "revenueCenterId" : 123456,
	  "categories" : [ {
	  "category" : "default",
	  "value" : "Boissons"
	  } ]
	  } ],
	  "payments" : [ {
	  "code" : "AMEX",
	  "description" : "American Express",
	  "netAmountWithTax" : "5.50",
	  "currency" : "CHF",
	  "tip" : "1.00",
	  "consumer" : {
	  "id" : "b3854d5a-ea22-44fd-b822-017cdfc83f07",
	  "title" : "Sir",
	  "firstName" : "John",
	  "lastName" : "Doe",
	  "phoneNumber1" : "0041 22 700 45 45",
	  "phoneNumber2" : "078 123 45 67",
	  "companyName" : "iKentoo",
	  "addressLine1" : "Route des Jeunes 5",
	  "zipCode" : "1227",
	  "city" : "Les Acacias",
	  "email" : "johnDoe@iKentoo.com"
	  },
	  "type" : "NORMAL",
	  "revenueCenter" : "Poste fixe",
	  "revenueCenterId" : 123456
	  } ],
	  "timeOfOpening" : "2020-01-14T14:30:00+02:00",
	  "timeOfCloseAndPaid" : "2020-01-14T14:35:00+02:00",
	  "type" : "SALE",
	  "externalReferences" : [ "RESA-XX:some-external-id" ],
	  "nbCovers" : 6.0,
	  "dineIn" : true
	  }, {
	  "accountReference" : "0c901700-b964-11e7-8b58-13be377c10re",
	  "accountFiscId" : "A4275.9",
	  "source" : {
	  "initialAccountId" : "A4275.3",
	  "previousAccountId" : "A4275.3"
	  },
	  "salesLines" : [ {
	  "totalNetAmountWithTax" : "5.50",
	  "menuListPrice" : "5.50",
	  "serviceCharge" : "0.50",
	  "serviceChargeRate" : "10.00",
	  "taxAmount" : "4.6296",
	  "sku" : "SKU-BEER",
	  "name" : "beer",
	  "quantity" : "1.000",
	  "taxRatePercentage" : "1.08",
	  "accountingGroup" : {
	  "accountingGroupId" : 123,
	  "name" : "DRINKS",
	  "code" : "1200"
	  },
	  "currency" : "CHF",
	  "revenueCenter" : "Poste fixe",
	  "revenueCenterId" : 123456,
	  "categories" : [ {
	  "category" : "default",
	  "value" : "Boissons"
	  } ]
	  } ],
	  "payments" : [ {
	  "code" : "AMEX",
	  "description" : "American Express",
	  "netAmountWithTax" : "5.50",
	  "currency" : "CHF",
	  "tip" : "1.00",
	  "consumer" : {
	  "id" : "b3854d5a-ea22-44fd-b822-017cdfc83f07",
	  "title" : "Sir",
	  "firstName" : "John",
	  "lastName" : "Doe",
	  "phoneNumber1" : "0041 22 700 45 45",
	  "phoneNumber2" : "078 123 45 67",
	  "companyName" : "iKentoo",
	  "addressLine1" : "Route des Jeunes 5",
	  "zipCode" : "1227",
	  "city" : "Les Acacias",
	  "email" : "johnDoe@iKentoo.com"
	  },
	  "type" : "NORMAL",
	  "revenueCenter" : "Poste fixe",
	  "revenueCenterId" : 123456
	  } ],
	  "timeOfOpening" : "2020-01-14T14:30:00+02:00",
	  "timeOfCloseAndPaid" : "2020-01-14T14:35:00+02:00",
	  "type" : "SALE",
	  "externalReferences" : [ ],
	  "nbCovers" : 6.0,
	  "dineIn" : false
	  } ],
	  "dataComplete" : true,
	  "nextPageToken" : "",
	  "_links" : {
	  "self" : {
	  "href" : "https://apiBaseEndpoint/finance/1234567/financials/2019-07-11T14:00:00+02:00/2019-07-11T15:30:00+02:00?include=payments&pageSize=1000&nextPageToken="
	  }
	  }
	  }
	 * @author Flavien Maillot 
	 */
	public function getReceiptTransactionsRange(int $businessLocationId, \DateTime $from, \DateTime $to, ?array $include = [], ?int $pageSize = 1000, ?string $nextPageToken = ''): ?Financial
	{
		$isParams = false;
		$params = '?';
		if (!empty($include))
		{
			$isParams = true;
			$params .= 'include=' . implode(',', $include);
		}
		if ($pageSize != 1000)
		{
			if ($isParams == true)
				$params .= '&';
			$params .= 'pageSize=' . $pageSize;
		}
		if ($nextPageToken != '')
		{
			if ($isParams == true)
				$params .= '&';
			$params .= 'nextPageToken=' . $nextPageToken;
		}

		$result = $this->manager->get('finance/' . $businessLocationId . '/financials/' . $from->format('c') . '/' . $to->format('c') . $params);
		if ($this->manager->getResponseClient()->getStatusCode() == 200)
		{
			$dailyFinancial = CastHelper::cast((object) $result->getResponseDecoded(), 'Financial');
			return ($dailyFinancial);
		}
		return (null);
	}

	/**
	 * Get the aggregated sales for the business day (or for the given date) with different levels (one or several) of aggregations. Aggregations are done in the order of the groupBy keywords. A time range can be asked with the parameters from and to, it can not be combined with date.
	 * 
	 * Match with https://console.ikentoo.com/business/index
	 * @param int $businessLocationId
	 * @param array $groupBy List (comma separated) of aggregators: staff, device, deviceId, tag, accountingGroup, statisticGroup, hour, sku OR a category in the format of 'category:%group%'.
	  Size must be between 3 and 2147483647 inclusive.
	 * @param bool|null $flattened
	 * @param \DateTime|null $from
	 * @param \DateTime|null $to
	 * @return array
	 * {
	  "totalAmount" : "131.25",
	  "serviceCharge" : "17.25",
	  "totalDiscountedAmount" : "0.00",
	  "totalTaxAmount" : "9.38",
	  "numberOfSales" : 13.0,
	  "children" : [ {
	  "groupByKey" : "staff",
	  "children" : [ {
	  "groupByValue" : "Arnaud",
	  "totalAmount" : "131.25",
	  "serviceCharge" : "17.25",
	  "totalDiscountedAmount" : "0.00",
	  "totalTaxAmount" : "9.38",
	  "numberOfSales" : 13.0,
	  "children" : [ {
	  "groupByKey" : "device",
	  "children" : [ {
	  "groupByValue" : "iPad29",
	  "totalAmount" : "131.25",
	  "serviceCharge" : "17.25",
	  "totalDiscountedAmount" : "0.00",
	  "totalTaxAmount" : "9.38",
	  "numberOfSales" : 13.0,
	  "children" : [ {
	  "groupByKey" : "accountingGroup",
	  "children" : [ {
	  "groupByValue" : "Cuisine",
	  "totalAmount" : "104.80",
	  "serviceCharge" : "13.80",
	  "totalDiscountedAmount" : "0.00",
	  "totalTaxAmount" : "7.49",
	  "numberOfSales" : 8.0
	  }, {
	  "groupByValue" : "Boissons",
	  "totalAmount" : "26.45",
	  "serviceCharge" : "3.45",
	  "totalDiscountedAmount" : "0.00",
	  "totalTaxAmount" : "1.89",
	  "numberOfSales" : 5.0
	  } ]
	  } ]
	  } ]
	  } ]
	  } ]
	  } ],
	  "dataComplete" : true,
	  "businessName" : "iKentoo test"
	  }
	 * @author Flavien Maillot 
	 */
	public function getReceiptTransactionsAggregated(int $businessLocationId, array $groupBy, ?bool $flattened = false, ?\DateTime $date = null, ?\DateTime $from = null, ?\DateTime $to = null): ?array
	{
		$isParams = false;
		$params = '?';
		if (!empty($groupBy))
		{
			$isParams = true;
			$params .= 'groupBy=' . implode(',', $groupBy);
		}
		if ($flattened != false)
		{
			if ($isParams == true)
				$params .= '&';
			$params .= 'flattened=true';
		}
		if ($date != null)
		{
			if ($isParams == true)
				$params .= '&';
			$params .= 'date=' . $date->format('Y-m-d');
		}
		if ($from != null)
		{
			if ($isParams == true)
				$params .= '&';
			$params .= 'from=' . $from->format('c');
		}
		if ($to != null)
		{
			if ($isParams == true)
				$params .= '&';
			$params .= 'to=' . $to->format('c');
		}
		$result = $this->manager->get('finance/' . $businessLocationId . '/aggregatedSales/' . $params);
		if ($this->manager->getResponseClient()->getStatusCode() == 200)
		{
			return ($result->getResponseDecoded());
		}
		return (null);
	}

	/**
	 * Get a single sale detail by external reference.
	 * 
	 * @param int $businessLocationId
	 * @param string $externalReferenceId
	 * @return array
	 * {
	  "accountReference" : "0c901700-b964-11e7-8b58-13be377c10re",
	  "accountFiscId" : "A4275.9",
	  "source" : {
	  "initialAccountId" : "A4275.3",
	  "previousAccountId" : "A4275.3"
	  },
	  "salesLines" : [ {
	  "totalNetAmountWithTax" : "5.50",
	  "menuListPrice" : "5.50",
	  "serviceCharge" : "0.50",
	  "serviceChargeRate" : "10.00",
	  "taxAmount" : "4.6296",
	  "sku" : "SKU-BEER",
	  "name" : "beer",
	  "quantity" : "1.000",
	  "taxRatePercentage" : "1.08",
	  "accountingGroup" : {
	  "accountingGroupId" : 123,
	  "name" : "DRINKS",
	  "code" : "1200"
	  },
	  "currency" : "CHF",
	  "revenueCenter" : "Poste fixe",
	  "revenueCenterId" : 123456,
	  "categories" : [ {
	  "category" : "default",
	  "value" : "Boissons"
	  } ]
	  } ],
	  "payments" : [ {
	  "code" : "AMEX",
	  "description" : "American Express",
	  "netAmountWithTax" : "5.50",
	  "currency" : "CHF",
	  "tip" : "1.00",
	  "consumer" : {
	  "id" : "b3854d5a-ea22-44fd-b822-017cdfc83f07",
	  "title" : "Sir",
	  "firstName" : "John",
	  "lastName" : "Doe",
	  "phoneNumber1" : "0041 22 700 45 45",
	  "phoneNumber2" : "078 123 45 67",
	  "companyName" : "iKentoo",
	  "addressLine1" : "Route des Jeunes 5",
	  "zipCode" : "1227",
	  "city" : "Les Acacias",
	  "email" : "johnDoe@iKentoo.com"
	  },
	  "type" : "NORMAL",
	  "revenueCenter" : "Poste fixe",
	  "revenueCenterId" : 123456
	  } ],
	  "timeOfOpening" : "2020-01-14T14:30:00+02:00",
	  "timeOfCloseAndPaid" : "2020-01-14T14:35:00+02:00",
	  "type" : "SALE",
	  "externalReferences" : [ "RESA-XX:some-external-id" ],
	  "nbCovers" : 6.0,
	  "dineIn" : true
	  }
	 * @author Flavien Maillot 
	 */
	public function getSaleByExternalReferenceID(int $businessLocationId, string $externalReferenceId): ?array
	{
		$result = $this->manager->get($this->endpoint . 'finance/' . $businessLocationId . '/saleByExternalReference?externalReferenceId=' . $externalReferenceId);
		if ($this->manager->getResponseClient()->getStatusCode() == 200)
		{
			return ($result->getResponseDecoded());
		}
		return (null);
	}

}
