<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Manager;

use GuzzleHttp\Psr7;

/**
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
interface ManagerInterface
{

	public function setClient(\GuzzleHttp\ClientInterface $client): ManagerInterface;

	public function getClient(): ?\Psr\Http\Client\ClientInterface;

	public function constructEndpoint(string $endpath): ManagerInterface;

	public function setConfig(ConfigInterface $config): ManagerInterface;

	public function getConfig(): ConfigInterface;

	public function get(string $path, bool $strict = true): ManagerInterface;

	public function post(string $path, $datas, bool $strict = true): ManagerInterface;

	public function getReasonPhrase(): string;

	public function getStatusCode(): int;

	public function getResponseHeader(): array;

	public function getResponse();

	public function getResponseClient(): Psr7\Response;

	public function getResponseDecoded();
}
