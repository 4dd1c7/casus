<?php namespace Groep02\Recommendations\Components;

use Cms\Classes\ComponentBase;
use Groep02\Recommendations\Models\MediaItem;

class Media extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Media Detail',
            'description' => 'Page with media details'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->page['mediaItem'] = $this->getDetailsFromMediaItem();
    }

    public function getDetailsFromMediaItem()
    {
        return MediaItem::where('id', '=', $this->param('id'))->first();
    }
}
