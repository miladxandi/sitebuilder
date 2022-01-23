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

namespace phpDocumentor\Reflection\DocBlock;

use phpDocumentor\Reflection\DocBlock\Tags\Example;

<<<<<<< HEAD
use function array_slice;
use function file;
use function getcwd;
use function implode;
use function is_readable;
use function rtrim;
use function sprintf;
use function trim;

use const DIRECTORY_SEPARATOR;

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
/**
 * Class used to find an example file's location based on a given ExampleDescriptor.
 */
class ExampleFinder
{
    /** @var string */
    private $sourceDirectory = '';

    /** @var string[] */
    private $exampleDirectories = [];

    /**
     * Attempts to find the example contents for the given descriptor.
<<<<<<< HEAD
     */
    public function find(Example $example): string
=======
     *
     * @param Example $example
     *
     * @return string
     */
    public function find(Example $example)
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        $filename = $example->getFilePath();

        $file = $this->getExampleFileContents($filename);
        if (!$file) {
<<<<<<< HEAD
            return sprintf('** File not found : %s **', $filename);
=======
            return "** File not found : {$filename} **";
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        }

        return implode('', array_slice($file, $example->getStartingLine() - 1, $example->getLineCount()));
    }

    /**
     * Registers the project's root directory where an 'examples' folder can be expected.
<<<<<<< HEAD
     */
    public function setSourceDirectory(string $directory = ''): void
=======
     *
     * @param string $directory
     *
     * @return void
     */
    public function setSourceDirectory($directory = '')
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        $this->sourceDirectory = $directory;
    }

    /**
     * Returns the project's root directory where an 'examples' folder can be expected.
<<<<<<< HEAD
     */
    public function getSourceDirectory(): string
=======
     *
     * @return string
     */
    public function getSourceDirectory()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return $this->sourceDirectory;
    }

    /**
     * Registers a series of directories that may contain examples.
     *
     * @param string[] $directories
     */
<<<<<<< HEAD
    public function setExampleDirectories(array $directories): void
=======
    public function setExampleDirectories(array $directories)
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        $this->exampleDirectories = $directories;
    }

    /**
     * Returns a series of directories that may contain examples.
     *
     * @return string[]
     */
<<<<<<< HEAD
    public function getExampleDirectories(): array
=======
    public function getExampleDirectories()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return $this->exampleDirectories;
    }

    /**
     * Attempts to find the requested example file and returns its contents or null if no file was found.
     *
     * This method will try several methods in search of the given example file, the first one it encounters is
     * returned:
     *
     * 1. Iterates through all examples folders for the given filename
     * 2. Checks the source folder for the given filename
     * 3. Checks the 'examples' folder in the current working directory for examples
     * 4. Checks the path relative to the current working directory for the given filename
     *
<<<<<<< HEAD
     * @return string[] all lines of the example file
     */
    private function getExampleFileContents(string $filename): ?array
=======
     * @param string $filename
     *
     * @return string|null
     */
    private function getExampleFileContents($filename)
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        $normalizedPath = null;

        foreach ($this->exampleDirectories as $directory) {
            $exampleFileFromConfig = $this->constructExamplePath($directory, $filename);
            if (is_readable($exampleFileFromConfig)) {
                $normalizedPath = $exampleFileFromConfig;
                break;
            }
        }

        if (!$normalizedPath) {
            if (is_readable($this->getExamplePathFromSource($filename))) {
                $normalizedPath = $this->getExamplePathFromSource($filename);
            } elseif (is_readable($this->getExamplePathFromExampleDirectory($filename))) {
                $normalizedPath = $this->getExamplePathFromExampleDirectory($filename);
            } elseif (is_readable($filename)) {
                $normalizedPath = $filename;
            }
        }

<<<<<<< HEAD
        $lines = $normalizedPath && is_readable($normalizedPath) ? file($normalizedPath) : false;

        return $lines !== false ? $lines : null;
=======
        return $normalizedPath && is_readable($normalizedPath) ? file($normalizedPath) : null;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    }

    /**
     * Get example filepath based on the example directory inside your project.
<<<<<<< HEAD
     */
    private function getExamplePathFromExampleDirectory(string $file): string
=======
     *
     * @param string $file
     *
     * @return string
     */
    private function getExamplePathFromExampleDirectory($file)
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return getcwd() . DIRECTORY_SEPARATOR . 'examples' . DIRECTORY_SEPARATOR . $file;
    }

    /**
     * Returns a path to the example file in the given directory..
<<<<<<< HEAD
     */
    private function constructExamplePath(string $directory, string $file): string
=======
     *
     * @param string $directory
     * @param string $file
     *
     * @return string
     */
    private function constructExamplePath($directory, $file)
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return rtrim($directory, '\\/') . DIRECTORY_SEPARATOR . $file;
    }

    /**
     * Get example filepath based on sourcecode.
<<<<<<< HEAD
     */
    private function getExamplePathFromSource(string $file): string
=======
     *
     * @param string $file
     *
     * @return string
     */
    private function getExamplePathFromSource($file)
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return sprintf(
            '%s%s%s',
            trim($this->getSourceDirectory(), '\\/'),
            DIRECTORY_SEPARATOR,
            trim($file, '"')
        );
    }
}
