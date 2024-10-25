<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\StoreCustomerRequest;
use App\Http\Requests\V1\UpdateCustomerRequest;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use App\Models\Customer;


use App\Http\Controllers\Controller;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index()
    {
        //
        //return new CustomerCollection(Customer::all());
       return new CustomerCollection(Customer::paginate());
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(StoreCustomerRequest $request)
    {
        //
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
    */
    public function show(Customer $customer)
    {
        //
        return new CustomerResource($customer);

    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
        $customer->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Customer $customer)
    {
        //
        try {
            $customer->delete();
            return response()->json([
                'message' => 'Customer deleted successfully.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete customer.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
