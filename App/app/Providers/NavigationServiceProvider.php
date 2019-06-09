<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private static function navigation_getAdminNavs()
    {
        return array(
            array(
                'label' => 'Dashboard',
                'url' => '/dashboard',
                'icon' => 'dashboard'
            ),
            array(
                'label' => 'Add Details',
                'url' => '/details',
                'icon' => 'perm_identity'
            ),
            array(
                'label' => 'View Customers',
                'url' => '/view_customer',
                'icon' => 'view_stream'
            ),
            array(
                'label' => 'Payment',
                'url' => '/payment',
                'icon' => 'assessment'
            ),
            array(
                'label' => 'Edit Profile',
                'url' => '/profile',
                'icon' => 'account_circle'
            ),
            array(
                'label' => 'Reports',
                'url' => '/reports',
                'icon' => 'file_copy'
            ),
            array(
                'label' => 'Block Users',
                'url' => '/block_users',
                'icon' => 'person_add_disabled'
            )
        );
    }


    public static function getNavigationEntries($role = 'admin')
    {
        switch ($role) {
            case 'admin':
                return (Object) NavigationServiceProvider::navigation_getAdminNavs();
                break;
            default:
                return null;
                break;
        }
    }

}
