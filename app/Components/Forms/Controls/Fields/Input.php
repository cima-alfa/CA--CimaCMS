<?php

declare(strict_types=1);

namespace App\Components\Forms\Controls\Fields;

class Input
{
    private mixed $value = null;

    public function __construct(private string $name, private string $type) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setValue($value): static
    {
        $this->value = null;

        return $this;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }
}
