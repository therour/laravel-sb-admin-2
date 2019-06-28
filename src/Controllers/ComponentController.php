<?php

namespace Therour\SbAdmin2\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ComponentController extends Controller
{
    public function __construct()
    {
        config()->set('sb-admin-2.topbar', 'sb-admin-2::demos.layouts.topbar');
        config()->set('sb-admin-2.sidebar-menu', 'sb-admin-2::demos.layouts.sidebar-menu');
    }

    public function buttons()
    {
        return view('sb-admin-2::demos.components.buttons');
    }
    public function cards()
    {
        return view('sb-admin-2::demos.components.cards');
    }
}
