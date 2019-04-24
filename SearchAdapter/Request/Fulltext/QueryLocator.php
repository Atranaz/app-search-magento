<?php
/*
 * This file is part of the App Search Magento module.
 *
 * (c) Elastic
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elastic\AppSearch\SearchAdapter\Request\Fulltext;

use Magento\Framework\Search\RequestInterface;
use Magento\Framework\Search\Request\QueryInterface;

/**
 * Fulltext search query locator implementation.
 *
 * @package   Elastic\AppSearch\SearchAdapter\Request\Fulltext
 * @copyright 2019 Elastic
 * @license   Open Software License ("OSL") v. 3.0
 */
class QueryLocator implements QueryLocatorInterface
{
    /**
     * @var string
     */
    private const FULLTEXT_QUERY_NAME = "search";

    /**
     * {@inheritDoc}
     */
    public function getQuery(RequestInterface $request): ?QueryInterface
    {
        return $request->getQuery() ? $this->extractQuery($request->getQuery()) : null;
    }

    /**
     * Extract the fulltext query from a parent query.
     *
     * @param QueryInterface $query
     *
     * @return QueryInterface|NULL
     */
    private function extractQuery(QueryInterface $query): ?QueryInterface
    {
        $searchQuery = null;

        if ($query->getType() == QueryInterface::TYPE_BOOL) {
            $queries = array_merge($query->getMust(), $query->getShould());
            $searchQuery = current(array_filter(array_map([$this, 'extractQuery'], $queries))) ?: null;
        } elseif ($query->getType() == QueryInterface::TYPE_MATCH && $query->getName() == self::FULLTEXT_QUERY_NAME) {
            $searchQuery = $query;
        }

        return $searchQuery;
    }
}
