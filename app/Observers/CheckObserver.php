<?php

namespace App\Observers;

use App\Models\CheckList;

use Illuminate\Support\Facades\Storage;

class CheckObserver
{



    public function creating(CheckList $check)
    {

        if (! \App::runningInConsole()) {

$check->user_id = auth()->user()->id;


        }


    }




    public function deleting(CheckList $check)
    {


if ($check->image) {

Storage::delete($check->image->url);


}

    }


}
