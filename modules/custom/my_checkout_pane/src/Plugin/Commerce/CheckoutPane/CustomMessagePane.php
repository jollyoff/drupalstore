<?php

namespace Drupal\my_checkout_pane\Plugin\Commerce\CheckoutPane;

use Drupal\commerce_checkout\Plugin\Commerce\CheckoutPane\CheckoutPaneBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a custom message pane.
 *
 * @CommerceCheckoutPane(
 *   id = "my_checkout_pane_custom_message",
 *   label = @Translation("Custom message"),
 *   display_label = @Translation("Another display label"),
 *   default_step = "_sidebar",
 *   wrapper_element = "fieldset",
 * )
 */
class CustomMessagePane extends CheckoutPaneBase {

  /**
   * {@inheritdoc}
   */
  public function buildPaneForm(array $pane_form, FormStateInterface $form_state, array &$complete_form) {
    $pane_form['message'] = [
      '#markup' => $this->t('@custom_message', ['@custom_message' => $this->configuration['custom_message']]),
    ];
    $pane_form['comment'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Optional order comment'),
      '#size' => 60,
    ];
    return $pane_form;
  }

  public function submitPaneForm(array &$pane_form, FormStateInterface $form_state, array &$complete_form) {
    $values = $form_state->getValue($pane_form['#parents']);
    $this->order->setData('order_comment', $values['comment']);
  }

  public function defaultConfiguration() {
    return [
        'custom_message' => 'This is my custom message.',
      ] + parent::defaultConfiguration();
  }

  public function buildConfigurationSummary() {
    return $this->t('Custom message: @custom_message', ['@custom_message' => $this->configuration['custom_message']]);
  }

  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);
    $form['custom_message'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Custom message'),
      '#default_value' => $this->configuration['custom_message'],
    ];

    return $form;
  }

  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);

    if (!$form_state->getErrors()) {
      $values = $form_state->getValue($form['#parents']);
      $this->configuration['custom_message'] = $values['custom_message'];
    }
  }
}
