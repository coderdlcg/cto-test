<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List employees') }}
        </h2>
    </x-slot>
    <div class="flex flex-row justify-between mb-6">
        <a href="#"
           class="py-2 px-4 bg-gray-200 hover:bg-gray-300 rounded-xl"
           id="import"
           onclick="openModal()"
        >+ {{__("Import")}}</a>
    </div>
    @error('file_input')
    <div class="alert alert-danger p-2 bg-red-200 text-red-700 rounded-lg mb-2">{{ $message }}</div>
    @enderror
    <div class="bg-white overflow-hidden sm:rounded-lg">
        <table class="min-w-max w-full table-auto rounded-lg">
            <thead>
                <tr class="rounded-t-lg bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="rounded-tl-lg py-3 px-6 text-left">Id</th>
                    <th class="rounded-tr-lg py-3 px-6 text-right">Full name</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($employees as $employee)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $employee->id }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-right">
                            <a class="text-sky-500" href="{{ route('reportByEmployee', $employee->id) }}">{{ $employee->full_name }}</a>
                        </td>
                    </tr>
                @endforeach

                <tr class="rounded-t-lg bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="rounded-bl-lg py-3 px-6 text-left"></th>
                    <th class="rounded-br-lg py-3 px-6 text-center"></th>
                </tr>
            </tbody>
        </table>
    </div>
    {{ $employees->links('components.paginate') }}

    <x-modal-import :action="route('employees_import')"/>
</x-app-layout>
