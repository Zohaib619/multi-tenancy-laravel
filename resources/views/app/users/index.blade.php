<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
            <x-btn-link href="{{ route('users.create') }}" class="ml-4 float-right">Add User</x-btn-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-900 dark:text-gray-900">
                            <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-100 dark:text-gray-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Role
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action 
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="bg-white  dark:bg-gray-100 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                                            {{ $user->name }}
                                        </th>
                                        <th class="px-6 py-4">
                                            {{ $user->email }}
                                        </th>
                                        <th class="px-6 py-4">
                                            @foreach($user->roles as $role)
                                                {{ $role->name }} {{ $loop->last ? "" : "," }}
                                            @endforeach
                                        </th>
                                        <th class="px-6 py-4">
                                            <x-btn-link href="{{ route('users.edit', $user->id) }}">Edit</x-btn-link>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-tenant-app-layout>
