<?php

namespace Therour\SbAdmin2\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UtilityController extends Controller
{
    public function __construct()
    {
        config()->set('sb-admin-2.topbar', 'sb-admin-2::demos.layouts.topbar');
        config()->set('sb-admin-2.sidebar-menu', 'sb-admin-2::demos.layouts.sidebar-menu');
    }

    public function colors()
    {
        return view('sb-admin-2::demos.utilities.colors');
    }
    public function borders()
    {
        return view('sb-admin-2::demos.utilities.borders');
    }
    public function animations()
    {
        return view('sb-admin-2::demos.utilities.animations');
    }
    public function others()
    {
        return view('sb-admin-2::demos.utilities.others');
    }
}
