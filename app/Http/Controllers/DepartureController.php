<?php

namespace App\Http\Controllers;

use App\RepositoryInterface\DepartureRepositoryInterface;
use Illuminate\Http\Request;

class DepartureController extends Controller
{
    

    private $departure;
    
    public function __construct(DepartureRepositoryInterface $departure)
    {
        $this->departure = $departure;
    }
    
    public function query(Request $request)
    {
        
        $data = $this->departure->query($request->query('query'));

        return response($data);
    }
}
