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

namespace Mageplaza\SaveCartGraphQl\Model\Resolver\Mutation;

use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlAlreadyExistsException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\SaveCart\Helper\Data;
use Mageplaza\SaveCartGraphQl\Model\Resolver\AbstractSaveCart;
use Mageplaza\SaveCart\Api\SaveProductRepositoryInterface;

/**
 * Class ShareProduct
 * @package Mageplaza\SaveCartGraphQl\Model\Resolver\Mutation
 */
class ShareProduct extends AbstractSaveCart
{
    /**
     * @var SaveProductRepositoryInterface
     */
    private $saveProductRepository;

    /**
     * ShareProduct constructor.
     *
     * @param Data $helperData
     * @param SaveProductRepositoryInterface $saveProductRepository
     */
    public function __construct(
        Data $helperData,
        SaveProductRepositoryInterface $saveProductRepository
    ) {
        $this->saveProductRepository = $saveProductRepository;

        parent::__construct($helperData);
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        parent::resolve($field, $context, $info, $value, $args);
        if (!isset($args['token'])) {
            throw new GraphQlInputException(__('"token" value should be specified'));
        }
        if (!isset($args['cart_id'])) {
            throw new GraphQlInputException(__('"cart_id" value should be specified'));
        }

        try {
            return $this->saveProductRepository->shareGuest($args['cart_id'], $args['token']);
        } catch (InputException $e) {
            throw new GraphQlInputException(__($e->getMessage()));
        } catch (NoSuchEntityException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()));
        } catch (LocalizedException $e) {
            throw new GraphQlAlreadyExistsException(__($e->getMessage()));
        }
    }
}
