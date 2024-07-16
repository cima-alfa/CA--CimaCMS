<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Components\Forms\Controls\Form as ControlsForm;

interface Form
{
    public function get(): ControlsForm;
}
