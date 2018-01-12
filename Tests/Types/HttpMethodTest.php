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

use Circle\DoctrineRestDriver\Enums\HttpMethods;
use Circle\DoctrineRestDriver\Types\HttpMethod;

/**
 * Tests the http method type
 *
 * @author    Tobias Hauck <tobias@circle.ai>
 * @copyright 2015 TeeAge-Beatz UG
 *
 * @coversDefaultClass Circle\DoctrineRestDriver\Types\HttpMethod
 */
class HttpMethodTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @group  unit
     * @covers ::create
     *
     * @SuppressWarnings("PHPMD.StaticAccess")
     */
    public function create() 
    {
        $annotation = $this->getMockBuilder('Circle\DoctrineRestDriver\Annotations\DataSource')->getMock();
        $annotation
            ->expects($this->exactly(2))
            ->method('getMethod')
            ->will($this->returnValue(HttpMethods::PUT));

        $this->assertSame(HttpMethods::PUT, HttpMethod::create(HttpMethods::POST, $annotation));
    }

    /**
     * @test
     * @group  unit
     * @covers ::create
     *
     * @SuppressWarnings("PHPMD.StaticAccess")
     */
    public function createWithEmptyMethod() 
    {
        $annotation = $this->getMockBuilder('Circle\DoctrineRestDriver\Annotations\DataSource')->getMock();
        $annotation
            ->expects($this->once())
            ->method('getMethod')
            ->will($this->returnValue(null));

        $this->assertSame(HttpMethods::POST, HttpMethod::create(HttpMethods::POST, $annotation));
    }
}