<?php namespace Groep02\Recommendations;

use Backend;
use Backend\Models\UserRole;
use Groep02\Recommendations\Models\Recommendation;
use System\Classes\PluginBase;
use Winter\User\Models\User;

/**
 * Recommendations Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Recommendations',
            'description' => '',
            'author'      => 'Groep02',
            'icon'        => 'icon-thumbs-up'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     */
    public function boot()
    {
        $this->ExtendUserModel();
    }

    private function ExtendUserModel()
    {
        User::extend(function ($model) {
            $model->hasMany['recommendations'] = [
                Recommendation::class,
                'table' => 'groep02_user_recommendations',
                'key' => 'user_id',
                'otherKey' => 'recommendation_id'
            ];
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        //return []; // Remove this line to activate

        return [
            'Groep02\Recommendations\Components\Media' => 'Media',
            'Groep02\Recommendations\Components\RecommendationList' => 'Recommendations',
            'Groep02\Recommendations\Components\InterestsForm' => 'InterestsForm',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'groep02.recommendations.some_permission' => [
                'tab' => 'Recommendations',
                'label' => 'Some permission',
                'roles' => [UserRole::CODE_DEVELOPER, UserRole::CODE_PUBLISHER],
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        //return []; // Remove this line to activate

        return [
            'recommendations' => [
                'label'       => 'Manage Media',
                'url'         => Backend::url('groep02/recommendations/mediaItems'),
                'icon'        => 'icon-image',
                'permissions' => ['groep02.recommendations.*'],
                'order'       => 700,
            ],
        ];
    }
}
