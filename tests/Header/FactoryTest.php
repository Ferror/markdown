<?php
declare(strict_types=1);

namespace Ferror\SymfonyPackage\Header;

use PHPUnit\Framework\TestCase;

final class FactoryTest extends TestCase
{
    private Factory $factory;

    protected function setUp(): void
    {
        $this->factory = new Factory();
        parent::setUp();
    }

    /**
     * @dataProvider provider
     */
    public function testItCreatesHeader(int $level, string $content, string $message): void
    {
        $tag = $this->factory->create($message)->jsonSerialize();

        self::assertEquals($level, $tag['level']);
        self::assertEquals('header', $tag['type']);
        self::assertEquals($content, $tag['content']);
    }

    public function provider(): array
    {
        return [
            [1, 'Top Level Header', '# Top Level Header'],
            [2, 'Second Level Header', '## Second Level Header'],
            [3, 'Level Header', '### Level Header'],
            [4, 'Level Header', '#### Level Header'],
            [5, 'Level Header', '##### Level Header'],
            [6, 'Level Header', '###### Level Header'],
        ];
    }

    public function testItCreatesHeaderFromFile(): void
    {
        $file = fopen(dirname(__DIR__) . '/Resources/header.md', 'rb');

        while (!feof($file)) {
            $line = fgets($file);

            if ($line !== false) {
                $this->factory->create($line)->jsonSerialize();
            }
        }

        fclose($file);
    }
}
