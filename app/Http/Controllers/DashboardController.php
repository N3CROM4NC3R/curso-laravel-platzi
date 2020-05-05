<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class DashboardController extends Controller{
        public function index(Request $request ){

            $title = $request->query('title','Valor default');
            dd($this->getRequest());

            $context = [
                'title' => $title
            ];

            return view('test',$context);
        }


    }
?>
