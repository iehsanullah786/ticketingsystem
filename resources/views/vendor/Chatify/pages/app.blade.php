@include('Chatify::layouts.headLinks')
@php
    $cannedReplies = App\Models\CannedReply::all();
@endphp
<div class="messenger">
    {{-- ----------------------Users/Groups lists side---------------------- --}}
    <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">


        <div class="m-body contacts-container">

        @role('agent')
        {{-- Canned Replies Dropdown Section --}}
        <div class="canned-replies-section p-3">
            <h6 class="section-title fw-bold">Canned Replies</h6>
            <div class="accordion" id="cannedRepliesAccordion">
                @forelse ($cannedReplies as $reply)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-{{ $reply->id }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $reply->id }}" aria-expanded="false" aria-controls="collapse-{{ $reply->id }}">
                                {{ $reply->title }}
                            </button>
                        </h2>
                        <div id="collapse-{{ $reply->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $reply->id }}" data-bs-parent="#cannedRepliesAccordion">
                            <div class="accordion-body d-flex justify-content-between align-items-center">
                                <span id="body-{{ $reply->id }}" style="font-weight:12px !important;"> {{ $reply->body }}</span>
                                <!-- Copy Icon -->
                                <button class="btn btn-outline-secondary btn-sm copy-btn" data-copy-id="body-{{ $reply->id }}" title="Copy" style="border-color:#CAA767">
                                    <i class="fas fa-copy" style="color:#CAA767 ;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No canned replies available.</p>
                @endforelse
            </div>
        </div>
        @endrole


        @role('customer')
        {{-- Canned Replies Dropdown Section --}}
        <div class="canned-replies-section p-3">
            <h6 class="section-title fw-bold">
                Any Notes
            </h6>

        </div>
        @endrole

           <div class="show messenger-tab users-tab app-scroll" data-view="users">
               {{-- Favorites --}}
               <div class="favorites-section">


                <div class="messenger-favorites app-scroll-hidden"></div>
               </div>

           </div>

        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}
    <div class="messenger-messagingView">
        {{-- header title [conversation name] amd buttons --}}
        <div class="m-header m-header-messaging">
            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                {{-- header back button, avatar and user name --}}
                <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                    </div>
                    <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                </div>
                {{-- header buttons --}}
                <nav class="m-header-right">

                    <a href="{{ url()->previous()}}">
                        <i class="fas fa-home"></i>
                    </a>
                    <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                </nav>
            </nav>
            {{-- Internet connection --}}
            <div class="internet-connection">
                <span class="ic-connected">Connected</span>
                <span class="ic-connecting">Connecting...</span>
                <span class="ic-noInternet">No internet access</span>
            </div>
        </div>

        {{-- Messaging area --}}
        <div class="m-body messages-container app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
            </div>

            {{-- Typing indicator --}}

            <div class="typing-indicator">
                <div class="message-card typing">
                    <div class="message">
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </div>
                </div>
            </div>

        </div>
        {{-- Send Message Form --}}
        @include('Chatify::layouts.sendForm')
    </div>
    {{-- ---------------------- Info side ---------------------- --}}
    <div class="messenger-infoView app-scroll">
        {{-- nav actions --}}
        <nav>
            <p class="fw-bold">User Details</p>
            <a href="#"><i class="fas fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add event listener for all copy buttons
        const copyButtons = document.querySelectorAll('.copy-btn');
        copyButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Get the ID of the element to copy
                const copyId = this.getAttribute('data-copy-id');
                const textToCopy = document.getElementById(copyId).innerText;

                // Copy the text to the clipboard
                navigator.clipboard.writeText(textToCopy).then(() => {


                }).catch(err => {
                    console.error('Failed to copy text: ', err);
                });
            });
        });
    });
</script>
@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
