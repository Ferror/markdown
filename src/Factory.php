<?php
declare(strict_types=1);

namespace Ferror\SymfonyPackage;

final class Factory
{
    public function create(string $message): Element
    {
        return new Header();
    }
}
