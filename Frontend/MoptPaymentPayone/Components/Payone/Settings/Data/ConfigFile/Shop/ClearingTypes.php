<?php
/**
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the GNU General Public License (GPL 3)
 * that is bundled with this package in the file LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Payone to newer
 * versions in the future. If you wish to customize Payone for your
 * needs please refer to http://www.payone.de for more information.
 *
 * @category        Payone
 * @package         Payone_Settings
 * @subpackage      Data
 * @copyright       Copyright (c) 2012 <info@noovias.com> - www.noovias.com
 * @author          Matthias Walter <info@noovias.com>
 * @license         <http://www.gnu.org/licenses/> GNU General Public License (GPL 3)
 * @link            http://www.noovias.com
 */

/**
 *
 * @category        Payone
 * @package         Payone_Settings
 * @subpackage      Data
 * @copyright       Copyright (c) 2012 <info@noovias.com> - www.noovias.com
 * @license         <http://www.gnu.org/licenses/> GNU General Public License (GPL 3)
 * @link            http://www.noovias.com
 */
class Payone_Settings_Data_ConfigFile_Shop_ClearingTypes
    extends Payone_Settings_Data_ConfigFile_Abstract
    implements Payone_Settings_Data_ConfigFile_Interface
{
    protected $key = 'clearingtypes';

    /** @var Payone_Settings_Data_ConfigFile_PaymentMethod_Abstract[] */
    protected $clearingtypes = array();

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @abstract
     * @return array
     */
    public function toArray()
    {
        $array = array();
        foreach ($this->getClearingtypes() as $key => $value) {
            if ($value instanceof Payone_Settings_Data_ConfigFile_Interface) {
                /** @var Payone_Api_Request_Parameter_Interface $value */
                $array[$value->getKey()] = $value->toArray();
            }
            else {
                $array[$key] = $value;
            }
        }

        return $array;
    }

    /**
     * @param $clearingtypes
     */
    public function setClearingtypes($clearingtypes)
    {
        $this->clearingtypes = $clearingtypes;
    }

    /**
     * @return Payone_Settings_Data_ConfigFile_PaymentMethod_Abstract[]
     */
    public function getClearingtypes()
    {
        return $this->clearingtypes;
    }
}