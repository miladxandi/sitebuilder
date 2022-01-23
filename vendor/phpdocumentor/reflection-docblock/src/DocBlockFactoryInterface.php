<?php
<<<<<<< HEAD

declare(strict_types=1);

namespace phpDocumentor\Reflection;

use phpDocumentor\Reflection\DocBlock\Tag;

// phpcs:ignore SlevomatCodingStandard.Classes.SuperfluousInterfaceNaming.SuperfluousSuffix
=======
namespace phpDocumentor\Reflection;

>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
interface DocBlockFactoryInterface
{
    /**
     * Factory method for easy instantiation.
     *
<<<<<<< HEAD
     * @param array<string, class-string<Tag>> $additionalTags
     */
    public static function createInstance(array $additionalTags = []): DocBlockFactory;

    /**
     * @param string|object $docblock
     */
    public function create($docblock, ?Types\Context $context = null, ?Location $location = null): DocBlock;
=======
     * @param string[] $additionalTags
     *
     * @return DocBlockFactory
     */
    public static function createInstance(array $additionalTags = []);

    /**
     * @param string $docblock
     * @param Types\Context $context
     * @param Location $location
     *
     * @return DocBlock
     */
    public function create($docblock, Types\Context $context = null, Location $location = null);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}
