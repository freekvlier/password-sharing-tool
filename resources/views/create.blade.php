<x-layout>
    <section class="text-gray-600 body-font relative lg:w-1/2 md:w-2/3 mx-auto">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Secure Password Sharing</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
                    A secure password sharing tool with unique link generation, customizable expiry dates, and view
                    limits. Passwords are stored securely and can only be decrypted using the unique link.
                </p>
            </div>

            @if(session('success'))
                <div class="mb-4 rounded-lg bg-success-100 px-6 py-5 text-base text-success-700">
                    <strong class="font-bold">{{ session('success')['message'] }} </strong><br><br>
                    @if(session('success')['link'])
                    <div>
                        Shareable link: <br> <a id="generatedlink" href="{{ session('success')['link'] }}" target="_blank">{{ session('success')['link'] }}</a>
                        
                        <button
                            id="copy-button"
                            type="button"
                            data-te-clipboard-init
                            data-te-clipboard-target="#generatedlink"
                            data-te-ripple-init
                            data-te-ripple-color="light"
                            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                            Copy
                        </button>
                    </div>
                    @endif
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-700" role="alert">
                    <strong class="font-bold">Error: </strong>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('store') }}" method="post">
                @csrf
                <div class="relative mb-4">
                    <label for="password"
                        class="mb-2 inline-block text-neutral-700 dark:text-neutral-200">Password</label>
                    <div class="relative flex flex-wrap items-stretch">
                        <input type="text"
                            class="relative m-0 block w-[1px] min-w-0 flex-auto rounded-r border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                            id="password" name="password" aria-describedby="password" value="{{ old('password') }}"/>
                    </div>
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative mb-4 flex flex-wrap items-stretch">
                    <label for="max_views" class="mb-2 inline-block text-neutral-700 dark:text-neutral-200">Times
                        Viewable</label>
                    <div class="flex flex-col space-y-2 w-full text-center">
                        <input type="range" id="max_views" name="max_views" min="1" max="20"
                            step="1" value="{{ old('max_views', 5) }}"
                            class="w-full transparent h-[4px] cursor-pointer appearance-none border-transparent bg-neutral-200 dark:bg-neutral-600" />
                        <span id="rangeValue">{{ old('max_views') }}</span>
                    </div>
                    @error('max_views')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative mb-4>
                    <label for="expiration_time"
                    class="mb-2 inline-block text-neutral-700 dark:text-neutral-200">Expiration
                    Time (Not Required)</label>
                    <div class="relative flex flex-wrap items-stretch" id="datetimepicker-timeOptions">
                        <input type="text"
                            class="relative m-0 block w-[1px] min-w-0 flex-auto rounded-r border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                            id="expiration_time" name="expiration_time" data-te-date-timepicker-toggle-ref value="{{ old('expiration_time') }}"/>
                    </div>
                    @error('max_views')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                <div>

                <div class="p-2 w-full">
                    <button type="submit"
                        class="flex mx-auto text-white bg-primary border-0 py-2 px-8 focus:outline-none hover:bg-primary-600 rounded text-lg">Generate
                        link</button>
                </div>
            </form>
    </section>
</x-layout>
