<?php

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;

$app = Factory::getApplication();
$wa  = $this->getWebAssetManager();

$wa->usePreset('template.edemtour');

$phone = trim((string) $this->params->get('phone', '+371'));
$email = trim((string) $this->params->get('email', 'info@edemtour.lv'));

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <jdoc:include type="scripts" />
</head>

<body class="site edemtour-template">

<header class="site-header">
    <div class="topbar" role="banner">
        <div class="container">
            <div class="topbar__inner">

                <div class="topbar__contacts" aria-label="Contact information">
                    <?php if ($phone !== '') : ?>
                        <a class="topbar__link" href="tel:<?php echo htmlspecialchars(preg_replace('/\s+/', '', $phone), ENT_QUOTES, 'UTF-8'); ?>">
                            <span class="topbar__icon" aria-hidden="true">☎</span>
                            <span><?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?></span>
                        </a>
                    <?php endif; ?>

                    <?php if ($email !== '') : ?>
                        <a class="topbar__link" href="mailto:<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
                            <span class="topbar__icon" aria-hidden="true">✉</span>
                            <span><?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></span>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="topbar__tools" aria-label="Site tools">
                    <?php if ($this->countModules('topbar-search')) : ?>
                        <div class="topbar__module topbar__module--search">
                            <jdoc:include type="modules" name="topbar-search" style="none" />
                        </div>
                    <?php endif; ?>

                    <?php if ($this->countModules('topbar-language')) : ?>
                        <div class="topbar__module topbar__module--language">
                            <jdoc:include type="modules" name="topbar-language" style="none" />
                        </div>
                    <?php endif; ?>

                    <?php if ($this->countModules('topbar-login')) : ?>
                        <div class="topbar__module topbar__module--login">
                            <jdoc:include type="modules" name="topbar-login" style="none" />
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</header>

<main class="site-main" id="main-content">
    <jdoc:include type="message" />
    <jdoc:include type="component" />
</main>

</body>
</html>
