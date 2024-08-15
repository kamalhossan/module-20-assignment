<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function index( Request $request ) {

        $query = Contact::query();

        if ( $request->input( 'search' ) ) {
            $query->where( 'name', 'like', '%' . $request->input( 'search' ) . '%' )
                ->orWhere( 'email', 'like', '%' . $request->input( 'search' ) . '%' );
        }

        $sortField = $request->input( 'sort', 'name' );
        $sortDirection = $request->input( 'direction', 'asc' );

        // if ( $request->input( 'sort' ) ) {
        //     $query->orderBy( $request->input( 'sort' ), $request->input( 'direction', 'desc' ) );
        // } else {
        //     $query->orderBy( 'name' );
        // }

        // if ( $request->input( 'created_at' ) ) {
        //     $query->whereDate( 'created_at', $request->input( 'created_at' ) );
        // }

        $query->orderBy( $sortField, $sortDirection );

        // If filtering by date is needed
        if ( $date = $request->input( 'created_at' ) ) {
            $query->whereDate( 'created_at', $date );
        }

        // $contacts = Contact::orderBy( 'name' )->get();

        $contacts = $query->get();

        return view( 'contacts.index', compact( 'contacts' ) );
    }

    public function create() {
        return view( 'contacts.create' );
    }

    public function store( Request $request ) {

        $validated = $request->validate( [
            'name'    => 'required',
            'email'   => 'required',
            'phone'   => 'nullable',
            'address' => 'nullable',
        ] );

        Contact::create( $validated );

        return redirect()->route( 'contacts.index' )->with( 'success', 'Contact created successfully.' );

    }
    public function show( $id ) {

        $contacts = Contact::find( $id );

        return view( 'contacts.show', compact( 'contacts' ) );
    }
    public function edit( $id ) {

        $contacts = Contact::find( $id );

        return view( 'contacts.edit', compact( 'contacts' ) );
    }
    public function update( Request $request, $id ) {

        $validated = $request->validate( [
            'name'    => 'required',
            'email'   => 'required|unique:contacts,email,' . $id,
            'phone'   => 'nullable',
            'address' => 'nullable',
        ] );

        $contact = Contact::findOrFail( $id );
        $contact->update( $validated );

        return redirect()->route( 'contacts.index' )->with( 'success', 'Contact updated successfully.' );

    }
    public function destroy( $id ) {

        $contact = Contact::findOrFail( $id );

        $contact->delete();

        return redirect()->route( 'contacts.index' )->with( 'success', 'Contact deleted successfully.' );
    }
}
