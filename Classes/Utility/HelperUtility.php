<?php
/**
 * Helper Utility
 *
 * @category   Extension
 * @package    Calendarize
 * @subpackage Utility
 * @author     Tim Lochmüller <tim.lochmueller@hdnet.de>
 */

namespace HDNET\Calendarize\Utility;

use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * Helper Utility
 *
 * @package    Calendarize
 * @subpackage Utility
 * @author     Tim Lochmüller <tim.lochmueller@hdnet.de>
 */
class HelperUtility {

	/**
	 * Create a object with the given class name
	 *
	 * @param string $className
	 *
	 * @return object
	 */
	public static function create($className) {
		$arguments = func_get_args();
		$objManager = new ObjectManager();
		return call_user_func_array(array(
			$objManager,
			'get'
		), $arguments);
	}

	/**
	 * Get the query for the given class name oder object
	 *
	 * @param string|object $objectName
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryInterface
	 */
	public static function getQuery($objectName) {
		$objectName = is_object($objectName) ? get_class($objectName) : $objectName;
		/** @var \TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface $manager */
		static $manager = NULL;
		if ($manager === NULL) {
			$manager = self::create('TYPO3\\CMS\\Extbase\\Persistence\\PersistenceManagerInterface');
		}
		return $manager->createQueryForType($objectName);
	}
}
 