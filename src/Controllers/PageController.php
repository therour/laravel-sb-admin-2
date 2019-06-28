<?php

namespace Therour\SbAdmin2\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PageController extends Controller
{
    public function __construct()
    {
        config()->set('sb-admin-2.topbar', 'sb-admin-2::demos.layouts.topbar');
        config()->set('sb-admin-2.sidebar-menu', 'sb-admin-2::demos.layouts.sidebar-menu');
    }

    public function index()
    {
        return view('sb-admin-2::demos.index');
    }

    public function charts()
    {
        return view('sb-admin-2::demos.charts');
    }

    public function tables()
    {
        return view('sb-admin-2::demos.tables');
    }

    public function login()
    {
        return view('sb-admin-2::demos.pages.login');
    }

    public function register()
    {
        return view('sb-admin-2::demos.pages.register');
    }

    public function forgotPassword()
    {
        return view('sb-admin-2::demos.pages.forgot-password');
    }

    public function notFound()
    {
        return view('sb-admin-2::demos.pages.404');
    }

    public function blank()
    {
        return view('sb-admin-2::demos.pages.blank');
    }
}
