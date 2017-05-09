<?php

namespace Drupal\media_entity_gist_embed\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\media_entity\EmbedCodeValueTrait;
use Drupal\media_entity_gist_embed\Plugin\MediaEntity\Type\GistEmbed;

/**
 * Plugin implementation of the 'gist_embed' formatter.
 *
 * @FieldFormatter(
 *   id = "gist_embed",
 *   label = @Translation("Gist embed"),
 *   field_types = {
 *     "link", "string", "string_long"
 *   }
 * )
 */
class GistEmbedFormatter extends FormatterBase {

  use EmbedCodeValueTrait;

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = array();
    foreach ($items as $delta => $item) {
      foreach (GistEmbed::$validationRegexp as $pattern => $key) {
        if (preg_match($pattern, $this->getEmbedCode($item), $matches)) {
          break;
        }
      }

      if (!empty($matches['shortcode'])) {
        $element[$delta] = [
          '#type' => 'markup',
          '#markup' => $matches['shortcode'],
          '#allowed_tags' => ['script'],
        ];
      }
    }
    return $element;
  }

}
