<?php
/*
 * This file is part of the App Search Magento module.
 *
 * (c) Elastic
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elastic\AppSearch\Framework\AppSearch\SearchAdapter\RequestExecutor\Facet\Dynamic;

/**
 * Process dynamic range facets.
 *
 * @package   Elastic\AppSearch\Framework\AppSearch\SearchAdapter\RequestExecutor\Facet\Dynamic
 * @copyright 2019 Elastic
 * @license   Open Software License ("OSL") v. 3.0
 */
interface AlgorithmInterface
{
    /**
     * Take original facet values and apply algorithm to them.
     *
     * @param array $data
     *
     * @return array
     */
    public function getRanges(array $data): array;
}
