
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>Learning Support System</title>

  <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper" id="app">
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> --}}
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" title="A system support review your knowledge everyday">
      <img src="../img/logo.png" alt="LearningSS Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">LearningSS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../img/profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{ Auth::user()->last_name.' '.Auth::user()->first_name }}
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @role('admin')
          {{-- Dashboard --}}
          <li class="nav-item" title="General Information quantity questions, unit exam, online users...">
            <router-link to="/admin/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt blue"></i>
              <p>
                Dashboard
              </p>
            </router-link>
          </li>
          <li class="nav-item" title="Manage all users in system">
              <router-link to="/admin/manage-users" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Users</p>
              </router-link>
          </li>
          <li class="nav-item" title="Grant roles and permissions for users">
              <router-link to="/admin/manage-grant-permissions" class="nav-link">
                {{-- <i class="fas fa-user-secret nav-icon"></i> --}}
                <i class="fas fa-user-cog nav-icon"></i>
                <p>Grant Permissions</p>
              </router-link>
          </li>
          {{-- Management --}}
          <li class="nav-item has-treeview" title="Manage some specify in system">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-cog green"></i>
              <p>
                Specifications
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview pl-3">    
              <li class="nav-item" title="Manage difficulty level questions">
                <router-link to="/admin/manage-levels" class="nav-link">
                  <i class="fas fa-sort-amount-up nav-icon"></i>
                  <p>Levels of questions</p>
                </router-link>
              </li>
              <li class="nav-item" title="Create fields and edit branches">
                <router-link to="/admin/manage-fields-branches" class="nav-link">
                  <i class="fas fa-object-group nav-icon"></i>
                  <p>Fields &amp; Branches </p>
                </router-link>
              </li>
            </ul>
          </li>
          {{-- Create passport --}}
          <li class="nav-item" title="Authority passport to users access API">
              <router-link to="/admin/manage-passport" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Developer
                </p>
              </router-link>
          </li>
          @endrole
          @role('lecturer')
          {{-- BANG THONG KE VA DIEU KHIEN --}}
          <li class="nav-item" title="View general information">
            <router-link to="/lecturer/general-info" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt blue"></i>
              <p>
                General
              </p>
            </router-link>
          </li>
          {{-- CREATE QUESTION --}}
          <li class="nav-item" title="Create more questions">
            <router-link to="/lecturer/manage-questions" class="nav-link">
              {{-- <i class="fas fa-question-circle nav-icon"></i> --}}
              <i class="fas fa-puzzle-piece nav-icon"></i>
              <p>
                Question
              </p>
            </router-link>
          </li>
          {{-- CREATE TEST-CODE for students group --}}
          <li class="nav-item" title="Create the exam">
            <router-link to="/lecturer/init-exam" class="nav-link">
              <i class="fas fa-flag-checkered nav-icon"></i>
              <p>
                Init exam
              </p>
            </router-link>
          </li>
          {{-- VIEW student' result of test-code --}}
          <li class="nav-item" title="View results of a test unit">
            <router-link to="/lecturer/view-results" class="nav-link">
              <i class="fas fa-list-alt nav-icon"></i>
              <p>
                Results
              </p>
            </router-link>
          </li>
          {{-- UPDATE documents --}}
          <li class="nav-item" title="Update resources for branches">
            <router-link to="/lecturer/provide-documents" class="nav-link">
              <i class="fas fa-book nav-icon"></i>
              <p>
                Provide documents
              </p>
            </router-link>
          </li>
          {{-- MORE FEATUREs --}}
          <li class="nav-item has-treeview" title="View more features">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog green"></i>
              <p>
                Other...
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-3 bg-secondary">
              <li class="nav-item" title="Lecturer join test and export unit test">
                <router-link to="/lecturer/join-own-test" class="nav-link">
                  <i class="fas fa-hand-point-right nav-icon"></i>
                  <p>Own test</p>
                </router-link>
              </li>
              <li class="nav-item" title="View all proposals of Students">
                <router-link to="/lecturer/view-require-helps" class="nav-link">
                  <i class="far fa-envelope nav-icon"></i>
                  <p>View requires</p>
                </router-link>
              </li>
              <li class="nav-item" title="Create new branches in field knowledge">
                <router-link to="/lecturer/create-fields-branches" class="nav-link">
                  <i class="fas fa-layer-group nav-icon"></i>
                  <p>Branches</p>
                </router-link>
              </li>
            </ul>
          </li>
          @endrole {{-- END LECTURER' ROLE --}}

          @role('student')
          {{-- Dashboard --}}
          <li class="nav-item" title="View your general information">
            <router-link to="/student/general-info" class="nav-link">
              <i class="fas fa-chart-line nav-icon"></i>
              <p>
                General
              </p>
            </router-link>
          </li>
          {{-- Random test --}}
          <li class="nav-item" title="Participate in the setting random questions">
            <router-link to="/student/join-random-test" class="nav-link">
              {{-- <i class="fas fa-question-circle nav-icon"></i> --}}
              <i class="fas fa-random nav-icon"></i>
              <p>
                Random Test
              </p>
            </router-link>
          </li>
          {{-- Join test from lecturer --}}
          <li class="nav-item" title="Join a test created by lecturers">
            <router-link to="/student/take-exam" class="nav-link">
              {{-- <i class="fas fa-question-circle nav-icon"></i> --}}
              <i class="fas fa-puzzle-piece nav-icon"></i>
              <p>
                Take exam
              </p>
            </router-link>
          </li>
          {{-- Get document field from lecturer --}}
          <li class="nav-item" title="Get documents in branches">
            <router-link to="/student/get-documents" class="nav-link">
              {{-- <i class="fas fa-question-circle nav-icon"></i> --}}
              <i class="fas fa-book-reader nav-icon"></i>
              <p>
                Get documents
              </p>
            </router-link>
          </li>
          {{-- Other features --}}
          <li class="nav-item has-treeview" title="More features...">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog green"></i>
              <p>
                Other...
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview px-3">
              <li class="nav-item" title="Student can require helping from lecturer">
                <router-link to="/student/ask-support" class="nav-link">
                  <i class="far fa-comment-dots nav-icon"></i>
                  <p>Ask support</p>
                </router-link>
              </li>
              <li class="nav-item" title="Create a chatting channel for multi-student">
                <router-link to="/student/create-a-channel" class="nav-link">
                  <i class="far fa-comments nav-icon"></i>
                  <p>Create a channel</p>
                </router-link>
              </li>
            </ul>
          </li>
          @endrole
          {{-- Profile for All users --}}
          <li class="nav-item" title="View your profile and update">
              <router-link to="/profile" class="nav-link">
                <i class="fas fa-address-card nav-icon orange"></i>
                <p>
                  Profile
                </p>
              </router-link>
          </li>
          {{-- LOGOUT SYSTEM --}}
          <li class="nav-item" title="Sign out the system">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class="nav-icon fa fa-power-off red"></i>
                <p>
                    {{ __('Logout') }}
                </p>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  {{-- Place change visual content via function --}}
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          {{-- @role('admin')
            <span>This is Header Admin in master.blade.php</span>
          @endrole --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Show content with *.vue router-link -->
          <router-view></router-view>
          
          <vue-progress-bar></vue-progress-bar>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  {{-- <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> --}}

</div>
<!-- ./wrapper -->
<script src="/js/app.js"></script>
</body>
</html>
