<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileInput extends Component
{
    public $id;
    public $name;
    public $label;
    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @param string $id
     * @param string $name
     * @param string $label
     * @param string $placeholder
     */
    public function __construct($id, $name, $label, $placeholder = 'Choose a file...')
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.file-input');
    }
}
