<?php

namespace App\Heads;

class Head
{
    public $forIndex;
    public $title;
    public $data;
    public $type;
    public $col;
    public $required;
    public $readonly;
    public $options;

    public function __construct(
        bool $forIndex = false,
        string $title = "",
        string $data,
        string $type,
        string $col,
        bool $required,
        bool $readonly,
        array $options,

    ) {
        $this->forIndex = $forIndex;
        $this->title = $title;
        $this->data = $data;
        $this->type = $type;
        $this->col = $col;
        $this->required = $required;
        $this->readonly = $readonly;
        $this->options = $options;
    }

    public static function make(
        $title,
        $data,
        $type = 'text',
        $col = 'col-12',
        $required = false,
        $readonly = false,
        $forIndex = false,
        $options = [],
    ) {
        return new self(
            forIndex: $forIndex,
            title: $title,
            data: $data,
            type: $type,
            col: $col,
            required: $required,
            readonly: $readonly,
            options: $options,
        );
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getReadonly()
    {
        return $this->readonly;
    }

    public function getRequired()
    {
        return $this->required;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function getCol()
    {
        return $this->col;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getForIndex()
    {
        return $this->forIndex;
    }
}
