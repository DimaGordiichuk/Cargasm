<?php

namespace App\Http\Resources\Control;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->url,
            'region' => $this->region,
            'sub_region' => $this->sub_region,
            'weight' => $this->weight,
            'target' => $this->target ?? '',
            'lang' => $this->lang,
            'is_active' => $this->is_active,
            //'translation_uuid' => $this->translation_uuid,
            'photo' => new MediaResource($this->whenLoaded('media', function () {
                return $this->getFirstMedia('photo');
            })),
//            'image_url' => $this->when($this->relationLoaded('media'), function () {
//                return $this->getMyFirstMediaUrl('image');
//            }),
        ];
    }
}
