<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

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
        public ?string $route = null
    )
    {
        $this->method = $method = strtoupper($method);

        $methodsGet = [
            'HEAD'
        ];

        $methodsPost = [
            'PUT',
            'PATCH',
            'DELETE'
        ];
        
        if (in_array($method, $methodsGet)) {
            $this->methodSpoof = $method;
            $this->method = 'GET';
        }

        if (in_array($method, $methodsPost)) {
            $this->methodSpoof = $method;
            $this->method = 'POST';
        }

        if ($route) {
            $route = explode(',', trim($route, ','));
            $route = $parameters = array_map(fn ($value) => trim($value), $route);
            
            unset($parameters[0]);

            $parametersNormalized = [];

            foreach ($parameters as $key => &$parameter) {
                $parameter = explode(':', $parameter, 2);
                $parameter = array_map(fn ($value) => trim($value), $parameter);

                $parametersNormalized[$parameter[0]] = $parameter[1] ?? '';
            }

            unset($parameter);

            $this->action = rroute($route[0], $parametersNormalized);
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
