<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;



class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const CATEGORY_ID = 'category_id';

    protected function getCallbacks(): array {
        return [
            self::TITLE => [$this, 'title'],
            self::CATEGORY_ID => [$this, 'category_id']
        ];
    }

    public function title(Builder $builder, $value){
        $builder->where('title', 'like', "%{$value}%");
    }

    public function category_id(Builder $builder, $value){
        $builder->where('category_id', $value);
    }
}