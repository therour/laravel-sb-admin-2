<?php

namespace Therour\SbAdmin2;

use Illuminate\Http\Request;
use Therour\SbAdmin2\SbMenu;
use Therour\SbAdmin2\SbDropdown;

class SbMenuBuilder
{
    /**
     * Render a divider
     *
     * @return string
     */
    public function renderDivider()
    {
        return '<hr class="sidebar-divider">';
    }

    /**
     * Render a sidebar heading
     *
     * @param string $title
     * @return string
     */
    public function renderHeading(string $title)
    {
        return '<div class="sidebar-heading">'.$title.'</div>';
    }

    /**
     * Create a SbMenu instance.
     *
     * @param array $attributes
     * @return \Therour\SbAdmin2\SbMenu
     */
    public function makeMenu(array $attributes)
    {
        return new SbMenu($attributes);
    }

    /**
     * Render a menu with defined attribute.
     *
     * @param array $attributes
     * @return string
     */
    public function renderMenu(array $attributes)
    {
        $menu = $this->makeMenu($attributes);

        return '<li class="nav-item'.($menu->isActive($this->getRequest()) ? ' active' : '').'">
  <a class="nav-link" href="'.$menu->getHref().'">
    <i class="'.$menu->getIcon().'"></i>
    <span>'.$menu->getTitle().'</span>
  </a>
</li>';
    }

    public function makeDropdown(array $attributes)
    {
        return new SbDropdown($attributes);
    }

    public function renderDropdown(array $attributes, \Closure $callback)
    {
        $dropdown = $this->makeDropdown($attributes);
        $callback($dropdown);

        return '<li class="nav-item'.($dropdown->isActive($this->getRequest()) ? ' active' : '').'">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#'.$dropdown->getId().'" aria-expanded="'.($dropdown->isActive($this->getRequest()) ? 'true' : 'false').'" aria-controls="'.$dropdown->getId().'">
    <i class="'.$dropdown->getIcon().'"></i>
    <span>'.$dropdown->getTitle().'</span>
  </a>
  <div id="'.$dropdown->getId().'" class="collapse'.($dropdown->isActive($this->getRequest()) ? ' show' : '').'" aria-labelledby="label-'.$dropdown->getId().'" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
    '.$dropdown->getChildren()->map(function ($child) {
            if ($child->getType() == SbMenu::HEADING) {
                return $this->renderDropdownHeading($child->getTitle());
            } else {
                return $this->renderDropdownMenu($child);
            }
        })->implode('').'
    </div>
  </div>
</li>
';
    }

    public function renderDropdownHeading(string $title)
    {
        return '<h6 class="collapse-header">'.$title.'</h6>';
    }

    public function renderDropdownMenu(SbMenu $menu)
    {
        return '<a class="collapse-item'.($menu->isActive($this->getRequest()) ? ' active' : '').'" href="'.$menu->getHref().'">'.$menu->getTitle().'</a>';
    }
    /**
     * Get Request instance.
     *
     * @return \Illuminate\Http\Request
     */
    protected function getRequest()
    {
        return request();
    }
}
