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

namespace Circle\DoctrineRestDriver\Tests\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This is a test entity for associations
 *
 * @author    Tobias Hauck <tobias@circle.ai>
 * @copyright 2015 TeeAge-Beatz UG
 *
 * @ORM\Entity
 * @ORM\Table(name="categories")
 */
class AssociatedEntity
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="Circle\DoctrineRestDriver\Tests\Entity\TestEntity")
     */
    protected $product;

    /**
     * returns the id
     *
     * @return int
     */
    public function getId() 
    {
        return $this->id;
    }

    /**
     * sets the id
     *
     * @param  int $id
     * @return TestEntity
     */
    public function setId($id) 
    {
        $this->id = $id;
        return $this;
    }

    /**
     * returns the name
     *
     * @return string
     */
    public function getName() 
    {
        return $this->name;
    }

    /**
     * sets the name
     *
     * @param  string $name
     * @return TestEntity
     */
    public function setName($name) 
    {
        $this->name = $name;
        return $this;
    }
}