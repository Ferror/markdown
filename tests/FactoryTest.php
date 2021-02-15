<?php
declare(strict_types=1);

namespace Ferror\SymfonyPackage;

use Ferror\SymfonyPackage\Header\Factory as HeaderFactory;
use PHPUnit\Framework\TestCase;

final class FactoryTest extends TestCase
{
    private Factory $factory;

    protected function setUp(): void
    {
        $this->factory = new Factory(new HeaderFactory());
        parent::setUp();
    }

    public function testItIsHeader(): void
    {
        self::assertInstanceOf(Header::class, $this->factory->create('# Top Level Header'));
        self::assertInstanceOf(Header::class, $this->factory->create('## Second Level Header'));
        self::assertInstanceOf(Header::class, $this->factory->create('### Level Header'));
        self::assertInstanceOf(Header::class, $this->factory->create('#### Level Header'));
        self::assertInstanceOf(Header::class, $this->factory->create('##### Level Header'));
        self::assertInstanceOf(Header::class, $this->factory->create('###### Level Header'));
    }

    public function testItIsList(): void
    {
        self::assertInstanceOf(Lists::class, $this->factory->create('* Item'));
    }
}
