<?php
declare(strict_types=1);

namespace Ferror\SymfonyPackage\Header;

use Ferror\SymfonyPackage\Header;

final class Factory
{
    public function create(string $message): Header
    {
        $numberOfHash = substr_count($message, '#');

        return new Header($numberOfHash, substr_replace($message, substr($message, $numberOfHash + 1), 0));
    }
}
