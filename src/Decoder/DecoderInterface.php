<?php

declare(strict_types=1);

namespace Setono\CodexEditor\Decoder;

interface DecoderInterface
{
    /**
     * Takes a Codex Editor data string and decodes it into an array
     */
    public function decode(string $data): array;
}
