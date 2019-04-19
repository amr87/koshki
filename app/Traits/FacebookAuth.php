<?php

namespace App\Traits;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait FacebookAuth
{
    use ResponseTrait;

    protected function fbAuth($request)
    {
        $customer = $this->findByFacebook($request);
        if ($customer) {
            $password = str_random();
            $customer->password = $this->hashPassword($password);
            $customer->save();
            $customer->password = $password;

            return $this->getAccessTokens($customer);
        }
        $validator = Validator::make(
            $request->all(),
            ['email' => 'required|email|unique:customers'],
            ['unique' => 'this :attribute is already registered with us, try to login instead']
        );
        if ($validator->fails()) {
            return $this->responseValidationErrors($validator->errors());
        }
        // create the user
        $attributes = [];
        foreach ($request->all() as $key => $value) {
            // fill attributes from the request inputs.
            $attributes[$key] = $value;
        }
        $password = str_random();
        $attributes['password'] = $this->hashPassword($password);
        $attributes['username'] = $request->email;
        // create the customer
        $customer = new Customer();
        $customer->fill($attributes);
        if ($customer->save()) {
            $customer->password = $password;

            return $this->getAccessTokens($customer);
        }
    }

    /**
     * @param type $request
     *
     * @return App\\Models\\Customer
     */
    protected function findByFacebook($request): Request
    {
        return Customer::where('facebook_id', $request->facebook_id)
            ->where('email', $request->email)
            ->first();
    }

    /**
     * Undocumented function.
     */
    public function hsa()
    {
        return $this->name;
    }
}
