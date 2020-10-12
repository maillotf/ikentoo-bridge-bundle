<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Helpers;

use GuzzleHttp\Client;
use kamermans\OAuth2\OAuth2Middleware;
use kamermans\OAuth2\GrantType\NullGrantType;
use GuzzleHttp\HandlerStack;
use MaillotF\Ikentoo\IkentooBridgeBundle\Exception\IkentooException;

/**
 * Description of ClientHelper
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Helpers
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class ClientHelper
{

	/**
	 * Construct and return OAuth2 Client
	 * 
	 * @param \MaillotF\Ikentoo\IkentooBridgeBundle\Manager\Config $config
	 * @param bool $verifySSL
	 * @param bool $strict
	 * @return Client|null
	 * @throws PcVueException
	 * @author Flavien Maillot 
	 */
	public static function constructAndGetOAuthClient(\MaillotF\Ikentoo\IkentooBridgeBundle\Manager\Config $config, bool $verifySSL = false, bool $strict = false): ?Client
	{
		$oauth = new OAuth2Middleware(new NullGrantType());
		$oauth->setAccessToken([
			'access_token' => $config->getToken()
		]);

		$stack = HandlerStack::create();
		$stack->push($oauth);

		try
		{
			$client = new Client([
				'handler' => $stack,
				'auth' => 'oauth',
				'verify' => $verifySSL
			]);
			return ($client);
		} catch (ClientException $e)
		{
			if ($strict == true)
				throw new IkentooException($e->getMessage());
		}
		return null;
	}

}
