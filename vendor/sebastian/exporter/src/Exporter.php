<<<<<<< HEAD
<?php declare(strict_types=1);
/*
 * This file is part of exporter package.
=======
<?php
/*
 * This file is part of the exporter package.
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
=======

>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
namespace SebastianBergmann\Exporter;

use SebastianBergmann\RecursionContext\Context;

/**
 * A nifty utility for visualizing PHP variables.
 *
 * <code>
 * <?php
 * use SebastianBergmann\Exporter\Exporter;
 *
 * $exporter = new Exporter;
 * print $exporter->export(new Exception);
 * </code>
 */
class Exporter
{
    /**
     * Exports a value as a string
     *
     * The output of this method is similar to the output of print_r(), but
     * improved in various aspects:
     *
     *  - NULL is rendered as "null" (instead of "")
     *  - TRUE is rendered as "true" (instead of "1")
     *  - FALSE is rendered as "false" (instead of "")
     *  - Strings are always quoted with single quotes
     *  - Carriage returns and newlines are normalized to \n
     *  - Recursion and repeated rendering is treated properly
     *
<<<<<<< HEAD
     * @param int $indentation The indentation level of the 2nd+ line
=======
     * @param mixed $value
     * @param int   $indentation The indentation level of the 2nd+ line
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     *
     * @return string
     */
    public function export($value, $indentation = 0)
    {
        return $this->recursiveExport($value, $indentation);
    }

