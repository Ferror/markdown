<?php
declare(strict_types=1);

namespace Ferror\SymfonyPackage;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class FactoryTest extends TestCase
{
    private Factory $factory;

    protected function setUp(): void
    {
        $this->factory = new Factory();
        parent::setUp();
    }

    public function testItIsHeader(): void
    {
        self::assertInstanceOf(Header::class, $this->factory->create('# Top Level Header'));
        self::assertInstanceOf(Header::class, $this->factory->create('## Second Level Header'));
    }

    public function testItIsList(): void
    {
        self::assertInstanceOf(Lists::class, $this->factory->create('* Item'));
    }

    public function testItCannotConvertString(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->factory->create('$$');
    }
}
