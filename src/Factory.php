<?php
declare(strict_types=1);

namespace Ferror\SymfonyPackage;

use InvalidArgumentException;

final class Factory
{
    public function create(string $message): Element
    {
        if ($this->str_starts_with($message, '*')) {
            return new Lists();
        }

        if ($this->str_starts_with($message, '#')) {
            return new Header($message);
        }

        throw new InvalidArgumentException('Could not convert message: ' . $message);
    }

    //Change this function to str_starts_with in PHP 8.0
    private function str_starts_with($haystack, $needle): bool
    {
        return strpos($haystack, $needle) === 0;
    }
}
