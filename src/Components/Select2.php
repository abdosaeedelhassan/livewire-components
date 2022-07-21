<?php

namespace AsayHome\LivewireComponents\Components;

use Exception;
use Livewire\Component;

use function PHPUnit\Framework\throwException;

class Select2 extends Component
{

    public $componentId;
    public $options;

    public $placeholder;

    public function mount($id = 'selectComponent', $options = [], $placeholder = null)
    {
        $this->componentId = $id;

        if (!is_array($options)) {
            throwException(new Exception(__('Invialid options: options param must be an array.')));
        }

        foreach ($options as $option) {
            if (!isset($option['id']) || !isset($option['text'])) {
                throwException(new Exception(__('Invialid options: each option must contain (id,text) as attributte.')));
            }
        }
        $this->options = json_encode($options);

        if (!$placeholder) {
            $placeholder = __('Select an option');
        }
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('livewire-components::components.select2', [
            'optionsList' => json_decode($this->options)
        ]);
    }
}
