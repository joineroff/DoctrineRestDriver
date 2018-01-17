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

namespace Circle\DoctrineRestDriver\Types;

use Circle\DoctrineRestDriver\Validation\Exceptions\NotNilException;
use Symfony\Component\Config\Definition\Exception\InvalidTypeException;

/**
 * SqlQuery type
 *
 * @author    Tobias Hauck <tobias@circle.ai>
 * @copyright 2015 TeeAge-Beatz UG
 */
class SqlQuery
{

    /**
     * replaces param placeholders with corresponding params
     *
     * @param  string $query
     * @param  array  $params
     * @return string
     * @throws InvalidTypeException
     * @throws NotNilException
     *
     * @SuppressWarnings("PHPMD.StaticAccess")
     */
    public static function setParams($query, array $params = [])
    {
        Str::assert($query, 'query');

        return array_reduce(
            $params,
            function ($query, $param) {
                return strpos($query, '?') ? substr_replace($query, $param, strpos($query, '?'), strlen('?')) : $query;
            },
            $query
        );
    }

    /**
     * quotes the table if it's an url
     *
     * @param  string $query
     * @return string
     * @throws InvalidTypeException
     * @throws NotNilException
     *
     * @SuppressWarnings("PHPMD.StaticAccess")
     */
    public static function quoteUrl($query)
    {
        $queryParts = explode(' ', Str::assert($query, 'query'));

        return trim(
            array_reduce(
                $queryParts,
                function ($carry, $part) {
                    return $carry . (Url::is($part) ? ('"' . $part . '" ') : ($part . ' '));
                }
            )
        );
    }
}
