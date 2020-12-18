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
use Mageplaza\SaveCartGraphQl\Model\Resolver\AbstractSaveCartTokenCustomer;
use \Mageplaza\SaveCart\Api\SaveCartRepositoryInterface;

/**
 * Class ViewCarts
 * @package Mageplaza\SaveCartGraphQl\Model\Resolver\Query
 */
class ViewCarts extends AbstractSaveCartTokenCustomer
{
    /**
     * @var SaveCartRepositoryInterface
     */
    private $saveCartRepository;

    /**
     * ViewCarts constructor.
     *
     * @param Data $helperData
     * @param GetCustomer $getCustomer
     * @param SaveCartRepositoryInterface $saveCartRepository
     */
    public function __construct(
        Data $helperData,
        GetCustomer $getCustomer,
        SaveCartRepositoryInterface $saveCartRepository
    ) {
        $this->saveCartRepository = $saveCartRepository;

        parent::__construct($helperData, $getCustomer);
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        parent::resolve($field, $context, $info, $value, $args);
        $customer = $this->getCustomer->execute($context);

        return $this->saveCartRepository->get((int)$customer->getId(), $args['token']);
    }
}
