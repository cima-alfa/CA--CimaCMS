<?php

declare(strict_types=1);

namespace App\Components\Forms;

use App\Components\Forms\Controls\Form;
use App\Contracts\Form as ContractsForm;

abstract class BaseForm implements ContractsForm
{
    public function __construct(private readonly Form $form)
    {
        $this->create($form);
    }

    abstract protected function create(Form $form): void;

    public function get(): Form
    {
        return $this->form;
    }
}
