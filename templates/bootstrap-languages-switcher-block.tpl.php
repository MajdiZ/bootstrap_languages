<?php

/**
 * @file
 * Default theme implementation to display a Bootstrap languages switcher.
 *
 * Markup for Bootstrap languages switcher.
 *
 * Variables:
 * - $btn_type: Bootstrap button css class (btn-default, btn-primary, btn-info).
 * - $default_option: Current default language code.
 * - $languages: array where key => language code and value => language link.
 *
 * @ingroup templates
 */
?>
<div class="btn-group">
  <button class="btn <?php print $btn_type; ?> btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
    <span class="lang-sm" lang="<?php print $default_option; ?>"></span> <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <?php foreach ($languages as $lang_code => $lang_link) : ?>
      <li><a href="<?php print $lang_link?>">
          <span class="lang-sm lang-lbl" lang="<?php print $lang_code; ?>"></span>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
