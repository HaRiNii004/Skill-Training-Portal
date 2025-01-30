<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Listen for the login event to redirect based on role
        Event::listen(Login::class, function ($event) {
            $user = $event->user;
            
            // Redirect based on user role
            if ($users->role === '0') {
                return redirect('/availablecourses');
            } elseif ($users->role === '1') {
                return redirect()->route('faculty.attendance');
            } else {
                return redirect()->route('admin.editcourse');
            }
        });
    }
}
