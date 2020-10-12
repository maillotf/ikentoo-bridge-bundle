<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Service;

use MaillotF\Ikentoo\IkentooBridgeBundle\Objects\Financial;

/**
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Service
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
interface FinancialInterface
{

	public function getItemsGroups(int $businessLocationId): ?array;

	public function getReceiptTransactions(int $businessLocationId, ?array $include = [], ?\DateTime $date = null): ?Financial;

	public function getReceiptTransactionsRange(int $businessLocationId, \DateTime $from, \DateTime $to, ?array $include = [], ?int $pageSize = 1000, ?string $nextPageToken = ''): ?Financial;

	public function getReceiptTransactionsAggregated(int $businessLocationId, array $groupBy, ?bool $flattened = false, ?\DateTime $date = null, ?\DateTime $from = null, ?\DateTime $to = null): ?array;

	public function getSaleByExternalReferenceID(int $businessLocationId, string $externalReferenceId): ?array;
}
