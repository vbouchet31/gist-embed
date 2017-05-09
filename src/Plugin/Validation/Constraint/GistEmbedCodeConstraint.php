<?php

namespace Drupal\media_entity_gist_embed\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Check if a value is a valid Gist embed code/URL.
 *
 * @constraint(
 *   id = "GistEmbedCode",
 *   label = @Translation("Gist embed code", context = "Validation"),
 *   type = { "link", "string", "string_long" }
 * )
 */
class GistEmbedCodeConstraint extends Constraint {

  /**
   * The default violation message.
   *
   * @var string
   */
  public $message = 'Not valid Gist URL/Embed code.';

}
