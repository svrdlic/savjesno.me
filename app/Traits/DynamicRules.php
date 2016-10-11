<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Mockery\Exception\RuntimeException;

trait DynamicRules
{
    public function incidentRules(Request $request)
    {
        $rules = [
            'title' => 'required|max:128',
            'violations' => 'required|array',
            'occurred_at' => 'required|date_format:Y-m-d H:i:00',
            'city_id' => 'required|integer',
            'yt_link' => 'url'
        ];

        $nbr = count($request->file('uploads')) - 1;
        foreach(range(0, $nbr) as $index) {
            $rules['uploads.' . $index ] = 'file|mimes:jpeg,png,mp4|max:50000';
        }

        return $rules;
    }

    public function incidentMessages(Request $request)
    {
        $messages = [
            'title.required' => 'Naslov je obavezan.',
            'violations.required' => 'Barem jedan prekršaj je obavezan.',
            'occurred_at.required' =>  'Vrijeme kada se prekršaj dogodio je obavezno.',
            'occurred_at.date_format' => 'Format vremena nije dobar, mora biti: DD-MM-YYYY HH:mm',
            'city_id.required' => 'Grad je obavezan',
            'city_id.integer' => 'Niste selektovali validan grad',
            'plates.*.required' => 'Tablice počinioca su obavezne.',
            'uploads.required' => 'Barem jedan prilog je obavezan.',
            'yt_link.url' => 'Youtube link nije validan.'
        ];

        $uploads = $request->file('uploads');
        $index = 0;

        if ($uploads) {
            foreach($uploads as $upload) {
                $messages['uploads.' . $index . '.file' ] = 'Kao prilog možete poslati samo fajl. Ukoliko imate link unesite ga u opis.';
                $messages['uploads.' . $index . '.mimes'] = 'Format uploadovanog fajla ' . $upload->getClientOriginalName() . ' nije dobar, može biti: jpeg, png ili mp4.';
                $messages['uploads.' . $index++ . '.max'] = 'Fajl na može imati više od 50MB, video fajl skratite koliko traje i prekršaj.';
            }
        }


        return $messages;
    }

    public function incidentCustomAttributes(Request $request)
    {
        $attributes = [];

        $uploads = $request->file('uploads');
        $index = 0;

        if ($uploads) {
            foreach($uploads as $upload) {
                $attributes['uploads.' . $index++] = $upload->getClientOriginalName();
            }
        }

        return $attributes;
    }
}