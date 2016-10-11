<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Plate;
use App\Models\Upload;
use App\Models\Video;
use App\Traits\DynamicRules;
use App\Models\City;
use App\Models\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IncidentController extends Controller
{
    use DynamicRules;

    /**
     * Report Incident Form
     */
    public function index()
    {
        $cities = City::all();
        $violations = Violation::all();

        return view('pages.incident.form', compact('cities', 'violations'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->incidentRules($request), $this->incidentMessages($request), $this->incidentCustomAttributes($request));

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $incidentToken = str_random(32);
        $incident = new Incident;
        $incident->user_id = auth()->user()->id;
        $incident->title = $request->get('title');
        $incident->description = $request->get('info');
        $incident->city_id = $request->get('city_id');
        $incident->location = $request->get('location');
        $incident->occurred_at = $request->get('occurred_at');
        $incident->token = $incidentToken;
        $incident->slug = $this->createUniqueSlug($request->get('title'));
        $incident->approved = false;
        $incident->save();

        // Add Violations
        $incident->violations()->attach($request->get('violations'));

        // Add Plates
        if (!empty($request->get('plates'))) {

            foreach ($request->get('plates') as $plate) {

                $plate = strtoupper(trim($plate));
                $plateModel = Plate::where('plate', '=', $plate)->first();

                if (empty($plateModel)) {

                    $plateModel = new Plate;
                    $cityCode = substr($plate, 0, 2);

                    $city = City::where('code', $cityCode)->first();
                    $cityId = null;

                    if (!empty($city)) {
                        $cityId = $city->id;
                    }

                    $plateModel->city_id = $cityId;
                    $plateModel->plate = $plate;
                    $plateModel->save();

                }

                $incident->plates()->attach($plateModel);

            }

        }

        // Add Uploads
        if (!empty($request->file('uploads'))) {

            foreach ($request->file('uploads') as $upload) {

                $originalFilename = $upload->getClientOriginalName();
                $extension = $upload->getClientOriginalExtension();
                $isVideo = false;

                if ($extension == 'mp4') {
                    $isVideo = true;
                }

                $serverFilename = $upload->store('uploads');
                $token = str_random(64);

                $uploadModel = new Upload;
                $uploadModel->incident_id = $incident->id;
                $uploadModel->original_filename = $originalFilename;
                $uploadModel->storage_filename = $serverFilename;
                $uploadModel->token = $token;
                $uploadModel->is_video = $isVideo;
                $uploadModel->save();

            }

        }

        // Add YT Link
        if ($request->get('yt_link') != null) {

            $video = new Video;
            $video->incident_id = $incident->id;
            $video->url = $request->get('yt_link');
            $video->save();

        }

        return redirect()->route('incident.status', ['token' => $incidentToken]);

    }

    public function getIncidentStatus( $token )
    {
        $incident = Incident::where('token', $token)->first();

        if (empty($incident)) {
            return view('pages.incident.status', ['incident_title' => '']);
        }

        return view('pages.incident.status', ['incident_title' => $incident->title]);
    }

    public function show($slug)
    {

        $incident = Incident::where('slug', $slug)->first();

        if (empty($incident)) {

            abort(404);

        }

        $latest = Incident::where('approved', true)->orderBy('created_at', 'desc')->take(5)->get();

        return view('pages.incident.show', compact('incident', 'latest'));

    }

    private function createUniqueSlug($title)
    {
        $slug = str_slug($title);

        $incident = Incident::where('slug', '=', $slug)->first();

        if (!empty($incident)) {
            $slug .= '-' . str_random(5);
        }

        return $slug;
    }
}