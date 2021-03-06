<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $guarded = [];
    public $fillable = ['Name', 'Slug', 'Description', 'Breed', 'Vaccinated', 'Species', 'Age', 'Sex', 'Neutered', 'Status', 'CertifiedPedigree', 'Thumbnails'];

    protected static $link = 'https://res.cloudinary.com/dwarrion/image/upload/';

    public function Reports()
    {
        return $this->belongsToMany(Report::class);
    }

    public function News()
    {
        return $this->belongsToMany(News::class, 'pet_new', 'Pet_id', 'New_id');
    }


    public function timelines()
    {
        return $this->hasMany(Timeline::class, "PetID", 'id')->orderBy('Date');
    }

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
            return self::$link . 'c_scale,h_800,w_800/' . $thumbnailValue[0];
        }
    }

    public function getLinkThumbnailAttribute($id_thumbnail)
    {
        return $id_thumbnail . self::$link;
    }
}
