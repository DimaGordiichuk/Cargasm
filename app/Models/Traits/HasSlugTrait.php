<?php


namespace App\Models\Traits;


use Illuminate\Database\Eloquent\Model;

trait HasSlugTrait
{
    //public static $slugSourceFields = ['name'];

    protected static function bootHasSlugTrait()
    {
        static::created(function ($model) {
            if (empty($model->slug)) {
                if (property_exists(static::class, 'slugSourceFields') && !empty(static::$slugSourceFields)) {
                    $str = implode('-', $model->only(static::$slugSourceFields));
                    $model->slug = static::slugGenerate($str, $model);
                    $model->save();
                }
            }
        });
    }


    public static function slugGenerate(string $rawStr, $model = null)
    {
        $model = $model ?: new static();

        return app(\App\Helpers\UrlSlugGenerator::class)->slugGet($model, $rawStr);
    }
}
