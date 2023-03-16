<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Reports by employees') }}
                </h2>
            </x-slot>
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <table class="min-w-max w-full table-auto rounded-lg">
                    <thead>
                        <tr class="rounded-t-lg bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="rounded-tl-lg py-3 px-6 text-left">Id</th>
                            <th class="py-3 px-6 text-left">Full name</th>
                            <th class="rounded-tr-lg py-3 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium">1</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    asd
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">

                                </div>
                            </td>
                        </tr>

                        <!--table footer-->
                        <tr class="rounded-t-lg bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="rounded-bl-lg py-3 px-6 text-left"></th>
                            <th class="py-3 px-6 text-left"></th>
                            <th class="rounded-br-lg py-3 px-6 text-center"></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
