<?php
/**
 * This file is part of OXID eShop Community Edition.
 *
 * OXID eShop Community Edition is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eShop Community Edition is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2016
 * @version   OXID eShop CE
 */
namespace OxidEsales\EshopCommunity\Tests\Integration\Modules;

use oxRegistry;

/**
 * @group module
 * @package Integration\Modules
 */
class ModuleWithNoMetadataTest extends \OxidTestCase
{
    /**
     * Tests if module was activated.
     */
    public function testGetDisabledModules()
    {
        $sShopDir = realpath(dirname(__FILE__)) . '/TestData/';

        oxRegistry::getConfig()->setConfigParam('sShopDir', $sShopDir);

        $oModuleList = oxNew('oxModuleList');

        $this->assertEquals(array(), $oModuleList->getDisabledModules());

        $oModuleList->getModulesFromDir($sShopDir . 'modules/');

        $this->assertFalse(in_array(null, $oModuleList->getDisabledModules()), 'Module id with value null was found in disabled modules list');
    }
}