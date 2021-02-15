<?php
declare(strict_types=1);

namespace Ferror\SymfonyPackage;

final class Factory
{
    private Header\Factory $factory;

    public function __construct(Header\Factory $factory)
    {
        $this->factory = $factory;
    }

    public function create(string $message): Element
    {
        if ($this->str_starts_with($message, '*')) {
            return new Lists();
        }

        if ($this->str_starts_with($message, '#')) {
            return $this->factory->create($message);
        }

        return new Paragraph($message);
    }

    //Change this function to str_starts_with in PHP 8.0
    private function str_starts_with($haystack, $needle): bool
    {
        return strpos($haystack, $needle) === 0;
    }
}
