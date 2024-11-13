<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\YourExport;

class ArchiveController extends Controller
{
    //

    public function index($id){

        $data['posts'] = Post::where('userId',$id)->get();

        return view('profile.archive',$data);
    }

    

    public function export()
    {
        return Excel::download(new YourExport, 'your_file.xlsx');
    }

}
