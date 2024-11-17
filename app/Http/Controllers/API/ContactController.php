<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Contact;
use PhpParser\Node\Stmt\TryCatch;

class ContactController extends Controller
{
    public function store(Request $request) {
        
        try {
            $data = $request->all();

            $contact = Contact::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Ok'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data',
                'error' => $th->getMessage()
            ], 400);
        }
    }
}
