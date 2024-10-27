<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\LayoutNotFoundExcepttion;
use App\Exceptions\ViewNotFoundExcepttion;

class View
{
    public function __construct(
        protected string $view,
        protected array $params = []
    ) {
    }

    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    }

    public function render(): string
    {
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';
        $layoutPath = VIEW_PATH . '/layout.php';

        if (! file_exists($viewPath)) {
            throw new ViewNotFoundExcepttion();
        }
        if (! file_exists($layoutPath)) {
            throw new LayoutNotFoundExcepttion();
        }

        foreach ($this->params as $key => $value) {
            $$key = $value;
        }

        // render view
        ob_start();
        include $viewPath;
        $content = ob_get_clean();

        //render layout
        ob_start();
        include $layoutPath;

        return str_replace("{{content}}", $content, ob_get_clean());
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }
}
