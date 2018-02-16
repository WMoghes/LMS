<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

use App\Http\Requests;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::find(1);
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'delay_cost' => 'required',
            'limit_borrowing' => 'required',
        ]);

        Setting::findOrFail(1)->update([
            'delay_cost' => $request->delay_cost,
            'limit_borrowing' => $request->limit_borrowing
        ]);
        return redirect()->route('settings')
            ->withStatus("Settings has been updated successfully.");
    }
}
