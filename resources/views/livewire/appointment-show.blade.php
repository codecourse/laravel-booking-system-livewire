<div class="space-y-12">
    <div>
        <h2 class="text-xl font-medium mt-3">Thanks, you're booked in/Cancelled</h2>
        <div class="flex mt-6 space-x-3 bg-slate-100 rounded-lg p-4">
            <img src="{{ $appointment->employee->profile_photo_url }}" class="rounded-lg size-14 bg-slate-100">
            <div class="w-full">
                <div class="flex justify-between">
                    <div class="font-semibold">
                        {{ $appointment->service->title }} ({{ $appointment->service->duration }} minutes)
                    </div>
                    <div class="text-sm">
                        {{ $appointment->service->price }}
                    </div>
                </div>
                <div class="text-sm">
                    {{ $appointment->employee->name }}
                </div>
            </div>
        </div>
    </div>

    <div>
        <h2 class="text-xl font-medium mt-3">When</h2>
        <div class="mt-6 bg-slate-100 rounded-lg p-4">
            {{ $appointment->starts_at->format('F d Y \a\t H:i') }} until {{ $appointment->ends_at->format('H:i') }}
        </div>
    </div>

    <form>
        <button class="text-blue-500">Cancel appointment</button>
    </form>
</div>
