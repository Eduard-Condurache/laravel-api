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

        $data = $request->validate([
            'name' => 'required|min:3|max:64',
            'email' => 'required|email|min:6|max:255'
        ]);
        
        try {

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
