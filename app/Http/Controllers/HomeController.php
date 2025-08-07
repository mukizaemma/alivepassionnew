<?php

namespace App\Http\Controllers;
use App\Models\News;

use App\Models\Team;
// use Google\Recaptcha\Recaptcha;
use App\Models\About;
use App\Models\Event;
use App\Models\Image;
use App\Models\Slide;
use App\Models\Donate;
use App\Models\Impact;
use App\Models\Member;
use App\Models\Campain;
use App\Models\Country;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Setting;
use ReCaptcha\ReCaptcha;
use App\Models\Testimony;
use App\Models\Volunteer;
use App\Mail\ReplyMessage;
use App\Models\Background;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function redirects(){
        $role = Auth::user()->role;
        if($role ==1){
            $slides = Slide::latest()->get();
            $messages = Message::all();
            // $members = Member::latest()->get();

            return view('admin.dashboard',[
                'slides'=>$slides,
                'messages'=>$messages
                ]);
        }
        else{


            $programs = Program::oldest()->get();
            $about = About::first();
            $homeGallery = DB::table('galleries')->latest()->get();
            $events = DB::table('events')->latest()->get();
            $slides = DB::table('slides')->latest()->get();
            $testimonials = DB::table('testimonies')->latest()->get();
            $staff = DB::table('teams')->orderby('id','asc')->where('display','Yes')->get();

            return view('frontend.home', [
                'programs' =>$programs,
                'homeGallery' =>$homeGallery,
                'events' =>$events,
                'slides' =>$slides,
                'testimonials' =>$testimonials,
                'staff' =>$staff,
                'about' =>$about,
            ]);
        }
    }

    public function index(){
        $background = DB::table('backgrounds')->latest()->get();
        $programs = Program::oldest()->get();
        $about = background::first();
        $mission = About::first();
        $homeGallery = DB::table('galleries')->latest()->get();
        $campaigns = Campain:: latest()->get();
        $events = DB::table('events')->latest()->get();
        $slides = Slide::orderBY('id','asc')->latest()->get();
        $testimonials = Testimony::latest()->paginate(3);
        $news = DB::table('news')->latest()->get();
        $partners = DB::table('partners')->latest()->get();
        $staff = DB::table('teams')->orderby('id','asc')->where('display','Yes')->get();

        return view('frontend.home', [
            'background' =>$background,
            'programs' =>$programs,
            'homeGallery' =>$homeGallery,
            'events' =>$events,
            'slides' =>$slides,
            'testimonials' =>$testimonials,
            'news' =>$news,
            'partners' =>$partners,
            'staff' =>$staff,
            'about' =>$about,
            'mission' =>$mission,
            'campaigns' =>$campaigns,
        ]);
    }

    public function backgroundDetails(){

        $programs = Program::latest()->get();
        $partners = Partner::oldest()->get();
        $about = background::first();
        $mission = About::first();
        $testimonials = DB::table('testimonies')->paginate(3);
        return view('frontend.about',['about'=>$about,'mission'=>$mission,'testimonials' =>$testimonials,'programs'=>$programs, 'partners'=>$partners]);
    }
    public function team(){
        $programs = Program::latest()->get();
        $team = Team::where('category','Administration')->oldest()->get();
        $advisors = Team::where('category','Advisors')->oldest()->get();
        $operations = Team::where('category','Operations')->oldest()->get();
        $about = background::first();
        return view('frontend.team',['team'=>$team,'programs'=>$programs,'about'=>$about,'advisors'=>$advisors,'operations'=>$operations]);
    }
    public function testimonials(){
        $programs = Program::latest()->get();
        $testimonials = Testimony:: latest()->get();
        $about = background::first();
        return view('frontend.testimonials',['testimonials'=>$testimonials,'programs'=>$programs, 'about'=>$about]);
    }
    public function testimony($id){
        $testimony = testimony::where('id',$id)->first();
        $programs = Program:: latest()->get();
        $about = background::first();
        $testimonials = Testimony:: where('id','!=',$testimony)->paginate(6);
        return view('frontend.testimony',['testimony'=>$testimony, 'programs'=>$programs,'testimonials'=>$testimonials,'about'=>$about]);
    }
    public function showPrograms(){
        $programs = Program::oldest()->get();
        $about = background::first();
        return view('frontend.programs',['programs'=>$programs, 'about'=>$about]);
    }
    public function singleProgram($slug){
        $program = Program::where('slug',$slug)->firstOrFail();
        $programs = Program::where('id' ,'!=',$program->id)->oldest()->get();
        $about = background::first();
        $gallery = Gallery::latest()->get();
        $news = News::latest()->paginate(9);
        return view('frontend.program',['program'=>$program, 'programs'=>$programs, 'about'=>$about, 'gallery'=>$gallery,'news'=>$news]);
    }
    public function campaigns(){
        $programs = Program::oldest()->get();
        $campaigns = Campain::latest()->get();
        $about = background::first();
        return view('frontend.campaigns',['campaigns'=>$campaigns, 'about'=>$about,'programs'=>$programs]);
    }
    public function campaign($slug){
        $campaign = Campain::where('slug',$slug)->firstOrFail();
        $campaigns = Campain::where('id' ,'!=',$campaign->id)->oldest()->get();
        $about = background::first();
        $programs = Program::oldest()->get();
        $testimonials = DB::table('testimonies')->paginate(6);
        return view('frontend.campaign',['campaign'=>$campaign, 'campaigns'=>$campaigns, 'about'=>$about, 'testimonials'=>$testimonials,'programs'=>$programs]);
    }


    public function Sponsorship(){
        $data = Sponsorship::latest()->get();
        return view('frontend.sponsorship',['data'=>$data]);
    }
    public function childDetail($id){
        $data = Sponsorship::find($id);
        return view('frontend.sponsorshipDetails',['data'=>$data]);
    }
    public function events(){
        $events = Event::latest()->get();
        return view('frontend.events',['events'=>$events]);
    }
    public function posts(){
        $news = News::latest()->paginate(20);
        $programs = Program::latest()->get();
        $about = background::first();
        return view('frontend.blogs',['news'=>$news,'programs'=>$programs, 'about'=>$about]);
    }

    public function postSingle($slug){
        $blogs = News::latest()->get();
        $blog = News::where('slug',$slug)->first();
        $relatedBlogs = News::where('id','!=',$blog->id)->latest()->take(9);
        $programs = Program::latest()->get();
        $about = background::first();
        return view('frontend.blog',['blog'=>$blog,'blogs'=>$blogs,'relatedBlogs'=>$relatedBlogs,'programs'=>$programs,'about'=>$about]);
    }

    public function gallery(){
        $gallery = Image::with('program')->latest()->get();
        $programs = Program::with('images')->get();
        return view('frontend.gallery',['gallery'=>$gallery,'programs'=>$programs]);
    }

    public function impacts(){
        $impacts = Impact::latest()->get();
        $programs = Program::latest()->get();
        return view('home.impacts',['impacts'=>$impacts,'programs'=>$programs]);
    }
    public function contacts(){
        $contact = Setting::all()->first();
        $programs = Program::latest()->get();
        $about = background::first();
        return view('frontend.contact',['programs'=>$programs,'contact'=>$contact, 'about'=>$about]);
    }

    public function sendMessage(Request $request){

        $validatedData = $request->validate([
            'names' => 'required|max:255',
            'email' => 'required|max:255',
            'message' => 'required'
        ]);
        $blog = Message::firstOrCreate(
            [
                'names' => $request->input('names'),
                'email' => $request->input('email'),
                'message' => $request->input('message'),
            ]
        );
        return redirect()->back()->with('success', 'Your Message has been well submitted. We will get back to you soon');
    }

    public function webMessages(){

        $messages = Message::all();
        return view('admin.dashboard', ['messages'=>$messages]);
    }

    public function messageReply($id){

        $data = Message::find($id);
        return view('admin.emails.messageReply',['data'=>$data]);
    }

    public function sendReply(Request $request)
    {
        $data = [
            'email' => $request->email,
            'reply' => $request->reply,
        ];
        Mail::to($request->email)->send(new ReplyMessage($data));
        return redirect()->back()->with('success', 'Reply sent successfully');
    }


    public function members(){
        $countries = Country::all();
        $programs = Ministry::all();
        return view('frontend.becomeMember',[
            'countries'=>$countries,
            'programs'=>$programs
            ]);
    }
    public function volunteer(){
        return view('frontend.volunteer');
    }
    public function donate(){
        $countries = Country::all();
        $children = Sponsorship::where('status','Not Sponsored')->get();
        return view('frontend.donate',[
            'countries'=>$countries,
            'children'=>$children
            ]);
    }

    public function saveDonation(Request $request){
        $data = new donate();
        $data->names = $request->names;
        $data ->email = $request->email;
        $data ->amount = $request->amount;
        $data ->program_id = $request->program_id;
        $data ->period = $request->period;
        $data ->country = $request->country;

        $stored = $data->save();

        if($stored){
            return redirect()->back()->with('success', 'Thank you for pledging to sponsor our Child. We will get back to you soon for more details!');
        }

    }

    public function saveMember(Request $request){
        $data = new Member();
        $data->names = $request->names;
        $data ->phone = $request->phone;
        $data ->address = $request->address;
        $data ->gender = $request->gender;
        $data ->martual = $request->martual;
        $data ->membership = $request->membership;
        $data ->dateJoined = $request->dateJoined;

        $stored = $data->save();

        if($stored){
            return redirect()->back()->with('success', 'Thank you for your membership. We will get back to you soon for more details');
        }

    }


    public function programDetail($id){
        $data = Program::find($id);
        return view('frontend.programDetails',['data'=>$data]);
    }

    public function setting(){
        $data = Setting::first();
        if($data===null)
        {
            $data = new Setting();
            $data->title = 'Company Name';
            $data->save();
            $data = Setting::first();
        }

        return view('admin.settings', ['data'=>$data]);
    }



    public function saveSetting(Request $request){
        $data = Setting::first();
        $data->company = $request->input('company');
        $data->address = $request->input('address');
        $data->phone = $request->input('phone');
        $data->phone1 = $request->input('phone1');
        $data->email = $request->input('email');
        $data->keywords = $request->input('keywords');
        $data->facebook = $request->input('facebook');
        $data->instagram = $request->input('instagram');
        $data->youtube = $request->input('youtube');


        if ($request->hasFile('logo') && request('logo') != '') {
            $dir = 'public/images';

            if (File::exists($dir)) {
                unlink($dir);
            }
            $path = $request->file('logo')->store($dir);
            $fileName = str_replace($dir, '', $path);

            $data->logo = $fileName;
        }

        $data->update();

        return redirect()->back()->with('success', 'Setting has been updated successfully');
    }

    public function about(){
        $data = About::first();
        if($data===null)
        {
            $data = new About();
            $data->vision = 'Alleviate poverty among single-teen mothers in Rutsiro District by providing tailoring trainings';
            $data->save();
            $data = About::first();
        }

        return view('admin.about', ['data'=>$data]);
    }

    public function saveAbout(Request $request, $id){
        $data = About::first();
        $data->mission = $request->input('mission');
        $data->vision = $request->input('vision');
        $data->values = $request->input('values');


        if ($request->hasFile('backImage') && request('backImage') != '') {
            $dir = 'public/images';

            if (File::exists($dir)) {
                unlink($dir);
            }
            $path = $request->file('backImage')->store($dir);
            $fileName = str_replace($dir, '', $path);

            $data->backImage = $fileName;
        }

        $data->update();

        return redirect()->back()->with('success', 'Setting has been updated successfully');
    }

    public function logoutUser(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function registerUser(){
        return view('frontend.registerUser');
    }

    public function loginUser(){
        return view('frontend.loginUser');
    }

    public function deleteDonation($id){
        $data = Donation::find($id);
        $data->delete($id);
        return redirect()->back()->with('warning','Donation has been deleted!');
    }


}
