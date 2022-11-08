<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('i.messages') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Create a new message</h1>
                    <form action="{{ route('messages.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <!-- Subject Form Input -->
                            <div class="form-group">
                                <label class="control-label">Subject</label>
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    value="{{ old('subject') }}">
                            </div>

                            <!-- Message Form Input -->
                            <div class="form-group">
                                <label class="control-label">Message</label>
                                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                            </div>

                            @if ($users->count() > 0)
                                <div class="checkbox">
                                    @foreach ($users as $user)
                                        <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]"
                                                value="{{ $user->id }}">{!! $user->name !!}</label>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Submit Form Input -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
