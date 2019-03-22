<?php
namespace App\Traits;

trait ErrorTraits
{
    public function customErrorFormat($error,$pointer,$title,$detail){
        return [
            'jsonapi' => [
                'version' => env('APP_VERSION_API'),
            ],
            'errors' =>[
                'status' => $error,
                'source' => ["pointer"=>$pointer ],
                "title"=> $title,
                'detail' => $detail,
            ]
        ];

    }
}
