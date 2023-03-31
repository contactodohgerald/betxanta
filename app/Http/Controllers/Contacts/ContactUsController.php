<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactUsController extends Controller
{

    function __construct(private Category $category, private User $user)
    {
        $this->category = $category;
        $this->user = $user;
    }

    public function contactPage(){
        $view = [
            'country' => $this->getCountry(),
            'category' => $this->category->all(),
            '_user' => auth()->user(),
        ];
        return view('main.contact', $view);
    }

    public function sendContactMail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'name' => ['required', 'string'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);
        $message = [
            'name' => 'Admin',
            'subject' => 'Notification From '.$request->name,
            'message' => $request->subject,
            'body' => $request->message,
            'thankyou' => 'Thank you for trusting in our services',
        ];
        $admin = $this->user->where('email', env('APP_MAIL'))->first();
        Notification::send($admin, new GeneralNotification($message, ['mail']));

        toast('Your message has been recieved successful, one of our agent will get back to you shortly.','success');
        return redirect()->back();
    }
}
