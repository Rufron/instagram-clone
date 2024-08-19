<?php

namespace App\Livewire\Post;

use Livewire\Features\SupportFileUploads\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Termwind\Components\Dd;

class Create extends ModalComponent
{
    use WithFileUploads;

    public $media=[];
    public $description;
    public $location;
    public $hide_like_view;
    public $allow_commenting;

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }

    function submit() {
        dd([
            $this->media,
            $this->description,
            $this->location,
            $this->hide_like_view,
            $this->allow_commenting,
        ]);
    }

    public function render()
    {
        return view('livewire.post.create');
    }
}
