<?php

namespace App\Traits;

trait Alertable
{

    public function question(string $title, string $text)
    {
        session()->flash('alert', [
            'title' => $title,
            'text' => $text,
            'icon' => "question",
        ]);
    }


    public function error(string $title, string $text)
    {
        session()->flash('alert', [
            'title' => $title,
            'text' => $text,
            'icon' => "error",
        ]);
    }


    public function info(string $title, string $text)
    {
        session()->flash('alert', [
            'title' => $title,
            'text' => $text,
            'icon' => "info",
        ]);
    }


    public function success(string $title, string $text)
    {
        session()->flash('alert', [
            'title' => $title,
            'text' => $text,
            'icon' => "success",
        ]);
    }

}