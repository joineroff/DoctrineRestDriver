<?php
/**
 * This file is part of DoctrineRestDriver.
 *
 * DoctrineRestDriver is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * DoctrineRestDriver is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with DoctrineRestDriver.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Circle\DoctrineRestDriver\Tests\Types;

use Circle\DoctrineRestDriver\Types\MaybeString;

/**
 * Tests the maybe string type
 *
 * @author    Tobias Hauck <tobias@circle.ai>
 * @copyright 2015 TeeAge-Beatz UG
 *
 * @coversDefaultClass Circle\DoctrineRestDriver\Types\MaybeString
 */
class MaybeStringTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @group  unit
     * @covers ::assert
     *
     * @SuppressWarnings("PHPMD.StaticAccess")
     */
    public function assert() 
    {
        $this->assertSame('test', MaybeString::assert('test', 'test'));
        $this->assertSame(null, MaybeString::assert(null, 'test'));
    }

    /**
     * @test
     * @group  unit
     * @covers ::assert
     *
     * @SuppressWarnings("PHPMD.StaticAccess")
     * @expectedException \Circle\DoctrineRestDriver\Validation\Exceptions\InvalidTypeException
     */
    public function assertOnException() 
    {
        MaybeString::assert([], 'array');
    }
}