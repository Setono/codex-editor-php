<?php

declare(strict_types=1);

namespace Setono\CodexEditor\Parser\Block;

use Webmozart\Assert\Assert;

class GenericBlock implements BlockInterface
{
    private string $id;

    private string $type;

    private array $data;

    public function __construct(string $id, string $type, array $data)
    {
        $this->id = $id;
        $this->type = $type;
        $this->data = $data;
    }

    public static function createFromData(array $data): self
    {
        self::validate($data);

        return new self($data['id'], $data['type'], $data);
    }

    /**
     * This makes it easier to create concrete block classes together with the GenericBlockParser.
     * See for example DelimiterBlock
     */
    public static function createFromBlock(BlockInterface $block): BlockInterface
    {
        return $block;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @psalm-assert array{id: string, type: string, data: array} $data
     */
    protected static function validate(array $data): void
    {
        Assert::keyExists($data, 'id');
        Assert::string($data['id']);

        Assert::keyExists($data, 'type');
        Assert::string($data['type']);

        Assert::keyExists($data, 'data');
        Assert::isArray($data['data']);
    }
}
