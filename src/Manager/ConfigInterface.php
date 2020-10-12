<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Manager;

/**
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
interface ConfigInterface
{

	public function setProtocol(string $protocol): ConfigInterface;

	public function getProtocol(): string;

	public function setHost(string $host): ConfigInterface;

	public function getHost(): string;

	public function setPort(int $port): ConfigInterface;

	public function getPort(): int;

	public function setToken(string $token): ConfigInterface;

	public function getToken(): ?string;

	public function constructEndpoint(string $endpath): ConfigInterface;

	public function getEndpoint(): ?string;
}
