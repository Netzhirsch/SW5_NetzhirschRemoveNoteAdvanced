<?php

namespace NetzhirschRemoveNoteAdvanced;

use Enlight_Event_EventArgs;
use Enlight_View_Default;
use Shopware\Bundle\CookieBundle\CookieGroupCollection;
use Shopware\Bundle\CookieBundle\Structs\CookieGroupStruct;
use Shopware\Components\Plugin;

class NetzhirschRemoveNoteAdvanced extends Plugin
{

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'CookieCollector_Filter_Collected_Cookies' => 'removeNoteCookie',
            'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'onPostDispatch'
        ];
    }

    public function removeNoteCookie(Enlight_Event_EventArgs $args)
    {
        $return = $args->getReturn();

        if (!class_exists(CookieGroupCollection::class) && get_class($return) != CookieGroupCollection::class)
            return;

        /** @var CookieGroupCollection $cookieGroupCollection */
        $cookieGroups = $return;
        /** @var CookieGroupStruct $cookieGroup */
        foreach ($cookieGroups as $cookieGroup) {
            foreach ($cookieGroup->cookies as $key => $cookie) {
                if ($cookie->getName() == 'sUniqueID' && isset($cookieGroup->cookies[$key]))
                    unset($cookieGroup->cookies[$key]);
            }
        }

        $args->setReturn($return);
    }

    public function onPostDispatch(Enlight_Event_EventArgs $args)
    {
        /** @var Enlight_View_Default $view */
        $view = $args->get('subject')->View();
        $view->addTemplateDir($this->getPluginDir());
    }

    private function getPluginDir() {

        $pluginDir = dirname(__DIR__);
        $pluginDir .= DIRECTORY_SEPARATOR;
        $pluginDir .= 'NetzhirschRemoveNoteAdvanced';
        $pluginDir .= DIRECTORY_SEPARATOR;
        $pluginDir .= 'Resources';
        $pluginDir .= DIRECTORY_SEPARATOR;
        $pluginDir .= 'views';

        return $pluginDir;
    }
}
