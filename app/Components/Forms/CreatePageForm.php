<?php

namespace App\Components\Forms;

use App\Components\Forms\Controls\Form;

class CreatePageForm extends BaseForm
{
    protected function create(Form $form): void {
        $form->setMethod('post');
        $form->setAction(route('admin.pages.store'));
    }
}
