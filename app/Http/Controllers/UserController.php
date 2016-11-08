<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Incident;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Traits\DynamicRules;

class UserController extends Controller
{

    use DynamicRules;

    /**
     * Get user profile. If no username specified return logged in user profile, otherwise return specific profile.
     * @param null $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show( $slug = null )
    {

        if( !$slug){

            //get logged in user profile
            if (Auth::check()) {

                $id = Auth::id();
                $profile = User::find($id);

            }
            else
            {

                return redirect()->route('login');

            }
        }
        else
            $profile = User::where( 'slug', '=', $slug )->first();


        if (empty($profile)) {

            abort(404);

        }

        //get incident reported by user
        $incidents =  Incident::where([ 'approved'  => true,
                                        'user_id'    => $profile->id ])
                              ->orderBy('created_at', 'desc')->get();


        $now = Carbon::now();
        $number_of_latest_incidents = 0;  //number of incidents in last 30 days
        foreach ($incidents as $incident)
        {

            if ( $incident->created_at->diff($now)->days <= 30 )
            {

                $number_of_latest_incidents ++;

            }
        }

        return view('pages.profile.overview', compact('profile', 'incidents', 'number_of_latest_incidents'));

    }


    /**
     * Returns user data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(){

        if (Auth::check()) {

            $id = auth()->user()->id;
            $profile = User::find($id);

            return view('pages.profile.settings', compact('profile'));

        }
        else
            abort(404);


    }



    /**
     * Update user data
     * @param Request $request
     */
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), $this->profileRules($request), $this->profileMessages($request));

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }


        $profile = User::find( auth()->user()->id );

        //if username is changed, update slug
        if( $profile->username != $request->get('username') )
            $profile->slug = User::createUniqueSlug( $request->get('username') );

        $profile->username = $request->get('username');
        $profile->email = $request->get('email');


        // Add profile picture
        if ( !empty( $request->file('upload') ) ) {

            $upload = $request->file('upload');
            $extension = $upload->getClientOriginalExtension();
            $serverFilename = $upload->store('uploads/profile-photos');

            if ( $serverFilename )
            {
                //delete old photo
                File::delete($profile->photo);
                $profile->photo = $serverFilename;
            }


        }
        $profile->save();
        return redirect()->route('public.profile');

    }






}
