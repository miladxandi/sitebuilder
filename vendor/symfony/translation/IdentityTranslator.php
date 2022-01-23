<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation;

use Symfony\Component\Translation\TranslatorInterface as LegacyTranslatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Contracts\Translation\TranslatorTrait;

/**
 * IdentityTranslator does not translate anything.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class IdentityTranslator implements LegacyTranslatorInterface, TranslatorInterface
{
<<<<<<< HEAD
    use TranslatorTrait {
        trans as private doTrans;
        setLocale as private doSetLocale;
    }

    private $selector;

=======
    use TranslatorTrait;

    private $selector;

    /**
     * @param MessageSelector|null $selector The message selector for pluralization
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    public function __construct(MessageSelector $selector = null)
    {
        $this->selector = $selector;

<<<<<<< HEAD
        if (__CLASS__ !== static::class) {
            @trigger_error(sprintf('Calling "%s()" is deprecated since Symfony 4.2.', __METHOD__), \E_USER_DEPRECATED);
=======
        if (__CLASS__ !== \get_class($this)) {
            @trigger_error(sprintf('Calling "%s()" is deprecated since Symfony 4.2.', __METHOD__), E_USER_DEPRECATED);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        }
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     */
    public function trans($id, array $parameters = [], $domain = null, $locale = null)
    {
        return $this->doTrans($id, $parameters, $domain, $locale);
    }

    /**
     * {@inheritdoc}
     */
    public function setLocale($locale)
    {
        $this->doSetLocale($locale);
    }

    /**
     * {@inheritdoc}
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     *
     * @deprecated since Symfony 4.2, use the trans() method instead with a %count% parameter
     */
    public function transChoice($id, $number, array $parameters = [], $domain = null, $locale = null)
    {
<<<<<<< HEAD
        @trigger_error(sprintf('The "%s()" method is deprecated since Symfony 4.2, use the trans() one instead with a "%%count%%" parameter.', __METHOD__), \E_USER_DEPRECATED);
=======
        @trigger_error(sprintf('The "%s()" method is deprecated since Symfony 4.2, use the trans() one instead with a "%%count%%" parameter.', __METHOD__), E_USER_DEPRECATED);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

        if ($this->selector) {
            return strtr($this->selector->choose((string) $id, $number, $locale ?: $this->getLocale()), $parameters);
        }

        return $this->trans($id, ['%count%' => $number] + $parameters, $domain, $locale);
    }

<<<<<<< HEAD
    private function getPluralizationRule(float $number, string $locale): int
=======
    private function getPluralizationRule(int $number, string $locale): int
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return PluralizationRules::get($number, $locale, false);
    }
}
