<?php

declare(strict_types=1);

namespace App\Components\Forms\Controls;

use App\Components\Forms\Controls\Fields\Input;

trait Fields
{
    public function addInput(string $name, string $type, mixed $defaultValue = null): Input
    {
        $input = new Input($name, $type);
        $input->setValue($defaultValue);

        return $input;
    }

    public function addText(string $name, mixed $defaultValue = null): Input
    {
        return $this->addInput($name, 'text', $defaultValue);
    }
}
