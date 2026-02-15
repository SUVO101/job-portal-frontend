<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Counter;
use App\Models\JobPost;
use App\Models\State;
use App\Models\Subcategory;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class JobController extends Controller
{
    public function test(){
       // $jobs=JobPost::with('categories','companyDetail','states','subcategories','types','counter')->get()->sortByDesc('created_at');

       // for a single job details
//        $jobs = JobPost::with([
//     'categories:id,name',
//     'companyDetail:id,name,logo',
//     'states:id,name',
//     'subcategories:id,name',
//     'types:id,name',
//     'counter:id,job_post_id,view_count,apply_count'
// ])->findOrFail(1);

//pagination type
// $jobs=JobPost::orderBy('created_at','desc')->limit(5)->offset(5)->get();

// filter on type
// $jobs=Type::with('jobPosts:id,title,post_title,slug')->find(7);
//$jobs=Type::with('jobPosts:id,title,post_title,slug')->where('slug','xxxxxxxxxx')->get();
// $jobs=Type::with('jobPosts:id,title,post_title,slug')->find([2,7]);
// $jobs=Category::with('jobPosts:id,title,post_title,slug')->whereIn('slug',['xxxxxxx','xxxxxxxx'])->get();


// filter on category
// $jobs=Category::with('jobPosts:id,title,post_title,slug')->where('slug','teaching-jobs')->get();
// $jobs=Category::with('jobPosts:id,title,post_title,slug')->whereIn('slug',['teaching-jobs','bank-jobs'])->get();
// $jobs=Type::with('jobPosts:id,title,post_title,slug')->find([2,7]);

// with pagiate method
        // $jobs=JobPost::with([
        //     'categories:id,name',
        //     'companyDetail:id,name,logo',
        //     'states:id,name',
        //     'subcategories:id,name',
        //     'types:id,name',
        //     'counter:id,job_post_id,view_count,apply_count'
        // ])->orderBy('created_at','desc')->paginate(5);

        $jobs=JobPost::select(['id','title','post_title','slug'])->orderBy('created_at','desc')->paginate(5);  
        return $jobs;
    }


    public function index(){

        // $jobs=JobPost::with([
        //     'categories:id,name',
        //     'companyDetail:id,name,logo',
        //     'states:id,name',
        //     'subcategories:id,name',
        //     'types:id,name',
        //     'counter:id,job_post_id,view_count,apply_count'
        // ])->orderBy('created_at','desc')->paginate(5);

        //$jobs=JobPost::select(['id','title','post_title','slug'])->orderBy('created_at','desc')->paginate(5);  

        $states = State::select('short_name','slug')->where('status',true)->get();
        //$states = State::all();
        $categories = Category::select('name','slug')->where('status',true)->get();
        $subcategories = Subcategory::select('name','slug')->where('status',true)->get();
        $types = Type::select('name','slug')->where('status',true)->get();


        // $jobposts=JobPost::select(['id','company_detail_id','location','salary','post_title','slug'])->with('companyDetail:id,name,logo','counter:job_post_id,view_count,apply_count','types:name')->orderBy('created_at','desc')->where('status','published')->limit(5)->get();
        $jobposts = JobPost::select([
            'id',
            'company_detail_id',
            'location',
            'salary',
            'post_title',
            'slug'
        ])
            ->with([
                'companyDetail:id,name,logo',
                'counter:job_post_id,view_count,apply_count',
                'types:name'
            ])
            ->where('status', 'published')
            ->whereDate('expired_at', '>=', Carbon::today())
            ->orderByDesc(
                Counter::select('view_count')
                    ->whereColumn('job_post_id', 'job_posts.id')
                    ->limit(1)
            )
            ->limit(5)
            ->get();

        $recent_jobposts=JobPost::select(['id','post_title','location','salary','slug'])->orderBy('created_at','desc')->where('status','published')->limit(5)->get();
        $urgent_jobposts=JobPost::select(['id','post_title','slug'])->where('is_urgent',true)->orderBy('created_at','desc')->where('status','published')->limit(5)->get();
        $featured_jobposts=JobPost::select(['id','post_title','slug'])->where('is_featured',true)->orderBy('created_at','desc')->where('status','published')->limit(5)->get();

        // return [
        //     $states,
        //     $categories,
        //     $subcategories,
        //     $types,
        //     $jobposts,
        //     $urgent_jobposts,
        //     $featured_jobposts
        // ];
        return view('pages.home',compact('states','categories','subcategories','types','jobposts','recent_jobposts','urgent_jobposts','featured_jobposts'));
    }

    public function find_by_type(Request $request){
        $type=$request->type;
        $slug=$request->slug;

        $filterType=$type;
        $filterName=$slug;

        $jobposts=null;

        //$jobs=Type::with('jobPosts:id,title,post_title,slug')->where('slug','xxxxxxxxxx')->get();

        // $jobposts = State::with('jobPosts')->where('slug',$slug)->orderByDesc('created_at')->limit(5)->get();


        //         $jobposts = State::where('slug', $slug)
        // ->with([
        //     'jobPosts' => fn($q) => $q
        //         ->select([
        //             'job_posts.id',
        //             'job_posts.company_detail_id',
        //             'job_posts.post_title',
        //             'job_posts.slug',
        //             'job_posts.created_at'
        //         ])
        //         ->latest('job_posts.created_at')
        //         ->limit(5),
        //     'jobPosts.companyDetail:id,name,logo',
        //     'jobPosts.counter:id,job_post_id,view_count,apply_count',
        //     'jobPosts.types:id,name',
        // ])
        // ->first();

        if ($type === 'state') {

            $state = State::where('slug', $slug)->first();

            $jobposts = $state->jobPosts()
                ->select([
                    'job_posts.id',
                    'job_posts.company_detail_id',
                    'job_posts.post_title',
                    'job_posts.slug',
                    'job_posts.created_at'
                ])
                ->with([
                    'companyDetail:id,name,logo',
                    'counter:id,job_post_id,view_count,apply_count',
                    'types:id,name'
                ])
                ->latest('job_posts.created_at')
                ->paginate(3);

        }elseif($type === 'category'){
            $category = Category::where('slug', $slug)->first();

            $jobposts = $category->jobPosts()
                ->select([
                    'job_posts.id',
                    'job_posts.company_detail_id',
                    'job_posts.post_title',
                    'job_posts.slug',
                    'job_posts.created_at'
                ])
                ->with([
                    'companyDetail:id,name,logo',
                    'counter:id,job_post_id,view_count,apply_count',
                    'types:id,name'
                ])
                ->latest('job_posts.created_at')
                ->paginate(3);
        }elseif($type === 'subcategory'){
            $subcategory = Subcategory::where('slug', $slug)->first();

            $jobposts = $subcategory->jobPosts()
                ->select([
                    'job_posts.id',
                    'job_posts.company_detail_id',
                    'job_posts.post_title',
                    'job_posts.slug',
                    'job_posts.created_at'
                ])
                ->with([
                    'companyDetail:id,name,logo',
                    'counter:id,job_post_id,view_count,apply_count',
                    'types:id,name'
                ])
                ->latest('job_posts.created_at')
                ->paginate(3);
        }elseif($type === 'type'){
            $type = Type::where('slug', $slug)->first();

            $jobposts = $type->jobPosts()
                ->select([
                    'job_posts.id',
                    'job_posts.company_detail_id',
                    'job_posts.post_title',
                    'job_posts.slug',
                    'job_posts.created_at'
                ])
                ->with([
                    'companyDetail:id,name,logo',
                    'counter:id,job_post_id,view_count,apply_count',
                    'types:id,name'
                ])
                ->latest('job_posts.created_at')
                ->paginate(3);
        }elseif($type === 'all'){
            $jobposts = JobPost::select([
                'job_posts.id',
                'job_posts.company_detail_id',
                'job_posts.post_title',
                'job_posts.slug',
                'job_posts.created_at'
            ])
            ->with([
                'companyDetail:id,name,logo',
                'counter:id,job_post_id,view_count,apply_count',
                'types:id,name'
            ])
            ->latest('job_posts.created_at')
            ->paginate(3);
        }

        // return [
        //     $type,
        //     $slug,
        //     $jobposts
        // ];
        return view('pages.allJobs',compact('jobposts','filterType','filterName'));
        
    }

    public function find_by_slug(Request $request){
        $slug=$request->slug;

        $jobpost=JobPost::where('slug',$slug)
        ->with([
            'companyDetail:id,name,logo,description,website,email,phone',
            'counter:id,job_post_id,view_count,apply_count',
            'types:id,name,slug',
            'states:id,name,slug',
            'categories:id,name,slug',
            'subcategories:id,name,slug',
            'media:id,file_name,file_path'
        ])
        ->first();

        //return $jobpost;

        return view('pages.jobDetails',compact('jobpost'));
    }
}
