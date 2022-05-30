<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\DB\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="Article")
 * @ORM\Entity()
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint", nullable=false, options={"unsigned": true})
     */
    protected string $id;

    /**
     * @ORM\Column(type="string")
     */
    private string $title;

    /**
     * @ORM\Column(type="string", length=2048)
     */
    private string $description;

    /**
     * @ORM\Column(type="text")
     */
    private string $text;

    /**
     * @ORM\Column(name="createdAt", type="datetime")
     */
    protected DateTime $createdAt;

    /**
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    protected DateTime $updatedAt;
}
