<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
//use Backpack\CRUD\ModelTraits\SpatieTranslatable\Sluggable;
//use Backpack\CRUD\ModelTraits\SpatieTranslatable\SluggableScopeHelpers;
use Backpack\CRUD\ModelTraits\SpatieTranslatable\HasTranslations;


class Course extends Model
{
    use CrudTrait;
    use Sluggable;
    use HasTranslations;
    
    /*
   |--------------------------------------------------------------------------
   | GLOBAL VARIABLES
   |--------------------------------------------------------------------------
   */
    
    protected $table = 'courses';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = [
        'slug',
        'title',
        'image',
        'orientation',
        'duration',
        'ects',
        'ratio',
        'evaluation',
        'bloc',
        'quadrimester',
        'shortdescription',
        'description',
        'objectives',
        'extras'
    ];
    // protected $hidden = [];
    // protected $dates = [];
    protected $fakeColumns = ['extras'];
    protected $translatable = ['title', 'ratio', 'evaluation', 'quadrimester', 'shortdescription', 'description', 'objectives'];
    
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_title',
            ],
        ];
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function getPageLink()
    {
        return url(trans('url.course') . '/' . $this->slug);
    }
    
    public function getOpenButton()
    {
        return '<a class="btn btn-default btn-xs" href="'.$this->getPageLink().'" target="_blank"><i class="fa fa-eye"></i> Visualiser</a>';
    }
    
    public function getOrientation($course)
    {
        switch ($course->orientation) {
            case 'all':
                echo 'Commun';
                break;
            case '2D':
                echo 'Design graphique';
                break;
            case '3D':
                echo '3D/Vidéo';
                break;
            case 'web':
                echo 'Web';
                break;
        }
    }
    
    public function getImageCourse($suffix)
    {
        $basePath = 'uploads/cours/';
        $fullname = pathinfo($this->image, PATHINFO_FILENAME);
        $imageCourse = $basePath . $fullname . $suffix;
        
        if (file_exists($imageCourse)) {
            return URL('/') . '/' . $imageCourse;
        } else {
            return $this->image;
        }
    }
    
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    
    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher');
    }
    
    
    
    
    
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    
    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    
    // The slug is created automatically from the "title" field if no slug exists.
    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }
        
        return $this->title;
    }
    
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    
    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public_folder";
        $destination_path = "uploads/cours";
    
        // TODO : A supprimer, utilisé uniquement pour le seeding.
        if (starts_with($value, 'http://'))
        {
            $this->attributes[$attribute_name] = $value;
        }
        
        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->image);
            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }
        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            // 0. Make the image
            $image = \Image::make($value)->fit(360, 417);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = Url('/') . '/' . $destination_path.'/'.$filename;
        }
    }
    
}
