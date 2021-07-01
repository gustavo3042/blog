<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Navigation2 extends Component
{
    public function render()
    {

      $categories = Category::all();
        return view('livewire.navigation2',compact('categories'));
    }
}
