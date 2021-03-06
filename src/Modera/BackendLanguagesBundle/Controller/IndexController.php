<?php

namespace Modera\BackendLanguagesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sli\ExtJsLocalizationBundle\Controller\IndexController as Controller;

/**
 * @author    Sergei Vizel <sergei.vizel@modera.org>
 * @copyright 2014 Modera Foundation
 */
class IndexController extends Controller
{
    /**
     * {@inheritdoc}
     */
    protected function getTemplate()
    {
        return 'ModeraBackendLanguagesBundle:Index:compile.js.twig';
    }

    /**
     * {@inheritdoc}
     */
    protected function getTranslationsDir()
    {
        if ($this->container->hasParameter('modera.translations_dir')) {
            return $this->container->getParameter('modera.translations_dir');
        }

        return parent::getTranslationsDir();
    }

    /**
     * {@inheritdoc}
     */
    public function compileAction(Request $request, $locale = null)
    {
        $request->getSession()->set('_backend_locale', $locale ?: $request->getLocale());
        return parent::compileAction($request, $locale);
    }
}
