<?php
use App\Services\Router;
//Login Form Routes
Router::get('login', 'Login', 'index');
Router::post('login-submit', 'Login', 'loginBtn');

//Dashboard Routes
Router::get('dashboard', 'Dashboard', 'index');
Router::get('', 'Dashboard', 'index');
Router::get('logout', 'Dashboard', 'logout');
Router::get('add-blog', 'Blog', 'index');
Router::post('save-post', 'Blog', 'userPost');
Router::get('post-edit', 'Blog', 'edit');
Router::get('post-delete', 'Blog', 'delete');
Router::post('update-post', 'Blog', 'updatePost');
