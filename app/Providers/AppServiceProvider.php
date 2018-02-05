<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extend('fullname', function($attribute, $value){
            $value = trim($value);
            $names = explode(' ',$value);
            return count($names) >= 2;
        });        

        \Validator::extend('cpf', function ($attribute, $value) {
            $cpf = str_replace("-","",(str_replace(".","",$value)));

            if((strlen($cpf) != 11) || (!is_numeric($cpf)))
                return false;

            elseif (($cpf == '11111111111') || ($cpf == '22222222222') ||
                ($cpf == '33333333333')  ||  ($cpf == '44444444444') ||
                ($cpf == '55555555555') ||  ($cpf == '6666666666') ||
                ($cpf == '77777777777') ||  ($cpf == '88888888888') ||
                ($cpf == '99999999999') ||  ($cpf == '00000000000'))  {
                return false;
            } else {
                $dv_informed = substr($cpf,9,2);

                for ($i=0; $i<=8; $i++) {
                    $digit[$i] = substr($cpf,$i,1);
                }

                $position = 10;
                $sum = 0;

                for ($i=0; $i<=8; $i++){
                    $sum = $sum + $digit[$i] * $position;
                    $position--;
                }

                $digit[9] = $sum % 11;
                $digit[9] = $digit[9] < 2 ? $digit[9] = 0 : 11 - $digit[9];

                $position = 11;
                $sum = 0;

                for ($i=0; $i<=9; $i++) {
                    $sum = $sum + $digit[$i] * $position;
                    $position--;
                }

                $digit[10] = $sum % 11;
                $digit[10] = $digit[10] < 2 ? $digit[10] = 0 : $digit[10] = 11 - $digit[10];

                $dv = $digit[9] * 10 + $digit[10];

                return ($dv == $dv_informed);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
