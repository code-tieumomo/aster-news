<?php

namespace App\Orchid\Layouts\BaseUrl;

use App\View\Components\BaseUrlLog;
use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Facades\Layout;

class BaseUrlLogLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            
        ];
    }
}
