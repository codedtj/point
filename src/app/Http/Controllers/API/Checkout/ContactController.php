<?php

namespace App\Http\Controllers\API\Checkout;

use App\Http\Controllers\API\ApiController;
use App\Models\Basket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ContactController extends ApiController
{
    public function __invoke(Basket $basket): Model
    {
        return $basket
            ->user()
            ->firstOrCreate(['email' => request('email')], [
                'name' => request('name'),
                'phone' => request('phone'),
                'address' => request('address'),
                'password' => bcrypt(Str::random(10))
            ]);
    }
}
