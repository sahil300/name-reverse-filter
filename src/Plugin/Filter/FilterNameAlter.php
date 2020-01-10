<?php

namespace Drupal\name_alter\Plugin\Filter;

use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;

/**
 * Replaces any instance of the [name:FIRSTNAME:LASTNAME] token.
 *
 * @Filter(
 *   id = "filter_name_alter",
 *   title = @Translation("NameAlter Filter"),
 *   description = @Translation("Replaces any instance of the [name:FIRSTNAME:LASTNAME] token."),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_REVERSIBLE,
 * )
 */
class FilterNameAlter extends FilterBase {

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {

    // Regular Expression which searches for [name:FIRSTNAME:LASTNAME].
    $regex = '/\[name\:(\w+)\:(\w+)\]/';
    $replacement = "Name: " . '$2 $1';
    // $new_text uses the RegEx to replace the [name:FIRSTNAME:LASTNAME] token.
    $new_text = preg_replace($regex, $replacement, $text);

    return new FilterProcessResult($new_text);
  }

}
