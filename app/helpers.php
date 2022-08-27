<?php

function upload_image_to_cloud($requestField, $width, $height){
    $compressedImage = cloudinary()->upload($requestField, [
        'folder' => 'image',
        'transformation' => [
            'width' => $width,
            'height' => $height,
            'crop' => 'limit',
            'quality' => 'auto',
            'fetch_format' => 'auto'
        ]
    ])->getSecurePath();

    return $compressedImage;
}