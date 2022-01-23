<?php
<<<<<<< HEAD

declare(strict_types=1);

/**
 * phpDocumentor
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link      http://phpdoc.org
 */

=======
/**
 * phpDocumentor
 *
 * PHP Version 5.5
 *
 * @copyright 2010-2015 Mike van Riel / Naenius (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
namespace phpDocumentor\Reflection;

/**
 * Interface for project factories. A project factory shall convert a set of files
 * into an object implementing the Project interface.
 */
interface ProjectFactory
{
    /**
     * Creates a project from the set of files.
     *
<<<<<<< HEAD
     * @param File[] $files
     */
    public function create(string $name, array $files) : Project;
=======
     * @param string $name
     * @param File[] $files
     * @return Project
     */
    public function create($name, array $files);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}
