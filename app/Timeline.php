<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    public $fillable = ['PetID', 'Content', 'Date', 'Image'];

    protected static $link = 'https://res.cloudinary.com/dwarrion/image/upload/';

    public function getArrayThumbnails450x450Attribute()
    {
        if ($this->Image == null || strlen($this->Image) == 0) {
            return array('PetCasa/noimages_aaqvrt_opnyoy.png');
        }
        $list_photos = array();
        $single_thumb = explode(',', $this->Image);
        foreach ($single_thumb as $single) {
            if (strlen($single) > 0) {
                array_push($list_photos, self::$link . $single);
            }
        }
        return $list_photos;
    }

    public function getArrayThumbnailsAttribute()
    {
        if ($this->Image == null || strlen($this->Image) == 0) {
            return array('PetCasa/noimages_aaqvrt_opnyoy.png');
        }
        $list_photos = array();
        $single_thumb = explode(',', $this->Image);
        foreach ($single_thumb as $single) {
            if (strlen($single) > 0) {
                array_push($list_photos, $single);
            }
        }
        return $list_photos;
    }

    public function getFirstThumbnailAttribute()
    {
        $thumbnail[] = explode(',', $this->Image);
        foreach ($thumbnail as $thumbnailValue) {
            return self::$link . 'c_scale,h_800,w_800/' . $thumbnailValue[0];
        }
    }

    public function getLinkThumbnailAttribute($id_thumbnail)
    {
        return $id_thumbnail . self::$link;
    }
}
