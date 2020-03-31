<?php



namespace App\Http\Controllers\API;



use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;

use App\Product;

use Validator;



class ProductController extends BaseController

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {
        /*
        $response = $client->post('http://127.0.0.1:8000/oauth/token', [
            'form_params' => [
                'client_id' => 2,
                'client_secret' => 'LadeMtdDpLSgfGeMisOXJGO2snJA7Oq6elCGo59X',
                'grant_type' => 'password',
                'username' => 'kevzone03@gmail.com',
                'password' => 'denebianz',
                'scope' => '*',
            ]

        ]);
        */
        $products = Product::all();

        //    return $products;

      return $this->sendResponse($products->toArray(), 'Products retrieved successfully.');
     //return response()->json($products);

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $input = $request->all();



        $validator = Validator::make($input, [

            'name' => 'required',

            'detail' => 'required'

        ]);



        if($validator->fails()){

            return $this->sendError('Validation Error.', $validator->errors());       

        }



        $product = Product::create($input);



        return $this->sendResponse($product->toArray(), 'Product created successfully.');

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $product = Product::find($id);



        if (is_null($product)) {

            return $this->sendError('Product not found.');

        }



        return $this->sendResponse($product->toArray(), 'Product retrieved successfully.');

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Product $product)

    {

        $input = $request->all();



        $validator = Validator::make($input, [

            'name' => 'required',

            'detail' => 'required'

        ]);



        if($validator->fails()){

            return $this->sendError('Validation Error.', $validator->errors());       

        }



        $product->name = $input['name'];

        $product->detail = $input['detail'];

        $product->save();



        return $this->sendResponse($product->toArray(), 'Product updated successfully.');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy(Product $product)

    {

        $product->delete();

     

        return $this->sendResponse('ok', 'Product deleted successfully.');

    }

}