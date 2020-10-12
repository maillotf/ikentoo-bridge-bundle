<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Manager;

/**
 * Description of Config
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Manager
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Config implements ConfigInterface
{
	
	private $protocol;
	
	private $host;
	
	private $port;
	
	private $token;
	
	private $endpoint;

	public function __construct(
			string $protocol,
			string $host,
			string $port,
			string $token
			)
	{
		$this->setProtocol($protocol)
				->setHost($host)
				->setPort($port)
				->setToken($token)
				;
	}

	/**
	 * 
	 * @param string $protocol
	 * @return \MaillotF\Ikentoo\IkentooBridgeBundle\Manager\ConfigInterface
	 * @author Flavien Maillot 
	 */
	public function setProtocol(string $protocol): ConfigInterface
	{
		$this->protocol = $protocol;
		return ($this);
	}
	
	/**
	 * 
	 * @return string
	 * @author Flavien Maillot 
	 */
	public function getProtocol(): string
	{
		return ($this->protocol);
	}
	
	/**
	 * 
	 * @param string $host
	 * @return \MaillotF\Ikentoo\IkentooBridgeBundle\Manager\ConfigInterface
	 * @author Flavien Maillot 
	 */
	public function setHost(string $host): ConfigInterface
	{
		$this->host = $host;
		return ($this);
	}
	
	/**
	 * 
	 * @return string
	 * @author Flavien Maillot 
	 */
	public function getHost(): string
	{
		return ($this->host);
	}
	
	/**
	 * 
	 * @param int $port
	 * @return \MaillotF\Ikentoo\IkentooBridgeBundle\Manager\ConfigInterface
	 * @author Flavien Maillot 
	 */
	public function setPort(int $port): ConfigInterface
	{
		$this->port = $port;
		return ($this);
	}
	
	/**
	 * 
	 * @return int
	 * @author Flavien Maillot 
	 */
	public function getPort():int
	{
		return $this->port;
	}
	
	/**
	 * 
	 * @param string $token
	 * @return \MaillotF\Ikentoo\IkentooBridgeBundle\Manager\ConfigInterface
	 * @author Flavien Maillot 
	 */
	public function setToken(string $token): ConfigInterface
	{
		$this->token = $token;
		return ($this);
	}
	
	/**
	 * 
	 * @return string|null
	 * @author Flavien Maillot 
	 */
	public function getToken(): ?string
	{
		return ($this->token);
	}
	
	/**
	 * 
	 * @return string
	 * @author Flavien Maillot 
	 */
	public function getBaseURL(): string
	{
		return $this->getProtocol() . '://' . $this->getHost() . ':' . $this->getPort();
	}
	
	/**
	 * 
	 * @param string $endpath
	 * @return \MaillotF\Ikentoo\IkentooBridgeBundle\Manager\ConfigInterface
	 * @author Flavien Maillot 
	 */
	public function constructEndpoint(string $endpath): ConfigInterface
	{
		$this->endpoint = $this->getBaseURL() . '/' . $endpath;
		return ($this);
	}
	
	/**
	 * 
	 * @return string|null
	 * @author Flavien Maillot 
	 */
	public function getEndpoint(): ?string
	{
		return ($this->endpoint);
	}
}
