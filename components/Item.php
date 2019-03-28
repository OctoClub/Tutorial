<?php namespace OctoClub\Tutorial\Components;

use Cms\Classes\ComponentBase;

class Item extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Item Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'slugCategory' => [
                'title'       => 'Ссылка категории',
                'default'     => '{{ :category }}',
            ],
            'slugItem' => [
                'title'       => 'Ссылка предмета',
                'default'     => '{{ :item }}',
            ]
        ];
    }

    public function onRun()
    {
        $category = \OctoClub\Tutorial\Models\Category::where('slug', $this->property('slugCategory'))->first();

        if (empty($category)){
            return $this->controller->run('404');
        }

        $item = \OctoClub\Tutorial\Models\Item::where('category_id', $category->id)->where('slug', $this->property('slugItem'))->first();

        if (empty($item)){
            return $this->controller->run('404');
        }

        $this->page['item'] = $item;
    }
}
