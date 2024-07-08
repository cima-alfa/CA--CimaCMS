<?php

namespace App\View\Components\Forms;

use App\Contracts\Form as ContractsForm;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Form extends Component
{
    public ?string $methodSpoof = null;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $method = "GET",
        public bool $csrf = false,
        public ?string $action = null,
        public ?string $route = null,
        public bool $upload = false,
        ?ContractsForm $form = null
    )
    {
        if (!$form) {
            $this->setAction();
            $this->setMethod();

            return;
        }

        $form = $form->get();

        $this->method = $form->method;
        $this->csrf = $form->csrf;
        $this->action = $form->action;
        $this->upload = $form->upload;

        $this->setMethod();
    }

    private function setMethod(): void {
        $this->method = strtoupper($this->method);

        $methodsGet = [
            'HEAD'
        ];

        $methodsPost = [
            'PUT',
            'PATCH',
            'DELETE'
        ];
        
        if (in_array($this->method, $methodsGet)) {
            $this->methodSpoof = $this->method;
            $this->method = 'GET';

            return;
        }

        if (in_array($this->method, $methodsPost)) {
            $this->methodSpoof = $this->method;
            $this->method = 'POST';

            return;
        }
    }

    private function setAction(): void {
        if ($this->route) {
            $route = explode(',', trim($this->route, ','));
            $route = $parameters = array_map(fn ($value) => trim($value), $route);
            
            unset($parameters[0]);

            $parametersNormalized = [];

            foreach ($parameters as $parameter) {
                $parameter = explode(':', $parameter, 2);
                $parameter = array_map(fn ($value) => trim($value), $parameter);

                $parametersNormalized[$parameter[0]] = $parameter[1] ?? '';
            }

            $this->action = route($route[0], $parametersNormalized);
        }

        if (!$this->action) {
            $this->action = url()->current();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.form');
    }
}
