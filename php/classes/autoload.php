<?php
/**
 * PSR-4 Complaint Autoloader
 *
 * This will dynamically load classes by resolving the prefix and class name. This is the method that frameworks such
 * as Laravel and Composer automatically resolve class names and load them. To use it, simply set the configurable
 * parameters inside the closure. This example is taken from Php-Fig, referenced below.
 *
 * @param string $class fully qualified class name to load
 * @see http://www.php-fig.org/psr/psr-4/examples/PSR-4 Example Autoloader
 */

spl_autoload_register(function ($class) {
	/**
	 * Parameters configurable
	 * prefix: the prefix for all the classes such as namespace
	 * baseDir: the base directory for all classes as of now it is the current directory
	 */
	$prefix = "jgallegos362\\object-oriented";
	$baseDir = __DIR__;

	//This asks if the class uses the namespace prefix.
	$len = strlen($prefix);
	if (strncmp($prefix, $class, $len) !==0) {
		//If it does not use then more to the next registered autoloader
		return;
	}
	//get the relative class name
	$className = substr($class, $len);

	//replace the namespace prefix with the base directory, replace namespace
	//separators with directory separators in the relative class name, append with .php
	$file = $baseDir . str_replace("\\", "/", $className) . ".php";

	//if the file exists, require it
	if(file_exists($file)) {
		require_once ($file);
	}
});