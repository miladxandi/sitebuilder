<?php
<<<<<<< HEAD

declare(strict_types=1);

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
<<<<<<< HEAD
=======
 * @copyright 2010-2015 Mike van Riel<mike@phpdoc.org>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection\Types;

<<<<<<< HEAD
use function strlen;
use function substr;
use function trim;

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
/**
 * Provides information about the Context in which the DocBlock occurs that receives this context.
 *
 * A DocBlock does not know of its own accord in which namespace it occurs and which namespace aliases are applicable
 * for the block of code in which it is in. This information is however necessary to resolve Class names in tags since
 * you can provide a short form or make use of namespace aliases.
 *
 * The phpDocumentor Reflection component knows how to create this class but if you use the DocBlock parser from your
 * own application it is possible to generate a Context class using the ContextFactory; this will analyze the file in
 * which an associated class resides for its namespace and imports.
 *
 * @see ContextFactory::createFromClassReflector()
 * @see ContextFactory::createForNamespace()
<<<<<<< HEAD
 *
 * @psalm-immutable
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 */
final class Context
{
    /** @var string The current namespace. */
    private $namespace;

<<<<<<< HEAD
    /**
     * @var string[] List of namespace aliases => Fully Qualified Namespace.
     * @psalm-var array<string, string>
     */
=======
    /** @var array List of namespace aliases => Fully Qualified Namespace. */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    private $namespaceAliases;

    /**
     * Initializes the new context and normalizes all passed namespaces to be in Qualified Namespace Name (QNN)
     * format (without a preceding `\`).
     *
<<<<<<< HEAD
     * @param string   $namespace        The namespace where this DocBlock resides in.
     * @param string[] $namespaceAliases List of namespace aliases => Fully Qualified Namespace.
     * @psalm-param array<string, string> $namespaceAliases
     */
    public function __construct(string $namespace, array $namespaceAliases = [])
    {
        $this->namespace = $namespace !== 'global' && $namespace !== 'default'
            ? trim($namespace, '\\')
=======
     * @param string $namespace The namespace where this DocBlock resides in.
     * @param array $namespaceAliases List of namespace aliases => Fully Qualified Namespace.
     */
    public function __construct($namespace, array $namespaceAliases = [])
    {
        $this->namespace = ('global' !== $namespace && 'default' !== $namespace)
            ? trim((string)$namespace, '\\')
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            : '';

        foreach ($namespaceAliases as $alias => $fqnn) {
            if ($fqnn[0] === '\\') {
                $fqnn = substr($fqnn, 1);
            }
<<<<<<< HEAD

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            if ($fqnn[strlen($fqnn) - 1] === '\\') {
                $fqnn = substr($fqnn, 0, -1);
            }

            $namespaceAliases[$alias] = $fqnn;
        }

        $this->namespaceAliases = $namespaceAliases;
    }

    /**
     * Returns the Qualified Namespace Name (thus without `\` in front) where the associated element is in.
<<<<<<< HEAD
     */
    public function getNamespace(): string
=======
     *
     * @return string
     */
    public function getNamespace()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return $this->namespace;
    }

    /**
     * Returns a list of Qualified Namespace Names (thus without `\` in front) that are imported, the keys represent
     * the alias for the imported Namespace.
     *
     * @return string[]
<<<<<<< HEAD
     * @psalm-return array<string, string>
     */
    public function getNamespaceAliases(): array
=======
     */
    public function getNamespaceAliases()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return $this->namespaceAliases;
    }
}
