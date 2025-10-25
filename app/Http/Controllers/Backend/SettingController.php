<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use App\Models\PrivacyPolicy;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function showSetting ()
    {
        if(Auth::user()){
            if(Auth::user()->role == 1){
                $settings = Setting::first();
                return view('backend.admin.settings', compact('settings'));
            }
        }
    }

    public function updateSetting (Request $request)
    {
        if(Auth::user()){
            if(Auth::user()->role == 1){
                $settings = Setting::first();

                if(isset($request->logo)){
                    if($settings->logo && file_exists('backend/images/settings/'.$settings->logo)){
                        unlink('backend/images/settings/'.$settings->logo);
                    }
                    $imageName = rand().$settings->slug.'.'.$request->logo->extension();
                    $request->logo->move('backend/images/settings/',$imageName);
                    $settings->logo = $imageName;
                }

                $settings->phone = $request->phone;
                $settings->email = $request->email;
                $settings->address = $request->address;
                $settings->facebook = $request->facebook;
                $settings->twiter = $request->twiter;
                $settings->instagram = $request->instagram;
                $settings->linkedin = $request->linkedin;
                $settings->youtube = $request->youtube;

                $settings->save();
                return redirect()->back();
            }
        }
    }

    public function showHomeBanner()
    {
        if(Auth::user()){
            if(Auth::user()->role == 1){
                $homeBanner = HomeBanner::first();
                return view('backend.admin.home-banner', compact('homeBanner'));
            }
        }
    }

    public function updateHomeBanner(Request $request)
    {
        if(Auth::user()){
            if(Auth::user()->role == 1){
                $homeBanner = HomeBanner::first();

                if(isset($request->banner)){
                    if($homeBanner->banner && file_exists('backend/images/settings/'.$homeBanner->banner)){
                        unlink('backend/images/settings/'.$homeBanner->banner);
                    }
                    $imageName = rand().'-banner-'.'.'.$request->banner->extension();
                    $request->banner->move('backend/images/settings/',$imageName);
                    $homeBanner->banner = $imageName;
                }

                $homeBanner->save();
                toastr()->success('Home Banner Updated Successfully');
                return redirect()->back();
            }
        }
    }

    public function showPrivacyPolicy()
    {
        if(Auth::user()){
            if(Auth::user()->role == 1){
                $privacyPolicy = PrivacyPolicy::first();
                return view ('backend.admin.privacy-policy', compact('privacyPolicy'));
            }
        }
    }
    public function updatePrivacyPolicy(Request $request)
    {
        if(Auth::user()){
            if(Auth::user()->role == 1){
                $privacyPolicy = PrivacyPolicy::first();
                $privacyPolicy->description = $request->description;
                $privacyPolicy->save();
                toastr()->success('Privacy Policy Updated Successfully');
                return redirect()->back();
            }
        }
    }

    // Authentication
    public function adminLogout()
    {
        Auth::logout();
        return redirect('/admin/login');

    }

    public function adminCredentials ()
    {
        if(Auth::user()){
            if(Auth::user()->role == 1 || Auth::user()->role == 2){
                $authUser = Auth::user();
                return view ('backend.admin.credentials', compact('authUser'));
            }
        }
    }

    public function adminCredentialsUpdate (Request $request)
    {
        if(Auth::user()){
            if(Auth::user()->role == 1 || Auth::user()->role == 2){
                $authUser = Auth::user();
                if(password_verify($request->old_password, $authUser->password)){
                    $authUser->password = $request->password;
                    $authUser->save();
                    Auth::logout();
                    toastr()->success('Password Updated Successfully');
                    return redirect('/admin/login');
                }
                else{
                    toastr()->error('Old Password Not Matched');
                    return redirect()->back();
                }
            }
        }
    }
}
