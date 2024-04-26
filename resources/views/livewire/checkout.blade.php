<form class="space-y-10">
    <div>
        {{ $form->date }}
        <h2 class="text-xl font-medium">Here's what you're booking</h2>
        <div class="mt-6 flex space-x-3 bg-slate-100 rounded-lg p-4">
            @if($employee)
                <img src="{{ $employee->profile_photo_url }}" class="rounded-lg size-14 shrink-0">
            @else
                <div class="rounded-lg size-14 bg-slate-200 shrink-0"></div>
            @endif

            <div class="w-full flex justify-between">
                <div>
                    <div class="font-semibold">{{ $service->title }} ({{ $service->duration }} minutes)</div>
                    <div>{{ $employee->name ?? 'Any employee' }}</div>
                </div>
                <div>
                    {{ $service->price }}
                </div>
            </div>
        </div>
    </div>

    <div>
        <h2 class="text-xl font-medium">1. When for?</h2>
        <input class="mt-6 text-sm bg-slate-100 border-0 rounded-lg px-6 py-4 w-full" placeholder="Choose a date">
    </div>

    <div>
        <h2 class="text-xl font-medium">2. Choose a slot</h2>
        <div class="mt-6">
            <div class="grid grid-cols-3 md:grid-cols-5 gap-8">
                <button type="button" class="py-3 px-4 text-sm border border-slate-200 rounded-lg text-center hover:bg-gray-50/75 cursor-pointer">
                    09:00
                </button>
            </div>
        </div>
    </div>

    <div>
        <h2 class="text-xl font-medium">2. Your details and book</h2>

        <div class="bg-slate-900 text-white py-4 px-6 rounded-lg mt-3">
            Error
        </div>

        <div class="mt-6">
            <div>
                <label for="name" class="sr-only">Your name</label>
                <input type="text" name="name" id="name" class="mt-1 text-sm bg-slate-100 border-0 rounded-lg px-6 py-4 w-full" placeholder="Your name">
            </div>
            <div class="mt-3">
                <label for="email" class="sr-only">Your email</label>
                <input type="text" name="email" id="email" class="mt-1 text-sm bg-slate-100 border-0 rounded-lg px-6 py-4 w-full" placeholder="Your email">
            </div>
            <button type="submit" class="mt-6 py-3 px-6 text-sm border border-slate-200 rounded-lg flex flex-col items-center justify-center text-center hover:bg-slate-900 cursor-pointer bg-slate-800 text-white font-medium">
                Make booking
            </button>
        </div>
    </div>
</form>
