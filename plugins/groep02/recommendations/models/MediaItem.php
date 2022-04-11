<?php namespace Groep02\Recommendations\Models;

use Model;

/**
 * mediaItem Model
 */
class MediaItem extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'groep02_recommendations_media_items';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = ['tags', 'genre', 'type'];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    public $belongsTo = [
        Recommendation::class
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'cover_image' => 'System\Models\File'
    ];
    public $attachMany = [];

    public function beforeSave()
    {
        $this->genre = explode(',', $this->genre);
        $this->tags = explode(' ,', $this->tags);
    }

    protected function beforeFetch()
    {
        $this->genre = explode(',', $this->genre);
        $this->tags = explode(' ,', $this->tags);
    }

    public function afterFetch()
    {
        $this->genre = implode(',', $this->genre);
        $this->tags = implode(',', $this->tags);
    }

}
