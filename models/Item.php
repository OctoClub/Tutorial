<?php namespace OctoClub\Tutorial\Models;

use Model;

/**
 * Item Model
 */
class Item extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'octoclub_tutorial_items';

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'category' => ['OctoClub\Tutorial\Models\Category']
    ];
}
