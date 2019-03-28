<?php namespace OctoClub\Tutorial\Components;

use Cms\Classes\ComponentBase;

class Catalog extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Catalog Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'items' => [
                'title'       => 'Количество',
                'description' => 'Определяет количество предметов на одной странице',
                'default'     => '10',
            ],
        ];
    }

    public function onRun()
    {
        $this->page['items'] = \OctoClub\Tutorial\Models\Item::paginate($this->property('items'));
        $this->page['categories'] = \OctoClub\Tutorial\Models\Category::get();
    }
}
