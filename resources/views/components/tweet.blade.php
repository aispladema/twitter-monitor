<div class="bg-white shadow overflow-hidden my-4 sm:rounded-lg">
    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{$tweet['text']}}
        </h3>
        <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
            {{ $tweet['timestamp']->diffForHumans() }}
        </p>
    </div>
    <div>
        <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dd class="text-sm leading-5 font-medium text-gray-500">
                    User
                </dd>
                <dt class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$tweet['user_id']}}
                </dt>
                <dd class="text-sm leading-5 font-medium text-gray-500">
                    Location
                </dd>
                <dt class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$tweet['latitude']}}, {{$tweet['longitude']}}
                </dt>
            </div>

        </dl>
    </div>
</div>
