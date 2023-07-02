<?php

namespace Drupal\my_promotion_offer\Plugin\Commerce\PromotionOffer;

use Drupal\commerce_order\Adjustment;
use Drupal\commerce_promotion\Plugin\Commerce\PromotionOffer\OrderItemPromotionOfferBase;
use Drupal\commerce_promotion\Entity\PromotionInterface;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a custom promotion offer.
 *
 * @CommercePromotionOffer(
 *   id = "my_custom_promotion_offer",
 *   label = @Translation("Custom Promotion Offer"),
 *   entity_type = "commerce_order",
 * )
 */
class CustomPromotionOffer extends OrderItemPromotionOfferBase {

  /**
   * {@inheritdoc}
   */
  public function apply(EntityInterface $entity, PromotionInterface $promotion) {
    $this->assertEntity($entity);
    /** @var \Drupal\commerce_order\Entity\OrderItemInterface $order_item */
    $order_item = $entity;
    $percentage = 0.1; // 10% discount

    $unit_price = $order_item->getUnitPrice();
    $amount = $unit_price->multiply($percentage);
    $amount = $this->rounder->round($amount);

    $new_unit_price = $unit_price->subtract($amount);
    $order_item->setUnitPrice($new_unit_price);
    $adjustment_amount = $amount->multiply($order_item->getQuantity());

    $adjustment_amount = $this->rounder->round($adjustment_amount);

    if ($adjustment_amount->isZero()) {
      return;
    }

    $order_item->addAdjustment(new Adjustment([
      'type' => 'promotion',
      'label' => $promotion->getDisplayName() ?: $this->t('Discount'),
      'amount' => $adjustment_amount->multiply('-1'),
      'percentage' => $percentage,
      'source_id' => $promotion->id(),
      'included' => FALSE,
    ]));
  }

}
