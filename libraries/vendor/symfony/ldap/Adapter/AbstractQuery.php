<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Ldap\Adapter;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Charles Sarrazin <charles@sarraz.in>
 */
abstract class AbstractQuery implements QueryInterface
{
    protected $connection;
    protected $dn;
    protected $query;
    protected $options;

    public function __construct(ConnectionInterface $connection, string $dn, string $query, array $options = [])
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults([
            'filter' => '*',
            'maxItems' => 0,
            'sizeLimit' => 0,
            'timeout' => 0,
            'deref' => static::DEREF_NEVER,
            'attrsOnly' => 0,
            'scope' => static::SCOPE_SUB,
            'pageSize' => 0,
        ]);
        $resolver->setAllowedValues('deref', [static::DEREF_ALWAYS, static::DEREF_NEVER, static::DEREF_FINDING, static::DEREF_SEARCHING]);
        $resolver->setAllowedValues('scope', [static::SCOPE_BASE, static::SCOPE_ONE, static::SCOPE_SUB]);

        $resolver->setNormalizer('filter', fn (Options $options, $value) => \is_array($value) ? $value : [$value]);

        $this->connection = $connection;
        $this->dn = $dn;
        $this->query = $query;
        $this->options = $resolver->resolve($options);
    }
}
