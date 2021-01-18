<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";

    protected $guarded = [];
    public $fillable = ['Name', 'Slug', 'Thumbnails', 'Content', 'Title', 'Author', 'Status', 'Category_id'];

    protected static $link = 'https://res.cloudinary.com/dwarrion/image/upload/';

    public function getArrayThumbnails450x450Attribute()
    {
        if ($this->Thumbnails == null || strlen($this->Thumbnails) == 0) {
            return array('PetCasa/noimages_aaqvrt_opnyoy.png');
        }
        $list_photos = array();
        $single_thumb = explode(',', $this->Thumbnails);
        foreach ($single_thumb as $single) {
            if (strlen($single) > 0) {
                array_push($list_photos, self::$link . $single);
            }
        }
        return $list_photos;
    }

    public function getArrayThumbnailsAttribute()
    {
        if ($this->Thumbnails == null || strlen($this->Thumbnails) == 0) {
            return array('PetCasa/noimages_aaqvrt_opnyoy.png');
        }
        $list_photos = array();
        $single_thumb = explode(',', $this->Thumbnails);
        foreach ($single_thumb as $single) {
            if (strlen($single) > 0) {
                array_push($list_photos, $single);
            }
        }
        return $list_photos;
    }

    public function getFirstThumbnailAttribute()
    {
        $thumbnail[] = explode(',', $this->Thumbnails);

        foreach ($thumbnail as $thumbnailValue) {
            return self::$link . 'c_scale,h_450,w_450/' . $thumbnailValue[0];
        }
    }

    public function getFirstThumbnail800x500Attribute()
    {
        $thumbnail[] = explode(',', $this->Thumbnails);
        foreach ($thumbnail as $thumbnailValue) {
            return self::$link . 'c_scale,h_800,w_500/' . $thumbnailValue[0];
        }
    }

    public function getLastThumbnailAttribute()
    {
        $thumbnail[] = explode(',', $this->Thumbnails);
        foreach ($thumbnail as $thumbnailValue) {
            $last = count($thumbnailValue);
            return self::$link . 'c_scale,h_450,w_450/' . $thumbnailValue[$last - 1];
        }
    }

    public function Pets()
    {
        return $this->belongsToMany(Pet::class, 'pet_new', 'new_id', 'pet_id')->withTimestamps();
    }

    public function Category()
    {
        return $this->belongsTo(Category::class, 'Category_id', 'id');
    }
}
