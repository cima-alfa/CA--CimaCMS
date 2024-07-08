<?php

namespace App\Components\Forms\Controls;

/**
 * @property string $method
 * @property bool $csrf
 * @property ?string $action
 * @property bool $upload
 */

final class Form
{
    private string $method = 'GET';
    private bool $csrf = false;
    private ?string $action = null;
    private bool $upload = false;

    public function setMethod(string $method): static {
        $this->method = strtoupper($method);

        $methodsPost = [
            'POST',
            'PUT',
            'PATCH',
            'DELETE'
        ];

        if (in_array($this->method, $methodsPost)) {
            $this->setCsrf(true);
        }
        
        return $this;
    }

    public function setCsrf(bool $csrf = true): static {
        $this->csrf = $csrf;

        return $this;
    }

    public function setAction(?string $url): static {
        $this->action = $url;
        
        return $this;
    }

    private function getAction(): string {
        return $this->action ? $this->action : url()->current();
    }

    public function setUpload(bool $upload = true): static {
        $this->upload = $upload;

        return $this;
    }

    public function __get(string $name)
    {
        if ($name == 'action') {
            return $this->getAction();
        }

        return $this->{$name};
    }
}
