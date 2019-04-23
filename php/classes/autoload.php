<?php
/**
 * PSR-4 Complaint Autoloader
 *
 * This will dynamically load classes by resolving the prefix and class name. This is the method that frameworks such
 * as Laravel and Composer automatically resolve class names and load them. To use it, simply set the configurable
 * parameters inside the closure. This example is taken from Php-Fig, referenced below.
 *
 * @param sting $class fully qualified class name to load
 * @see http://www.php-fig.org/psr/psr-4/examples/PSR-4 Example Autoloader
 */

spl_autoload_register(function ($class) {
	/**
	 * Parameters configurable
	 * prefix: the prefix for all the classes
	 */
}