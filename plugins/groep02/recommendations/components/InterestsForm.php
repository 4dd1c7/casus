<?php namespace Groep02\Recommendations\Components;

use Backend\Models\User;
use Cms\Classes\ComponentBase;
use Groep02\Recommendations\Models\Interest;
use Winter\Storm\Database\Model;
use Winter\Storm\Support\Facades\Input;
use Winter\User\Facades\Auth;

class InterestsForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Interests Form',
            'description' => 'Form for the user to set their interests'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->page['userInterests'] = $this->getInterestsFromUser(Auth::getUser());
    }

    private function getInterestsFromUser($currentUser)
    {
        return Interest::where('user_id', $currentUser->id)->first();
    }

    public function onSubmitForm()
    {
        $user = Auth::getUser();

        $interest = Interest::where('user_id', $user->id)->first();
        if(!$interest){
            $interest = new Interest();
            $interest->user_id = $user->id;
        } else {
            $interest = Interest::where('user_id', $user->id)->first();
        }

        $formValues = Input::all();

        $interest->type = explode(',', $formValues['media_types']);
        $interest->genre = explode(',', $formValues['media_genres']);
        $interest->tags = explode(',', $formValues['media_tags']);

        $interest->save();

        return redirect()->back();
    }
}
