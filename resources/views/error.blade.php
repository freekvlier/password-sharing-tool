<x-layout>
    <section class="text-gray-600 body-font relative lg:w-1/2 md:w-2/3 mx-auto">
        <div class="flex justify-center container px-5 py-24 mx-auto">
            <div class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-700" role="alert">
                <span class="font-bold">Status Code: {{ $statusCode }}</span>
                <span class="block mt-2">Exception: {{ $exceptionMessage }}</span>
            </div>
        </div>
    </section>
</x-layout>
