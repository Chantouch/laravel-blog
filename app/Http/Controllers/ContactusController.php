<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Jobs\SendFeedback;
use App\Models\Feedback;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FeedbackRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackRequest $request)
    {
        $data = $request->all();
        $message = $this->create($data);
        dispatch(new SendFeedback($message));
        return redirect()->route('feedback.index')
            ->with('success', trans('feedback.success'));
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\Feedback
     */
    protected function create(array $data)
    {
        return Feedback::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message']
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return view('page.about');
    }

}
