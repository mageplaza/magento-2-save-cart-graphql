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

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\SaveCart\Helper\Data;
use Mageplaza\SaveCartGraphQl\Model\Resolver\AbstractSaveCart;
use Mageplaza\SaveCart\Api\ConfigManagementInterface;

/**
 * Class Configs
 * @package Mageplaza\SaveCartGraphQl\Model\Resolver\Query
 */
class Configs extends AbstractSaveCart
{
    /**
     * @var ConfigManagementInterface
     */
    private $configManagement;

    /**
     * Configs constructor.
     *
     * @param Data $helperData
     * @param ConfigManagementInterface $configManagement
     */
    public function __construct(Data $helperData, ConfigManagementInterface $configManagement)
    {
        $this->configManagement = $configManagement;
        parent::__construct($helperData);
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        parent::resolve($field, $context, $info, $value, $args);

        return $this->configManagement->get(true);
    }
}
