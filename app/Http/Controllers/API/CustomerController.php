<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\CustomerRegisteration;
use App\Http\Requests\CustomerAuth;
use App\Http\Resources\CustomerResource;
use App\Traits\CustomerTrait;

class CustomerController extends Controller
{

    use CustomerTrait;

    /**
     * Handle business logic of customer registration.
     * @author Amr Gamal <amr.gamal878@gmail.com>
     * @param CustomerRegisteration $request
     * @return CustomerResource
     */
    public function register(CustomerRegisteration $request)
    {
        $password = $request->password;
        $request->merge(['password' => $this->hashPassword($password)]);
        if (Customer::create($request->all())) {
        // log the customer in
             $request->merge(['password' => $password]);
            return $this->getAccessTokens($request);
        }
        return $this->responseServerErrors(['error creating customer']);
    }

    /**
     * Handle logic of customer authentication.
     * @author Amr Gamal <amr.gamal878@gmail.com>
     * @param CustomerAuth $request
     */
    public function auth(CustomerAuth $request)
    {
        return $this->attemptLogin($request);
    }
    
    /**
     * Handle logic of customer facebook login/registeration.
     * @author Amr Gamal <amr.gamal878@gmail.com>
     * @param \Illuminate\Http\Request $request
     */
    public function facebook(Request $request)
    {
        return $this->authenticateWithFaceBook($request);
    }
}
