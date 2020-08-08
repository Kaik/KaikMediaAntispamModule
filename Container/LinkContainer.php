<?php

/**
 * KaikMedia AntispamModule
 *
 * @package    KaikmediaAntispamModule
 * @author     Kaik <contact@kaikmedia.com>
 * @copyright  KaikMedia
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @link       https://github.com/Kaik/KaikMediaAntispam.git
 */

namespace Kaikmedia\AntispamModule\Container;

use Kaikmedia\AntispamModule\Security\AccessManager;
use Symfony\Component\Routing\RouterInterface;
use Zikula\Common\Translator\TranslatorInterface;
use Zikula\Core\LinkContainer\LinkContainerInterface;

class LinkContainer implements LinkContainerInterface
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var AccessManager
     */
    private $accessManager;

    /**
     * @var bool
     */
    private $enableCategorization;

    /**
     * LinkContainer constructor.
     * @param TranslatorInterface $translator
     * @param RouterInterface $router
     * @param AccessManager $accessManager
     */
    public function __construct(
        TranslatorInterface $translator,
        RouterInterface $router,
        AccessManager $accessManager,
        $enableCategorization
    ) {
        $this->translator = $translator;
        $this->router = $router;
        $this->accessManager = $accessManager;
        $this->enableCategorization = $enableCategorization;
    }

    /**
     * get Links of any type for this extension
     * required by the interface.
     *
     * @param string $type
     *
     * @return array
     */
    public function getLinks($type = LinkContainerInterface::TYPE_ADMIN)
    {
        $method = 'get'.ucfirst(strtolower($type));
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        return [];
    }

    /**
     * get the Admin links for this extension.
     *
     * @return array
     */
    private function getAdmin()
    {
        $links = [];
        if ($this->accessManager->hasPermission(ACCESS_ADMIN, false)) {
            $links[] = [
                'url' => $this->router->generate('kaikmediaantispammodule_admin_index'),
                'text' => $this->translator->__('Info'),
                'title' => $this->translator->__('Info'),
                'icon' => 'info'];
        }
        if ($this->accessManager->hasPermission(ACCESS_ADMIN, false)) {
            $links[] = [
                'url' => $this->router->generate('kaikmediaantispammodule_admin_index'),
                'text' => $this->translator->__('Banned usernames'),
                'title' => $this->translator->__('Banned usernames'),
                'icon' => 'info'];
        }
        if ($this->accessManager->hasPermission(ACCESS_ADMIN, false)) {
            $links[] = [
                'url' => $this->router->generate('kaikmediaantispammodule_admin_index'),
                'text' => $this->translator->__('Banned emails/domains'),
                'title' => $this->translator->__('Banned emails/domains'),
                'icon' => 'info'];
        }
        if ($this->accessManager->hasPermission(ACCESS_ADMIN, false)) {
            $links[] = [
                'url' => $this->router->generate('kaikmediaantispammodule_admin_index'),
                'text' => $this->translator->__('Banned user agents'),
                'title' => $this->translator->__('Banned user agents'),
                'icon' => 'info'];
        }
        if ($this->accessManager->hasPermission(ACCESS_ADMIN, false)) {
            $links[] = [
                'url' => $this->router->generate('kaikmediaantispammodule_admin_index'),
                'text' => $this->translator->__('Spam protection question'),
                'title' => $this->translator->__('Spam protection question'),
                'icon' => 'info'];
        }
        if ($this->accessManager->hasPermission(ACCESS_ADMIN, false)) {
            $links[] = [
                'url' => $this->router->generate('kaikmediaantispammodule_admin_index'),
                'text' => $this->translator->__('Captcha'),
                'title' => $this->translator->__('Captcha'),
                'icon' => 'info'];
        }
        if ($this->accessManager->hasPermission(ACCESS_ADMIN, false)) {
            $links[] = [
                'url' => $this->router->generate('kaikmediaantispammodule_admin_index'),
                'text' => $this->translator->__('ReCaptcha'),
                'title' => $this->translator->__('ReCaptcha'),
                'icon' => 'info'];
        }
        if ($this->accessManager->hasPermission(ACCESS_ADMIN, false)) {
            $links[] = [
                'url' => $this->router->generate('kaikmediaantispammodule_admin_index'),
                'text' => $this->translator->__('Honeypot'),
                'title' => $this->translator->__('Honeypot'),
                'icon' => 'info'];
        }
        if ($this->accessManager->hasPermission(ACCESS_ADMIN, false)) {
            $links[] = [
                'url' => $this->router->generate('kaikmediaantispammodule_admin_preferences'),
                'text' => $this->translator->__('Modify Config'),
                'title' => $this->translator->__('Modify Config'),
                'icon' => 'wrench'];
        }

        return $links;
    }

    /**
     * get the User links for this extension.
     *
     * @return array
     */
    private function getUser()
    {
        $links = [];

        return $links;
    }

    /**
     * get the Account links for this extension.
     *
     * @return array
     */
    private function getAccount()
    {
        $links = [];

        return $links;
    }

    public function getBundleName()
    {
        return 'KaikmediaAntispamModule';
    }
}