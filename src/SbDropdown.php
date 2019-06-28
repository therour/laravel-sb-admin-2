<?php

namespace Therour\SbAdmin2;

use Therour\SbAdmin2\SbMenu;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class SbDropdown extends SbMenu
{
    /**
     * children as collection.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $children;

    protected $id;

    public function __construct(array $builder)
    {
        parent::__construct($builder);
        $this->children = collect();
        $this->id = Str::random(10);
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * get children.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function add(array $attributes): SbMenu
    {
        $this->children->push(
            $menu = new SbMenu($attributes)
        );

        return $menu;
    }
    
    public function menu(array $attributes)
    {
        return $this->add($attributes);
    }

    public function heading(string $title)
    {
        return $this->add([
            'type' => SbMenu::HEADING,
            'title' => $title,
        ]);
    }
}