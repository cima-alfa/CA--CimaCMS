<?php

namespace App\Contracts;

use App\Components\Forms\Controls\Form as ControlsForm;

interface Form 
{
    public function get(): ControlsForm;
}