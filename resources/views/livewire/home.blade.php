<div class="space-y-10">
    <div>
        <h2 class="text-xl font-medium">Choose a professional</h2>
        <div class="grid grid-col-2 md:grid-cols-5 gap-8 mt-6">
            @foreach($employees as $employee)
                <a href="{{ route('employees.show', $employee) }}" class="py-8 px-4 border border-slate-200 rounded-lg shadow-sm flex flex-col items-center justify-center text-center hover:bg-gray-50/75">
                    <img src="{{ $employee->profile_photo_url }}" class="rounded-full size-14">
                    <div class="text-sm font-medium mt-3 text-slate-600">
                        {{ $employee->name }}
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div>
        <h2 class="text-xl font-medium">Or, choose a service first</h2>
        <div class="grid grid-col-2 md:grid-cols-5 gap-8 mt-6">
            @foreach($services as $service)
                <x-service :href="route('checkout', [$service])" :service="$service" />
            @endforeach
        </div>
    </div>
</div>
