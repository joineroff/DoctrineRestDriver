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

namespace Circle\DoctrineRestDriver\Validation;

use Circle\DoctrineRestDriver\Exceptions\UnsupportedFetchModeException;
use Circle\DoctrineRestDriver\Exceptions\Exceptions;
use Prophecy\Exception\Doubler\ClassNotFoundException;

/**
 * Assertions
 *
 * @author    Tobias Hauck <tobias@circle.ai>
 * @copyright 2015 TeeAge-Beatz UG
 *
 * @SuppressWarnings("PHPMD.StaticAccess")
 */
class Assertions
{

    /**
     * Checks if the given fetch mode is supported
     *
     * @param  int $fetchMode
     * @return int
     * @throws UnsupportedFetchModeException
     *
     * @SuppressWarnings("PHPMD.StaticAccess")
     */
    public static function assertSupportedFetchMode($fetchMode) 
    {
        return $fetchMode !== \PDO::FETCH_ASSOC ? Exceptions::UnsupportedFetchModeException($fetchMode) : $fetchMode;
    }

    /**
     * Checks if the given class exists
     *
     * @param  string $className
     * @return string
     * @throws ClassNotFoundException
     */
    public static function assertClassExists($className) 
    {
        if (!empty($className) && !class_exists($className)) { throw new ClassNotFoundException('Class not found', $className);
        }
    }
}