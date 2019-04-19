<?php

namespace App\Traits;

use App\Models\Inquiry;
use Propaganistas\LaravelPhone\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use App\Traits\CustomerAuthentication;
use Illuminate\Http\Request;

trait CustomerTrait
{
    
    use CustomerAuthentication;

    public function inquires()
    {
        return $this->hasMany(Inquiry::class, 'customer_id', 'id');
    }

    /**
     * @author Amr Gamal <amr.gamal878@gmail.com>
     * @param string $phone
     * @return string
     */
    protected function makeStandardPhone(string $phone)
    {
        return PhoneNumber::make($phone, 'EG')->formatE164();
    }

    /**
     * @author Amr Gamal <amr.gamal878@gmail.com>
     * @param string $phone
     * @return string
     */
    protected function hashPassword($raw): string
    {
        return Hash::make($raw);
    }

    /**
     *
     * @param Request $request
     */
    protected function attemptLogin($request): Request
    {
        return $this->getAccessTokens($request);
    }

    /**
     *
     * @param type $request
     * @return \Illuminate\Http\Responses
     */
    protected function authenticateWithFaceBook($request): Request
    {
        return $this->fbAuth($request);
    }
 
    
    /**
     * Override the default authentication of passport
     * @param string $username
     * @return App\\Models\\Customer
     */
    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }
}
