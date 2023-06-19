<?php
namespace Drupal\slider_block\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;
use Drupal\Core\Url;
/**
 * Provides 'Slider Block'.
 * @Block(
 *  id = "slider_block",
 *  admin_label = @Translation("Slider Block"),
 * )
*/
class SliderBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();
    $form['slider_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Slider Name'),
      '#description' => t('Enter Slider Name'),
      '#default_value' => isset($config['slider_name']) ? $config['slider_name'] : '',
    );
    $form['subtitle'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Slider Sub Details'),
      '#description' => t('Enter Slider Sub Details.'),
      '#default_value' => isset($config['subtitle']) ? $config['subtitle'] : '',
    );
    $form['image'] = array(
      '#type' => 'managed_file',
      '#name' => 'files[]',
      '#required' => TRUE,
      '#upload_location' => 'public://images/',
      '#title' => $this->t('Slider Image'),
      '#description' => t("Image to show on slider"),
      '#multiple' => TRUE,
      '#upload_validators' => array(
        'file_validate_extensions' => array('gif png jpg jpeg'),
        'file_validate_size' => array(25600000),
      ),
      '#default_value' => isset($config['image']) ? $config['image'] : '',
    );
     return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue('slider_name', $form_state->getValue('slider_name'));
    $this->setConfigurationValue('subtitle', $form_state->getValue(['subtitle']));
    foreach ($form_state->getValue(['image']) as $key => $values) {
      $file = \Drupal\file\Entity\File::load($values);
      $file->setPermanent();
      $file->save();
    }
    $this->setConfigurationValue('image', $form_state->getValue(['image']));
  }
  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    $image_url = [];
    foreach ($config['image'] as $key => $value) {
       $file = \Drupal\file\Entity\File::load($value);
       $path = $file->getFileUri();
       $image_url[] = file_create_url($path);
    }
    return array(
      '#theme' => 'slider-block',
      '#slider_name' => isset($config['slider_name']) ? $config['slider_name'] : '',
      '#subtitle' => isset($config['subtitle']) ? $config['subtitle'] : '',
      '#image_url' => isset($config['image']) ? $image_url : '',
      '#attached' => [
        'library' => [
          'slider_block/slider-data',
        ],
      ],
    );
  }
}