<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenant') }}
            <x-btn-link href="{{ route('tenants.create') }}" class="ml-4 float-right">Add Tenant</x-btn-link>
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
                                        Domain
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action 
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tenants as $tenant)
                                    <tr class="bg-white  dark:bg-gray-100 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                                            {{ $tenant->name }}
                                        </th>
                                        <th class="px-6 py-4">
                                            {{ $tenant->email }}
                                        </th>
                                        <th class="px-6 py-4">
                                            @foreach ($tenant->domains as $domain)
                                                {{ $domain->domain }} {{ $loop->last ? "": "," }}
                                            @endforeach
                                        </th>
                                        <th class="px-6 py-4">
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
</x-app-layout>
