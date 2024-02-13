<?php
use App\Services\Router;
use App\Middleware\Auth;
use App\Middleware\Guest;
//Login Form Routes
Router::get('login', 'Login', 'index',[Guest::class]);
Router::post('login-submit', 'Login', 'loginBtn',[Guest::class]);

//Dashboard Routes
Router::get('dashboard', 'Dashboard', 'index',[Auth::class]);
Router::get('', 'Dashboard', 'index',[Auth::class]);
Router::get('logout', 'Dashboard', 'logout',[Auth::class]);
Router::get('add-blog', 'Blog', 'index',[Auth::class]);
Router::post('save-post', 'Blog', 'userPost',[Auth::class]);
Router::get('post-edit', 'Blog', 'edit',[Auth::class]);
Router::get('post-delete', 'Blog', 'delete',[Auth::class]);
Router::post('update-post', 'Blog', 'updatePost',[Auth::class]);
//register route
Router::get('register', 'Register', 'index');
Router::post('user-register', 'Register', 'userRegister');
