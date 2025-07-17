@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Role</th>
                    <th class="px-4 py-2 border">Change Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="px-4 py-2 border">{{ $user->name }}</td>
                        <td class="px-4 py-2 border">{{ $user->email }}</td>
                        <td class="px-4 py-2 border">{{ $user->roles->pluck('name')->first() ?? 'None' }}</td>
                        <td class="px-4 py-2 border">
                            <select class="role-select border rounded px-2 py-1" data-user-id="{{ $user->id }}">
                                <option value="seller" @if($user->hasRole('seller')) selected @endif>Seller</option>
                                <option value="customer" @if($user->hasRole('customer')) selected @endif>Customer</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.role-select').forEach(function(select) {
        select.addEventListener('change', function() {
            const userId = this.getAttribute('data-user-id');
            const role = this.value;
            fetch(`/admin/users/${userId}/role`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ role })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Optionally show a success message or update the UI
                } else {
                    alert('Failed to update role.');
                }
            });
        });
    });
});
</script>
@endsection 