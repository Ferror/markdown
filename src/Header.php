<?php
declare(strict_types=1);

namespace Ferror\SymfonyPackage;

use JsonSerializable;

final class Header implements Element, JsonSerializable
{
    private string $content;
    private int $level;

    public function __construct(int $level, string $content)
    {
        $this->content = $content;
        $this->level = $level;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'header',
            'level' => $this->level,
            'content' => $this->content,
        ];
    }
}
