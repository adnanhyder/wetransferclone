<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Set Limit in Megabyte</h2>
                    <br>
                    <div class="max-w-7xl container mx-auto">
                        <form class="form-inline" method="post" action="{{route('save_limit')}}">
                            <div>
                                @csrf
                                <label class="block font-medium text-sm text-gray-700" for="email">
                                    For Registered Users:
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                    id="registerusers" value="{{$main['registered']}}" placeholder="1024" type="text" name="reg_limit" required="required" autofocus="autofocus"
                                    >
                            </div>
                            <div class="mt-6">
                                <label class="block font-medium text-sm text-gray-700" for="email">
                                    For Guests:
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                    id="guest" value="{{$main['guest']}}" type="text" placeholder="1024" name="gest_limit" required="required" autofocus="autofocus"
                                >
                            </div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mt-6">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
