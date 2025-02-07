<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
  public const TITLE = 'title';
  public const CONTENT = 'content';
  public const CATEGORY_ID = 'category_id';


  protected function getCallbacks(): array
  {
    return [
      self::TITLE => [$this, 'title'],
      self::CONTENT => [$this, 'content'],
      self::CATEGORY_ID => [$this, 'categoryId'],
    ];
  }

  public function title(Builder $builder, $value)
  {
    $builder->where('title', 'like', "%{$value}%");
  }

  public function content(Builder $builder, $value)
  {
    $builder->where('content', 'like', "%{$value}%");
  }

  public function categoryId(Builder $builder, $value)
  {
    $builder->where('category_id', $value);
  }

  protected function before(Builder $builder)
  {
    $sortBy = $this->getQueryParam('sort_by', 'updated_at'); // По умолчанию сортируем по updated_at
    $sortOrder = $this->getQueryParam('sort_order', 'asc'); // По умолчанию сортируем по возрастанию

    if ($sortBy === 'updated_at') {
      $builder->orderByRaw('COALESCE(updated_at, created_at) ' . $sortOrder);
    } else {
      $builder->orderBy($sortBy, $sortOrder);
    }
  }
}
