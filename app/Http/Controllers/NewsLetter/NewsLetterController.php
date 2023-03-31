<?php

namespace App\Http\Controllers\NewsLetter;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    function __construct(private Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    public function subscribeNewsletter(Request $request){
        $user = $request->user();
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $subscribed = $this->newsletter->where('user_id', $user->id)
            ->where('email', $request->email)
            ->first();

        if($subscribed != null)   
        {
            $subscribed->update([
                'email' => $request->email,
            ]);
            toast('You successfully subscribed to our newsletter', 'success');
            return redirect()->back();
        }
        
        $this->newsletter->create([
            'user_id' => $user->id,
            'email' => $request->email
        ]);
        toast('You successfully subscribed to our newsletter', 'success');
        return redirect()->back();
    }
}
