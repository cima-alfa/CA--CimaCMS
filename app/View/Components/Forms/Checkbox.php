<?php

declare(strict_types=1);

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public ?string $label = null,
        public ?string $id = null,
        public string $value = 'on',
        public bool $checked = false
    ) {
        $this->id = $id ??
            str()->random().'-'.
            preg_replace_callback('/[^a-zA-Z0-9_-]/', fn () => str()->random(1), $name);

        $this->value = old($name) ?? $value;
        $this->checked = (bool) (old($name) ?? $checked);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.checkbox');
    }
}
