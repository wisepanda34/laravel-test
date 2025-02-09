<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
  protected $policies = [

    User::class => UserPolicy::class, // Добавляем политику
  ];

  public function boot(): void
  {
    // $this->registerPolicies(); 
  }
}
