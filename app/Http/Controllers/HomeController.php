<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use App\Models\HomeBanner;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\PrivacyPolicy;
use App\Models\ReturnProduct;
use App\Models\SubCategory;

class HomeController extends Controller
{
    public function index()
    {
        $hotProducts = Product::where('product_type', 'hot')->orderBy('id', 'desc')->get();
        $newProducts = Product::where('product_type', 'new')->orderBy('id', 'desc')->get();
        $regularProducts = Product::where('product_type', 'regular')->orderBy('id', 'desc')->get();
        $discountProducts = Product::where('product_type', 'discount')->orderBy('id', 'desc')->get();
        // dd($hotProducts);
        $homeBanner = HomeBanner::first();
        return view('home.index', compact('hotProducts', 'newProducts', 'regularProducts', 'discountProducts', 'homeBanner'));
    }


    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->with('color', 'size', 'galleryImage')->first();
        // dd($product);
        return view('home.product-details', compact('product'));
    }


    public function shop(Request $request)
    {   
        if(isset($request->categoryId)){
            // dd($request->categoryId);
            $type = 'category';
            $categoryProducts = Category::where('id', $request->categoryId)->with('product')->first();
            return view('home.shop', compact('categoryProducts', 'type'));
        }
        if(isset($request->subCategoryId)){
            // dd($request->subCategoryId);
            $type = 'subCategory';
            $subCategoryProducts = SubCategory::where('id', $request->subCategoryId)->with('product')->first();
            return view('home.shop', compact('subCategoryProducts', 'type'));
        }
        $type = 'normal';
        $products = Product::orderBy('id', 'desc')->get();
        return view('home.shop', compact('products', 'type'));
    }
    public function returnProcess()
    {
        return view('home.return-process');
    }
    public function viewCart()
    {
        return view('home.view-cart');
    }
    public function checkout()
    {
        return view('home.checkout');
    }

    public function privacyPolicy()
    {
        $privacyPolicy = PrivacyPolicy::first();
        return view('home.privacy-policy', compact('privacyPolicy'));
    }
    public function productCategory()
    {
        return view('home.product-category');
    }
    public function productSubCategory()
    {
        return view('home.product-subcategory');
    }

    // add to cart
    public function addtoCartDetails(Request $request, $id)
    {
        $cartProduct = Cart::where('product_id', $id)->where('ip_address', $request->ip())->first();
        $product = Product::where('id', $id)->first();
        $action = $request->action;

        if ($cartProduct == null) {
            $cart = new Cart();
            $cart->product_id = $id;
            $cart->ip_address = $request->ip();
            $cart->qty = $request->qty;
            if ($product->discount_price != null) {
                $cart->price = $product->discount_price;
            } elseif ($product->discount_price == null) {
                $cart->price = $product->regular_price;
            }


            $cart->size = $request->size;
            $cart->color = $request->color;

            $cart->save();

            if ($action == 'addToCart') {
                toastr()->success('Product added to cart successfully');
                return redirect()->back();
            }
            else {
                toastr()->success('Product added to cart successfully');
                return redirect('/checkout');
            }
        } 
        elseif ($cartProduct != null) {
            $cartProduct->qty = $cartProduct->qty + $request->qty;
            $cartProduct->save();
            if ($action == 'addToCart') {
                toastr()->success('Product added to cart successfully');
                return redirect()->back();
            }
            else {
                toastr()->success('Product added to cart successfully');
                return redirect('/checkout');
            }
        }
    }

    public function addtoCart(Request $request, $id)
    {
        $cartProduct = Cart::where('product_id', $id)->where('ip_address', $request->ip())->first();
        $product = Product::where('id', $id)->first();

        if ($cartProduct == null) {
            $cart = new Cart();
            $cart->product_id = $id;
            $cart->ip_address = $request->ip();
            $cart->qty = 1;
            if ($product->discount_price != null) {
                $cart->price = $product->discount_price;
            } 
            elseif ($product->discount_price == null) {
                $cart->price = $product->regular_price;
            }

            $cart->save();
            toastr()->success('Product added to cart successfully');
            return redirect()->back();

        } 
        elseif ($cartProduct != null) {
            $cartProduct->qty = $cartProduct->qty + $request->qty;
            $cartProduct->save();
            toastr()->success('Product added to cart successfully');
            return redirect()->back();
        }
    }

    public function deleteAddtoCart ($id)
    {
        $cartProdust = Cart::find($id);
        $cartProdust->delete();
        return redirect()->back();
    }

    // confirm order

    public function confirmOrder(OrderRequest $request)
    {
        $order = new Order();
        
        $previousOrder = Order::orderBy('id', 'desc')->first(); 

        if($previousOrder == null){
            $order->invoiceId = 'INV-1';
        }
        if($previousOrder != null){
            $generaeInvoiceId = 'INV-'.$previousOrder->id+1;
            $order->invoiceId = $generaeInvoiceId;
        }   
        
        $order->c_name = $request->c_name;
        $order->c_phone = $request->c_phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->area = $request->area;
        $order->price = $request->inputGrandTotal;
        

        // store Info into OrderDetails Table..

        $cartProducts = Cart::with('product')->where('ip_address', $request->ip())->get();
        // dd($cartProducts);
        if($cartProducts->isNotEmpty()){
            $order->save();
            foreach($cartProducts as $cart){
                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cart->product_id;
                $orderDetails->qty = $cart->qty;
                $orderDetails->price = $cart->price;
                $orderDetails->size = $cart->size;
                $orderDetails->color = $cart->color;
                $orderDetails->save();
                $cart->delete();
            }
        }
        else{
            toastr()->warning('No products in your cart!');
            return redirect('/');
        }
        // $orderDetails = new OrderDetails();
        toastr()->success('Order is placed successfully!');
        return redirect('order-confirmed/'.$generaeInvoiceId);
    }

    public function thankyouMessage($invoiceId)
    {
        return view ('home.thankyou', compact('invoiceId'));
        // $order = Order::where('invoiceId', $invoiceId)->first();
        // return view('home.order-confirmed', compact('order'));
    }

    // Category Product

    public function categoryProduct($slug)
    {
        $categoryProducts = Category::where('slug', $slug)->with('product')->first();
        // dd($categoryProducts);
        return view('home.category-products', compact('categoryProducts'));
    }

    public function subCategoryProduct($slug)
    {
        $subCategoryProducts = SubCategory::where('slug', $slug)->with('product')->first();
        // dd($subCategoryProducts);
        return view('home.sub-category-products', compact('subCategoryProducts'));
    }

    public function searchProducts(Request $request)
    {
        if(isset($request->search)){
           $products = Product::where('name', 'LIKE', '%'.$request->search.'%')->get();
            // dd($products);
            return view ('home.search-products', compact('products')); 
        }
        
    }

    public function returnProduct(Request $request)
    {
        $returnProduct = new ReturnProduct();
        $returnProduct->c_name     = $request->c_name;
        $returnProduct->c_phone    = $request->c_phone;
        $returnProduct->address  = $request->address;
        if ($request->filled('product_id')) {
            if ($this->orderExists($request->product_id)) {
                $returnProduct->product_id = $request->product_id;
            } else {
                toastr()->warning('Order not found.');
                return redirect()->back();
            }
        }
        $returnProduct->c_email    = $request->c_email;
        $returnProduct->define_issue    = $request->define_issue;

        if (isset($request->image)) {
            $imageName = rand() . '-return-' . '.' . $request->image->extension();
            $request->image->move('backend/images/return/', $imageName);
            $returnProduct->image = $imageName;
        }
        $returnProduct->save();
        toastr()->success('Return request submitted successfully!!');
        return redirect()->back();
    }

    /**
     * Check if an order exists by id or invoiceId.
     *
     * @param mixed $orderId
     * @return bool
     */
    private function orderExists($orderId)
    {
        return is_numeric($orderId)
            ? Order::where('id', $orderId)->exists()
            : Order::where('invoiceId', $orderId)->exists();
    }
}
