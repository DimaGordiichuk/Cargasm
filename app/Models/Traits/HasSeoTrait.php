<?php


namespace App\Models\Traits;


use Fomvasss\LaravelMetaTags\Traits\Metatagable;

trait HasSeoTrait
{
    use Metatagable;

    protected static function bootHasSeoTrait()
    {
        self::deleting(function ($model) {
            $model->seo()->delete();
        });
//        self::created(function ($model) {
//            $model->seo()->create();
//        });
    }

//    public function seo()
//    {
//        return $this->metaTag();
//    }
}
