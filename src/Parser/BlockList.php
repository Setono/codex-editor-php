<?php

declare(strict_types=1);

namespace Setono\CodexEditor\Parser;

use ArrayIterator;
use IteratorAggregate;
use Setono\CodexEditor\Parser\Block\BlockInterface;

/**
 * @template-implements IteratorAggregate<int, BlockInterface>
 */
final class BlockList implements IteratorAggregate
{
    /** @var list<BlockInterface> */
    private array $blocks = [];

    public function add(BlockInterface $block): void
    {
        $this->blocks[] = $block;
    }

    /**
     * @return ArrayIterator<int, BlockInterface>
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->blocks);
    }
}
