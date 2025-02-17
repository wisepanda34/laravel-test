<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Post;
use App\Policies\UserPolicy;
use App\Policies\PostPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
  protected $policies = [

    User::class => UserPolicy::class, // Добавляем политику
    Post::class => PostPolicy::class
  ];

  public function boot(): void
  {
    // $this->registerPolicies(); 
  }
}
