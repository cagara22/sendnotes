<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with(): array
    {
        return [
            'notes' => Auth::user()->notes()->orderBy('send_date', 'asc')->get()
        ];
    }
}; ?>

<div>
    <div class="space-y-2">
        @if ($notes->isEmpty())
            <div class="text-center">
                <p class="text-xl font bold">No notes yet!</p>
                <p class="text-sm">Click the button bellow to add your first notes</p>
                <x-button primary right-icon="plus" class="mt-6" href="{{route('notes.create')}}" wire:navigate>Create Note</x-button>
            </div>
        @else
            <x-button primary right-icon="plus" class="my-6" href="{{route('notes.create')}}" wire:navigate>Create Note</x-button>
            <div class="grid grid-cols-2 gap-4">
                @foreach ($notes as $note)
                    <x-card wire:key='{{$note->id}}'>
                        <div class="flex justify-between">
                            <div>
                                <a href="" class="text-xl font-bold hover:underline hover:text-blue-500">{{$note->title}}</a>
                                <p>{{Str::limit($note->body, 100)}}</p>
                            </div>
                            <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($note->send_date)->format('M-d-Y')}}</div>
                        </div>
                        <div class="flex items-end justify-between mt-4 space-x-1">
                            <p class="text-xs">Recipient: <span class="font-semi-bold">{{$note->recipient}}</span></p>
                            <div>
                                <x-mini-button rounded info icon="eye"></x-mini-button>
                                <x-mini-button rounded negative icon="trash"></x-mini-button>
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>
        @endif
    </div>

</div>
