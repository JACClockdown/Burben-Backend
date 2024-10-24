<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use PhpCfdi\Rfc\Rfc;

class RfcValidator implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try{
            $rfc = Rfc::parse($value);

            if( $rfc->isFisica() ){
                $rfc->isFisica();    
            }
            $rfc->isMoral();
        }catch(\Exception $e){

            $fail( $e->getMessage() );

        }
    }
}
