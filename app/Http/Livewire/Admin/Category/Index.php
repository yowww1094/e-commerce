<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;


class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function render()
    {
        $categories = Category::orderBy('id', 'ASC')->paginate(10);
        return view('livewire.admin.category.index', [
            'categories' => $categories,
        ]);
    }

    public function deleteCategory($category_id)    
    {
        $this->category_id = $category_id;
    }

    public function destroyCategory()
    {
        $category = Category::find($this->category_id);
        
        if(File::exists($category->image))
        {
            File::delete($category->image);
        }
        $category->delete();
        session()->flash('message', 'Category Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }
}
