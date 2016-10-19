<?php
namespace Rap2hpoutre\LaravelCreditCardValidator;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Inacho\CreditCard;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extend('ccn', function($attribute, $value, $parameters, $validator) {
            return CreditCard::validCreditCard($value)['valid'];
        });

        \Validator::extend('ccd', function($attribute, $value, $parameters, $validator) {
            try {
                $value = explode('/', $value);
                return CreditCard::validDate(strlen($value[1]) == 2 ? (2000+$value[1]) : $value[1], $value[0]);
            } catch(\Exception $e) {
                return false;
            }
        });

        \Validator::extend('cvc', function($attribute, $value, $parameters, $validator) {
            return ctype_digit($value) && (strlen($value) == 3 || strlen($value) == 4);
        });
    }
    
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // 
    }
}