    /**
<<<<<<< HEAD
     * @param array<mixed> $data
     * @param Context      $context
=======
     * @param mixed   $data
     * @param Context $context
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     *
     * @return string
     */
    public function shortenedRecursiveExport(&$data, Context $context = null)
    {
        $result   = [];
        $exporter = new self();

        if (!$context) {
            $context = new Context;
        }

        $array = $data;
        $context->add($data);

        foreach ($array as $key => $value) {
<<<<<<< HEAD
            if (\is_array($value)) {
                if ($context->contains($data[$key]) !== false) {
                    $result[] = '*RECURSION*';
                } else {
                    $result[] = \sprintf(
=======
            if (is_array($value)) {
                if ($context->contains($data[$key]) !== false) {
                    $result[] = '*RECURSION*';
                } else {
                    $result[] = sprintf(
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                        'array(%s)',
                        $this->shortenedRecursiveExport($data[$key], $context)
                    );
                }
            } else {
                $result[] = $exporter->shortenedExport($value);
            }
        }

<<<<<<< HEAD
        return \implode(', ', $result);
=======
        return implode(', ', $result);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    }

    /**
     * Exports a value into a single-line string
     *
     * The output of this method is similar to the output of
     * SebastianBergmann\Exporter\Exporter::export().
     *
     * Newlines are replaced by the visible string '\n'.
     * Contents of arrays and objects (if any) are replaced by '...'.
     *
<<<<<<< HEAD
=======
     * @param mixed $value
     *
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     * @return string
     *
     * @see    SebastianBergmann\Exporter\Exporter::export
     */
    public function shortenedExport($value)
    {
<<<<<<< HEAD
        if (\is_string($value)) {
            $string = \str_replace("\n", '', $this->export($value));

            if (\function_exists('mb_strlen')) {
                if (\mb_strlen($string) > 40) {
                    $string = \mb_substr($string, 0, 30) . '...' . \mb_substr($string, -7);
                }
            } else {
                if (\strlen($string) > 40) {
                    $string = \substr($string, 0, 30) . '...' . \substr($string, -7);
=======
        if (is_string($value)) {
            $string = str_replace("\n", '', $this->export($value));

            if (function_exists('mb_strlen')) {
                if (mb_strlen($string) > 40) {
                    $string = mb_substr($string, 0, 30) . '...' . mb_substr($string, -7);
                }
            } else {
                if (strlen($string) > 40) {
                    $string = substr($string, 0, 30) . '...' . substr($string, -7);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                }
            }

            return $string;
        }

<<<<<<< HEAD
        if (\is_object($value)) {
            return \sprintf(
                '%s Object (%s)',
                \get_class($value),
                \count($this->toArray($value)) > 0 ? '...' : ''
            );
        }

        if (\is_array($value)) {
            return \sprintf(
                'Array (%s)',
                \count($value) > 0 ? '...' : ''
=======
        if (is_object($value)) {
            return sprintf(
                '%s Object (%s)',
                get_class($value),
                count($this->toArray($value)) > 0 ? '...' : ''
            );
        }

        if (is_array($value)) {
            return sprintf(
                'Array (%s)',
                count($value) > 0 ? '...' : ''
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            );
        }

        return $this->export($value);
    }

    /**
     * Converts an object to an array containing all of its private, protected
     * and public properties.
     *
<<<<<<< HEAD
=======
     * @param mixed $value
     *
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     * @return array
     */
    public function toArray($value)
    {
<<<<<<< HEAD
        if (!\is_object($value)) {
=======
        if (!is_object($value)) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            return (array) $value;
        }

        $array = [];

        foreach ((array) $value as $key => $val) {
<<<<<<< HEAD
            // Exception traces commonly reference hundreds to thousands of
            // objects currently loaded in memory. Including them in the result
            // has a severe negative performance impact.
            if ("\0Error\0trace" === $key || "\0Exception\0trace" === $key) {
                continue;
            }

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            // properties are transformed to keys in the following way:
            // private   $property => "\0Classname\0property"
            // protected $property => "\0*\0property"
            // public    $property => "property"
<<<<<<< HEAD
            if (\preg_match('/^\0.+\0(.+)$/', (string) $key, $matches)) {
=======
            if (preg_match('/^\0.+\0(.+)$/', $key, $matches)) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                $key = $matches[1];
            }

            // See https://github.com/php/php-src/commit/5721132
            if ($key === "\0gcdata") {
                continue;
            }

            $array[$key] = $val;
        }

        // Some internal classes like SplObjectStorage don't work with the
        // above (fast) mechanism nor with reflection in Zend.
        // Format the output similarly to print_r() in this case
        if ($value instanceof \SplObjectStorage) {
<<<<<<< HEAD
            foreach ($value as $key => $val) {
                $array[\spl_object_hash($val)] = [
=======
            // However, the fast method does work in HHVM, and exposes the
            // internal implementation. Hide it again.
            if (property_exists('\SplObjectStorage', '__storage')) {
                unset($array['__storage']);
            } elseif (property_exists('\SplObjectStorage', 'storage')) {
                unset($array['storage']);
            }

            if (property_exists('\SplObjectStorage', '__key')) {
                unset($array['__key']);
            }

            foreach ($value as $key => $val) {
                $array[spl_object_hash($val)] = [
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                    'obj' => $val,
                    'inf' => $value->getInfo(),
                ];
            }
        }

        return $array;
    }

    /**
     * Recursive implementation of export
     *
     * @param mixed                                       $value       The value to export
     * @param int                                         $indentation The indentation level of the 2nd+ line
     * @param \SebastianBergmann\RecursionContext\Context $processed   Previously processed objects
     *
     * @return string
     *
     * @see    SebastianBergmann\Exporter\Exporter::export
     */
    protected function recursiveExport(&$value, $indentation, $processed = null)
    {
        if ($value === null) {
            return 'null';
        }

        if ($value === true) {
            return 'true';
        }

        if ($value === false) {
            return 'false';
        }

<<<<<<< HEAD
        if (\is_float($value) && (float) ((int) $value) === $value) {
            return "$value.0";
        }

        if ($this->isClosedResource($value)) {
            return 'resource (closed)';
        }

        if (\is_resource($value)) {
            return \sprintf(
                'resource(%d) of type (%s)',
                $value,
                \get_resource_type($value)
            );
        }

        if (\is_string($value)) {
            // Match for most non printable chars somewhat taking multibyte chars into account
            if (\preg_match('/[^\x09-\x0d\x1b\x20-\xff]/', $value)) {
                return 'Binary String: 0x' . \bin2hex($value);
            }

            return "'" .
            \str_replace(
                '<lf>',
                "\n",
                \str_replace(
=======
        if (is_float($value) && floatval(intval($value)) === $value) {
            return "$value.0";
        }

        if (is_resource($value)) {
            return sprintf(
                'resource(%d) of type (%s)',
                $value,
                get_resource_type($value)
            );
        }

        if (is_string($value)) {
            // Match for most non printable chars somewhat taking multibyte chars into account
            if (preg_match('/[^\x09-\x0d\x1b\x20-\xff]/', $value)) {
                return 'Binary String: 0x' . bin2hex($value);
            }

            return "'" .
            str_replace('<lf>', "\n",
                str_replace(
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                    ["\r\n", "\n\r", "\r", "\n"],
                    ['\r\n<lf>', '\n\r<lf>', '\r<lf>', '\n<lf>'],
                    $value
                )
            ) .
            "'";
        }

<<<<<<< HEAD
        $whitespace = \str_repeat(' ', (int)(4 * $indentation));
=======
        $whitespace = str_repeat(' ', 4 * $indentation);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

        if (!$processed) {
            $processed = new Context;
        }

<<<<<<< HEAD
        if (\is_array($value)) {
=======
        if (is_array($value)) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            if (($key = $processed->contains($value)) !== false) {
                return 'Array &' . $key;
            }

            $array  = $value;
            $key    = $processed->add($value);
            $values = '';

<<<<<<< HEAD
            if (\count($array) > 0) {
                foreach ($array as $k => $v) {
                    $values .= \sprintf(
=======
            if (count($array) > 0) {
                foreach ($array as $k => $v) {
                    $values .= sprintf(
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                        '%s    %s => %s' . "\n",
                        $whitespace,
                        $this->recursiveExport($k, $indentation),
                        $this->recursiveExport($value[$k], $indentation + 1, $processed)
                    );
                }

                $values = "\n" . $values . $whitespace;
            }

<<<<<<< HEAD
            return \sprintf('Array &%s (%s)', $key, $values);
        }

        if (\is_object($value)) {
            $class = \get_class($value);

            if ($hash = $processed->contains($value)) {
                return \sprintf('%s Object &%s', $class, $hash);
=======
            return sprintf('Array &%s (%s)', $key, $values);
        }

        if (is_object($value)) {
            $class = get_class($value);

            if ($hash = $processed->contains($value)) {
                return sprintf('%s Object &%s', $class, $hash);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            }

            $hash   = $processed->add($value);
            $values = '';
            $array  = $this->toArray($value);

<<<<<<< HEAD
            if (\count($array) > 0) {
                foreach ($array as $k => $v) {
                    $values .= \sprintf(
=======
            if (count($array) > 0) {
                foreach ($array as $k => $v) {
                    $values .= sprintf(
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                        '%s    %s => %s' . "\n",
                        $whitespace,
                        $this->recursiveExport($k, $indentation),
                        $this->recursiveExport($v, $indentation + 1, $processed)
                    );
                }

                $values = "\n" . $values . $whitespace;
            }

<<<<<<< HEAD
            return \sprintf('%s Object &%s (%s)', $class, $hash, $values);
        }

        return \var_export($value, true);
    }

    /**
     * Determines whether a variable represents a resource, either open or closed.
     *
     * @param mixed $actual The variable to test.
     *
     * @return bool
     */
    private function isResource($value)
    {
        return $value !== null
            && \is_scalar($value) === false
            && \is_array($value) === false
            && \is_object($value) === false;
    }

    /**
     * Determines whether a variable represents a closed resource.
     *
     * @param mixed $actual The variable to test.
     *
     * @return bool
     */
    private function isClosedResource($value)
    {
        /*
         * PHP 7.2 introduced "resource (closed)".
         */
        if (\gettype($value) === 'resource (closed)') {
            return true;
        }

        /*
         * If gettype did not work, attempt to determine whether this is
         * a closed resource in another way.
         */
        $isResource       = \is_resource($value);
        $isNotNonResource = $this->isResource($value);

        if ($isResource === false && $isNotNonResource === true) {
            return true;
        }

        if ($isNotNonResource === true) {
            try {
                $resourceType = @\get_resource_type($value);

                if ($resourceType === 'Unknown') {
                    return true;
                }
            } catch (TypeError $e) {
                // Ignore. Not a resource.
            } catch (Exception $e) {
                // Ignore. Not a resource.
            }
        }

        return false;
=======
            return sprintf('%s Object &%s (%s)', $class, $hash, $values);
        }

        return var_export($value, true);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    }
}
