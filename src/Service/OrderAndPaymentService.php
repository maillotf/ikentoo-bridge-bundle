<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Service;

use MaillotF\Ikentoo\IkentooBridgeBundle\Helpers\CastHelper;
use MaillotF\Ikentoo\IkentooBridgeBundle\Helpers\ClientHelper;
use MaillotF\Ikentoo\IkentooBridgeBundle\Manager\ManagerInterface;
use MaillotF\Ikentoo\IkentooBridgeBundle\Objects\Menu;

/**
 * Description of OrderAndPaymentService
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Service
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class OrderAndPaymentService implements OrderAndPaymentInterface
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
				->constructEndpoint('o')
				->getConfig();
		$this->manager->setClient(ClientHelper::constructAndGetOAuthClient($config));
	}

	/**
	 * Récupère la liste des menus existant
	 * 
	 * Original uri https://console.ikentoo.com/pos/menu
	 * @param int $businessLocationId
	 * @return array
	 * [ {
	  "menuName" : "Carte",
	  "ikentooMenuId" : 1234
	  }, {
	  "menuName" : "Dessert",
	  "ikentooMenuId" : 3456
	  }, {
	  "menuName" : "Drink",
	  "ikentooMenuId" : 4321
	  } ]
	 */
	public function loadMenus(int $businessLocationId): array
	{
		$result = $this->manager->get('op/1/menu/list?businessLocationId=' . $businessLocationId);
		if ($this->manager->getResponseClient()->getStatusCode() == 200)
		{
			return ($result->getResponseDecoded());
		}
		return (null);
	}

	/**
	 * Récupère la liste d'un menu existant
	 * 
	 * Original uri https://console.ikentoo.com/pos/menu
	 * @param int $businessLocationId
	 * @param int $menuId Got From loadMenus
	 * @param bool $richContent Include rich product content in the response.
	 * @return array
	 * {
	  "menuName" : "Demo Menu",
	  "menuEntryGroups" : [ {
	  "@type" : "group",
	  "name" : "Menu Group",
	  "color" : "RED",
	  "menuEntry" : [ {
	  "@type" : "menuItem",
	  "productName" : "Coke",
	  "productPrice" : "5.50",
	  "color" : "RED",
	  "sku" : "SKU1",
	  "asSubItem" : false,
	  "customItemNameEnabled" : false,
	  "pricingStrategy" : "PRICE_CANNOT_BE_CUSTOMIZED",
	  "itemRichData" : {
	  "squareImageUrl" : "https://imageUrl.com",
	  "rawImageUrl" : "https://imageUrl.com/raw",
	  "texts" : [ {
	  "locale" : "en",
	  "friendlyDisplayName" : "Coca cola",
	  "description" : "This is a coca cola"
	  } ],
	  "allergenCodes" : [ "soybeans" ]
	  },
	  "defaultTaxAmount" : "0.44",
	  "taxIncludedInPrice" : true,
	  "type" : "menuItem"
	  }, {
	  "@type" : "menuItem",
	  "productName" : "Beef Patty",
	  "productPrice" : "8.00",
	  "color" : "GREEN",
	  "sku" : "SKUBEE",
	  "asSubItem" : false,
	  "customItemNameEnabled" : false,
	  "pricingStrategy" : "PRICE_CANNOT_BE_CUSTOMIZED",
	  "defaultTaxAmount" : "0.64",
	  "productionInstructionList" : [ {
	  "multiSelectionPermitted" : false,
	  "productionInstructionGroupName" : "Cooking",
	  "productionIntructionGroupId" : 123,
	  "productionInstructionList" : [ {
	  "instruction" : "Well Done",
	  "ikentooModifierId" : 567
	  }, {
	  "instruction" : "Rear",
	  "ikentooModifierId" : 568
	  } ]
	  } ],
	  "taxIncludedInPrice" : true,
	  "type" : "menuItem"
	  } ],
	  "type" : "group"
	  }, {
	  "@type" : "group",
	  "name" : "Menu Group Deal Example",
	  "color" : "BLUE",
	  "menuEntry" : [ {
	  "@type" : "menuDeal",
	  "productName" : "Cheese Burger Deal",
	  "productPrice" : "10.00",
	  "color" : "BROWN",
	  "sku" : "CBD1",
	  "defaultTaxAmount" : "0.80",
	  "menuDealGroups" : [ {
	  "description" : "Drinks",
	  "mustSelectAnItem" : true,
	  "multiSelectionPermitted" : false,
	  "items" : [ {
	  "@type" : "menuItem",
	  "productName" : "Sprite",
	  "productPrice" : "0.00",
	  "color" : "GREEN",
	  "sku" : "SKU1",
	  "asSubItem" : false,
	  "customItemNameEnabled" : false,
	  "defaultTaxAmount" : "0.00",
	  "taxIncludedInPrice" : true,
	  "type" : "menuItem"
	  }, {
	  "@type" : "menuItem",
	  "productName" : "Coke",
	  "productPrice" : "0.00",
	  "color" : "RED",
	  "sku" : "SKU2",
	  "asSubItem" : false,
	  "customItemNameEnabled" : false,
	  "defaultTaxAmount" : "0.00",
	  "taxIncludedInPrice" : true,
	  "type" : "menuItem"
	  } ]
	  } ],
	  "taxIncludedInPrice" : false,
	  "type" : "menuDeal"
	  } ],
	  "type" : "group"
	  } ],
	  "richDataMissing" : false,
	  "ikentooMenuId" : 123
	  }
	 */
	public function loadMenu(int $businessLocationId, int $menuId, bool $richContent = false): ?Menu
	{
		$params = '';
		if ($richContent != false)
		{
			$params .= '&richContent=true';
		}

		$response = $this->manager->get('op/1/menu/load/' . $menuId . '?businessLocationId=' . $businessLocationId . $params);
		if ($this->manager->getResponseClient()->getStatusCode() == 200)
		{
			$menu = CastHelper::cast((object) $response->getResponseDecoded(), 'Menu');
			return ($menu);
		}
		return (null);
	}

}
