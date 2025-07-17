@extends('layouts.app')

@section('content')
<!-- component -->
<div class="text-gray-900 bg-gray-200">
    <div class="p-4 flex">
        <h1 class="text-3xl">Users</h1>
    </div>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Name</th>
                    <th class="text-left p-3 px-5">Email</th>
                    <th class="text-left p-3 px-5">Role</th>
                    <th class="text-left p-3 px-5">Action</th>
                </tr>
                @foreach($users as $user)
                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                    <td class="p-3 px-5">
                        {{ $user->name }}
                    </td>
                    <td class="p-3 px-5">
                        {{ $user->email }}
                    </td>
                    <td class="p-3 px-5">
                        <form method="POST" action="{{ url('/admin/update-role') }}" class="flex items-center">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <select name="role" class="bg-transparent border-b-2 border-gray-300 py-2 mr-2">
                                <option value="admin" @if($user->hasRole('admin')) selected @endif>admin</option>
                                <option value="seller" @if($user->hasRole('seller')) selected @endif>seller</option>
                                <option value="customer" @if($user->hasRole('customer')) selected @endif>customer</option>
                            </select>
                            <button type="submit" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button>
                        </form>
                    </td>
                    <td class="p-3 px-5 flex justify-end">
                        <!-- You can add more actions here if needed -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 