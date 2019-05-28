<?php
/*
 * This file is part of the App Search Magento module.
 *
 * (c) Elastic
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elastic\AppSearch\SearchAdapter\Request\Analytics;

use Elastic\AppSearch\SearchAdapter\Request\SearchParamsProviderInterface;
use Magento\Framework\Search\RequestInterface;

/**
 * Set analytics tags for the search request.
 *
 * @package   Elastic\AppSearch\SearchAdapter\Request\Analytics
 * @copyright 2019 Elastic
 * @license   Open Software License ("OSL") v. 3.0
 */
class SearchParamsProvider implements SearchParamsProviderInterface
{
    /**
     * @var string
     */
    const ANALYTICS_PARAM_NAME = 'analytics';

    /**
     * @var string
     */
    const TAGS_PARAM_NAME = 'tags';

    /**
     * {@inheritDoc}
     */
    public function getParams(RequestInterface $request): array
    {
        return [self::ANALYTICS_PARAM_NAME => [self::TAGS_PARAM_NAME => [$request->getName()]]];
    }
}
