<?php

namespace Drupal\my_promotion_offer\Plugin\Commerce\PromotionOffer;

use Drupal\commerce_promotion\Plugin\Commerce\PromotionOffer\OrderPromotionOfferBase;
use Drupal\commerce_order\Entity\OrderInterface;
use Drupal\commerce_promotion\Entity\PromotionInterface;
use Drupal\commerce_promotion\Plugin\Commerce\PromotionOffer\PromotionOfferInterface;
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
class CustomPromotionOffer extends OrderPromotionOfferBase implements PromotionOfferInterface {

  /**
   * {@inheritdoc}
   */
  public function apply(EntityInterface $entity, PromotionInterface $promotion) {
    if ($entity instanceof OrderInterface) {
      // Применить скидку к заказу.
      $discountAmount = 10; // Сумма скидки в валюте заказа.
      $orderTotalSummary = $entity->get('order_total')->first();
      $orderTotalSummary->set('total_price', $orderTotalSummary->get('total_price')->subtract($discountAmount));

      // Сохранить изменения в заказе.
      $entity->save();

      // Добавить сообщение о применении скидки.
      $this->messenger()->addStatus($this->t('Discount applied: @amount', ['@amount' => $discountAmount]));
    }
  }

}

