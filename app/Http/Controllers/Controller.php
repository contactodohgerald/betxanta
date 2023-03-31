<?php

namespace App\Http\Controllers;

use App\Models\CurrencyRate;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function user()
    {
        return Auth::user();
    }

    public function getCountry($id = null){
        if($id == null){
            $country = \App\Models\Country::all();
        }else{
            $country = \App\Models\Country::where(['id', $id])->first();
        }
        return $country;
    }

    public function getSingleCurrency($id = null){
        if($id == null){
            $currency = CurrencyRate::where('symbol', 'NGN')->first();
        }else{
            $currency = CurrencyRate::where('id', $id)->first();
        }

        return $currency;
    }

    public function faqPage(){
        $view = [
            'country' => $this->getCountry(),
            'category' => Category::all(),
            '_user' => auth()->user(),
        ];
        return view('main.faq', $view);
    } 
    
    public function affiliatePage(){
        $view = [
            'country' => $this->getCountry(),
            'category' => Category::all(),
            '_user' => auth()->user(),
        ];
        return view('main.affiliate', $view);
    } 
    
    public function aboutPage(){
        $view = [
            'country' => $this->getCountry(),
            'category' => Category::all(),
            '_user' => auth()->user(),
        ];
        return view('main.about', $view);
    }

    public function termsConditionsPage(){
        $view = [
            'country' => $this->getCountry(),
            'category' => Category::all(),
            '_user' => auth()->user(),
        ];
        return view('main.terms-conditions', $view);
    }

    public function privacyPolicyPage(){
        $view = [
            'country' => $this->getCountry(),
            'category' => Category::all(),
        ];
        return view('main.privacy-policy', $view);
    }

    
}
