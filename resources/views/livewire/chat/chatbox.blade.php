<div>
    {{-- The best athlete wants his opponent at his best. --}}

    @if ($selectedConversation)
    <div class="chatbox_header">
        <div class="return">
            <i class="bi bi-arrow-left"></i>
        </div>
        
        <div class="img_container">
            <img src="https://ui-avatars.com/api/?name={{ $receiverInstance->name }}&bold=true" alt="">
        </div>

        <div class="name">{{ $receiverInstance->name }}</div>
        <div class="info">
            <div class="info_item">
                <i class="bi bi-telephone-fill"></i>
            </div>
            <div class="info_item">
                <i class="bi bi-image"></i>
            </div>
            <div class="info_item">
                <i class="bi bi-info-circle"></i>
            </div>
        </div>
    </div>

    <div class="chatbox_body">
        @foreach ($messages as $message)
        <div wire:key='{{ $message->id }}' class="msg_body {{ auth()->id() == $message->sender_id ? 'msg_body_me' : 'msg_body_receiver' }}">
            {{ $message->body }}
            <div class="msg_body_footer">
                <div class="date">{{ $message->created_at->format('m:i a') }}</div>
                <div class="read">
                    <i class="bi bi-check"></i>
                </div>
            </div>
            
        </div>
        @endforeach
       

        {{-- <div class="msg_body msg_body_me">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio culpa quasi vitae impedit ad minus ratione esse. Sunt quae inventore suscipit, exercitationem porro iure fugiat sit voluptates aliquid repellat molestiae!

            <div class="msg_body_footer">
                <div class="date">2 Days Ago</div>
                <div class="read">
                    <i class="bi bi-check"></i>
                </div>
            </div>
        </div> --}}
    </div>  
    <script>
        $('.chatbox_body').on('scroll', function() {
            var top = $('.chatbox_body').scrollTop()
            if(top == 0) {
                window.livewire.emit('loadMore')
            }
        })
    </script>
    @else
    <div class="fs4 text-center text-primary mt-5">
        No Conversation Selected
    </div>
    @endif

    

    <script>
        window.addEventListener('rowChatToBottom', event =>{
            $('.chatbox_body').scrollTop($('.chatbox_body')[0].scrollHeight)
        })
    </script>

    
</div>
