<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $message;

    // Thêm = null vào sau $message
    public function __construct($message = null) // Thêm = null ở đây
{
    $this->message = $message;
}

    public function render()
    {
        return view('components.alert');
    }
}