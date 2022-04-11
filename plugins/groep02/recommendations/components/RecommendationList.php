<?php namespace Groep02\Recommendations\Components;

use Cms\Classes\ComponentBase;
use Groep02\Recommendations\Models\Interest;
use Groep02\Recommendations\Models\MediaItem;
use phpDocumentor\Reflection\Types\Collection;
use Winter\User\Facades\Auth;

class RecommendationList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Recommendation List',
            'description' => 'List of recommended media for the current user',
            'icon' => 'icon-thumbs-up',
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->page['recommendations'] = $this->getRecommendationsFromUser(Auth::getUser());
    }

    private function getRecommendationsFromUser($currentUser)
    {
        $recommendations = [];

        $userInterests = Interest::where('user_id', $currentUser->id)->first()->toArray();


        foreach ($userInterests['type'] as $type) {
            foreach ($userInterests['genre'] as $genre) {
                foreach ($userInterests['tags'] as $tag) {
                    array_push($recommendations, MediaItem::where('type', 'like', '%' . $type . '%')
                        ->orWhere('genre', 'like', '%' . $genre . '%')
                        ->orWhere('tags', 'like', '%' . $tag . '%')
                        ->select('*')
                        ->get()
                    );
                }
            }
        }

        //var_dump($userInterests['genre']);

//        MediaItem::whereJsonContains('genre', $userInterests['genre'])
//            ->orWhereJsonContains('tags', $userInterests['tags'])
//            ->orWhereJsonContains('type', $userInterests['type'])
//            ->get();

        //return $recommendations->unique;

        return $recommendations[count($recommendations) - 1]->unique();
    }
}
