<?php

namespace App\Http\Resources\Control;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * TODO: Deprecated!!!
 *
 * Class SeoEditResource
 * @package App\Http\Resources\Control
 */
class SeoEditResource extends JsonResource
{
    /** @var array */
    protected $defaults = [];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->prepareResult([
            'id' => $this->id,
            'title' => $this->title ?? '',
            'description' => $this->description ?? '',
            'keywords' => $this->keywords ?? '',
            'robots' => $this->robots === 'noindex' ? false : true,
        ]);
    }

    /**
     * @param array $rawValues
     * @return array
     */
    protected function prepareResult(array $rawValues = []): array
    {
        $notEmptyValues = array_filter($rawValues, function ($value) {
            if ($value !== null || $value !== '') {
                return $value;
            }
        });

        $defaultValues = $this->getDefaults();

        $allValues = array_merge($rawValues, $defaultValues, $notEmptyValues);

        $allowedTags = array_flip(array_keys(config('meta-tags.available')));

        return array_intersect_key($allValues, $allowedTags);
    }

    /**
     * @return array
     */
    public function getDefaults(): array
    {
        return $this->defaults;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setDefaults(array $data = [])
    {
        $this->defaults = $data;

        return $this;
    }
}
