@extends('layouts.app')

@section('page-title', 'Contacts')

@section('main-content')
    <div class="row">
        <div class="col">
            <table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Elimina</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($contacts as $contact)
                  <tr>
                    <th scope="row">{{ $contact->id }}</th>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                      <form
                        onsubmit="return confirm('Sei sicuro di voler cancellare questo contatto?')" 
                        action="{{ route('admin.contacts.destroy',['contact' => $contact->id]) }}" 
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                          Elimina
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection