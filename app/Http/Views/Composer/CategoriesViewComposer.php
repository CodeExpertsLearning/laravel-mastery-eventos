<?php
namespace App\Http\Views\Composer;

use App\Models\Category;

class CategoriesViewComposer
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function compose($view)
    {
        return $view->with('categories', $this->category->all(['name', 'slug']));
    }
}
