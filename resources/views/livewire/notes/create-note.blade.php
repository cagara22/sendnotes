<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;

    public function submit(){
        $validated = $this->validate([
            'noteTitle' => 'required|string|min:5',
            'noteBody' => 'required|string|min:20',
            'noteRecipient' => 'required|email',
            'noteSendDate' => 'required|date'
        ]);

        auth()->user()->notes()->create([
            'title' => $this->noteTitle,
            'body' => $this->noteBody,
            'recipient' => $this->noteRecipient,
            'send_date' => $this->noteSendDate,
            'is_published' => true
        ]);

        redirect(route('notes.index'));
    }
}; ?>

<div>
    <form wire:submit='submit' class="space-y-4">
        <x-errors />
        <x-input wire:model="noteTitle" label="Title" placeholder="Put your title here..." />
        <x-textarea wire:model="noteBody" label="Body" placeholder="Put your message here..." />
        <x-input icon="user" wire:model="noteRecipient" label="Recipient" placeholder="yourfriend@email.com" />
        <x-input icon="calendar" wire:model="noteSendDate" type="date" label="Send Date" />

        <div class="pt-4">
            <x-button type="submit" primary right-icon="calendar" spinner>Submit</x-button>
        </div>
    </form>
</div>
