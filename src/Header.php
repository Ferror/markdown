<?php
declare(strict_types=1);

namespace Ferror\SymfonyPackage;

use JsonSerializable;

final class Header implements Element, JsonSerializable
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'header',
            'level' => 1,
            'content' => $this->content,
        ];
    }
}
