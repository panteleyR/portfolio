<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Application\Command\Article;

use App\Core\Application\Command\Article\UpdateArticleCommand;
use PHPUnit\Framework\TestCase;

class UpdateArticleCommandTest extends TestCase
{
    public function testConstruct(): void
    {
        $id = '1';
        $data = [
            'title' => 'Db transaction edited',
            'description' => 'Description',
            'text' => 'text text text',
            'id' => '1',
        ];
        $command = new UpdateArticleCommand($id, $data);
        $this->assertEquals($id, $command->getId());
        $this->assertEquals($data, $command->getData());
    }
}
