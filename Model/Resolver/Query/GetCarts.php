<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_SaveCartGraphQl
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

declare(strict_types=1);

namespace Mageplaza\SaveCartGraphQl\Model\Resolver\Query;

use Magento\CustomerGraphQl\Model\Customer\GetCustomer;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\SaveCart\Helper\Data;
use Mageplaza\SaveCartGraphQl\Model\Resolver\AbstractSaveCartCustomer;
use \Mageplaza\SaveCart\Api\SaveCartRepositoryInterface;
use Magento\Framework\GraphQl\Query\Resolver\Argument\SearchCriteria\Builder as SearchCriteriaBuilder;

/**
 * Class GetCarts
 * @package Mageplaza\SaveCartGraphQl\Model\Resolver\Query
 */
class GetCarts extends AbstractSaveCartCustomer
{
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var SaveCartRepositoryInterface
     */
    private $saveCartRepository;

    /**
     * GetCarts constructor.
     *
     * @param Data $helperData
     * @param GetCustomer $getCustomer
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param SaveCartRepositoryInterface $saveCartRepository
     */
    public function __construct(
        Data $helperData,
        GetCustomer $getCustomer,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SaveCartRepositoryInterface $saveCartRepository
    ) {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->saveCartRepository    = $saveCartRepository;

        parent::__construct($helperData, $getCustomer);
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        parent::resolve($field, $context, $info, $value, $args);

        $customer = $this->getCustomer->execute($context);
        $this->validate($args);
        $searchCriteria = $this->searchCriteriaBuilder->build('mp_save_cart_carts', $args);
        $searchCriteria->setCurrentPage($args['currentPage']);
        $searchCriteria->setPageSize($args['pageSize']);
        $searchResult = $this->saveCartRepository->getList((int)$customer->getId(), $searchCriteria);

        return $this->getResult($searchResult, $args);
    }
}
