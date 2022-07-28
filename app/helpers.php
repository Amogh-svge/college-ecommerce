<?php

use Intervention\Image\Facades\Image;


if (!function_exists('image_crop')) {

    function image_crop($name, $categ_id)
    {
        if (file_exists(storage_path('app/public/images/' . $name))) {
            //resize(width,height)
            if ($categ_id != 6) {
                Image::make(storage_path('app/public/images/' . $name))->resize(520, 380)->save(storage_path('app/public/images/thumbnails/' . $name));
            } else {
                Image::make(storage_path('app/public/images/' . $name))->save(storage_path('app/public/images/thumbnails/' . $name));
            }
        } else {
            echo "does not exist";
        }
    }
}

function category_image_crop($name)
{
    if (file_exists(storage_path('app/public/images/' . $name))) {
        Image::make(storage_path('app/public/images/' . $name))->resize(520, 380)->save(storage_path('app/public/images/thumbnails/' . $name));
    } else {
        echo "does not exist";
    }
}
