<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Mail\SendEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;

class UserController extends Controller
{
    public function getEmail()
    {
        return view('users.send-email');
    }

    /**
     * Display a listing of the resource.
     */
    public function sendEmail(Request $request)
    {
        $request->validate([
            'recipient_email' => 'required|email',
            'recipient_message' => 'required|string',
        ]);
        // Send the email
        Mail::to($request->input('recipient_email'))->send(new SendEmail($request->input('recipient_message')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserCreateRequest $request)
    {
        try {
            DB::enableQueryLog();
            $user = User::query()->create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
            ]);

            $query = DB::getQueryLog();

            $user->update(['execution_time' => $query[0] ? $query[0]['time'] : null]);

            return redirect()->back()->with(['status' => true, 'message' => 'User info has been submitted']);
        } catch (Exception $exception) {
            return redirect()->back()->with(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return view('users.show');
    }
}
