<?php

namespace Drupal\bootstrap_languages\Plugin\Block;

use Drupal\Core\Url;
use Drupal\language\Plugin\Block\LanguageBlock;

/**
 * Provides a 'Bootstrap Languages' block.
 *
 * @Block(
 *  id = "bootstrap_languages",
 *  admin_label = @Translation("Bootstrap Language switcher"),
 *  deriver = "Drupal\bootstrap_languages\Plugin\Derivative\BootstrapLanguagesBlock"
 * )
 */
class BootstrapLanguagesBlock extends LanguageBlock {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $route_name = $this->pathMatcher->isFrontPage() ? '<front>' : '<current>';
    $type = $this->getDerivativeId();
    $links = $this->languageManager->getLanguageSwitchLinks($type, Url::fromRoute($route_name));

    if (isset($links->links)) {
      $build = [
        '#theme' => 'links__bootstrap_language_block',
        '#links' => $links->links,
        '#attributes' => [
          'class' => [
            "language-switcher-{$links->method_id}",
          ],
        ],
        '#set_active_class' => TRUE,
        '#attached' => [
          'library' => [
            'bootstrap_languages/default',
          ],
        ],
      ];
    }
    return $build;
  }

}
