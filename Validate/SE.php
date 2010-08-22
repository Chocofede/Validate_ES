<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * Methods for validation in Sweden
 *
 * PHP Version 5
 *
 * This source file is subject to the New BSD license, That is bundled
 * with this package in the file LICENSE, and is available through
 * the world-wide-web at
 * http://www.opensource.org/licenses/bsd-license.php
 * If you did not receive a copy of the new BSDlicense and are unable
 * to obtain it through the world-wide-web, please send a note to
 * pajoye@php.net so we can mail you a copy immediately.
 *
 * @category Validate
 * @package  Validate_SE
 * @author   Christian Weiske <cweiske@php.net>
 * @license  http://www.opensource.org/licenses/bsd-license.php  New BSD License
 * @version  SVN: $Id: DE.php 242590 2007-09-16 17:35:37Z kguest $
 * @link     http://pear.php.net/package/Validate_DE
 */

/**
 * Data validation class for Sweden
 *
 * This class provides methods to validate:
 *  - Postal code
 *
 * @category Validate
 * @package  Validate_SE
 * @author   Christian Weiske <cweiske@php.net>
 * @license  http://www.opensource.org/licenses/bsd-license.php  New BSD License
 * @version  Release: @package_version@
 * @link     http://pear.php.net/package/Validate_DE
 */
class Validate_SE
{
    /**
     * Validate a Swedish postcode.
     *
     * @param string $postcode postcode to validate
     * @param bool   $strong   optional; strong checks (e.g. against a list of 
     *                         postcodes) (not implemented)
     *
     * @return bool true if postcode is ok, false otherwise
     *
     * http://en.wikipedia.org/wiki/Postal_codes_in_Sweden
     */
    public static function postalCode($postcode, $strong = false)
    {
        return (bool)preg_match('/^[0-9]{3}[ ]?[0-9]{2}$/', $postcode);
    }

    /**
     * Validate a Swedish county.
     * 
     * http://en.wikipedia.org/wiki/Counties_of_Sweden
     *
     * @param string $name   County to validate
     * @param bool   $return If true, return name of county as string
     *
     * @return mixed True if county exists, or county name if $return is true.
     *
     * http://en.wikipedia.org/wiki/Postal_codes_in_Sweden
     */
    public function county($name, $return=false)
    {
        $counties = array(
            "AB" => "Stockholms l�n",
            "C" => "Uppsala l�n",
            "D" => "S�dermanlands l�n",
            "E" => "�sterg�tlands l�n",
            "F" => "J�nk�pings l�n",
            "G" => "Kronobergs l�n",
            "H" => "Kalmar l�n",
            "I" => "Gotlands l�n",
            "K" => "Blekinge l�n",
            "M" => "Sk�ne l�n",
            "N" => "Hallands l�n",
            "O" => "V�stra G�talands l�n",
            "S" => "V�rmlands l�n",
            "T" => "�rebro l�n",
            "U" => "V�stmanlands l�n",
            "W" => "Dalarnas l�n",
            "X" => "G�vleborgs l�n",
            "Y" => "V�sternorrlands l�n",
            "Z" => "J�mtlands l�n",
            "AC" => "V�sterbottens l�n",
            "BD" => "Norrbottens l�n");

        $exists = array_key_exists(strtoupper($name), $counties);
        
        if (!$exists || !$return ) {
            return $exists;
        } else {
            return $counties[strtoupper($name)];
        }
    }
}
?>
