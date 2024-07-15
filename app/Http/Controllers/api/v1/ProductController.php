<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Interfaces\ProductRepository;
use App\Services\ResponseBuilderService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductRepository $productRepository)
    {
        $products = $productRepository->all();
        return ResponseBuilderService::sendSuccessOrFail('true', self::SUCCESS_OPERATION, null, $products);
    }

    public function store(ProductRequest $request,ProductRepository $productRepository)
    {
        $product = $productRepository->create($request->validated());
        return ResponseBuilderService::sendSuccessOrFail('true', self::SUCCESS_OPERATION, null, $product);
    }


    public function update(ProductRequest $request, $id,ProductRepository $productRepository)
    {
        $product = $productRepository->update($id, $request->validated());
        return ResponseBuilderService::sendSuccessOrFail('true', self::SUCCESS_OPERATION, null, $product);
    }

    public function destroy($id,ProductRepository $productRepository)
    {
        $productRepository->delete($id);
        return ResponseBuilderService::sendSuccessOrFail('true', self::SUCCESS_OPERATION, null, null);
    }
}
