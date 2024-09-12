<ul>
    <li>
        <div class="drop-title">Notifications</div>
    </li>
    <li>
        <div class="message-center">
            @if(count($data) > 0)
            @foreach ($data as $dt)
            <a href="javascript:void(0)">
                <div class="mail-contnet">
                <h5>{{substr($dt->task,0,40)}}</h5><span class="time">{{date("h:i A",strtotime($dt->created_at))}}</span>
                </div>
            </a>
            @endforeach
            @else
            <a href="javascript:void(0)">
                <div class="mail-contnet">
                    <h5>No New Notification</h5>
                </div>
            </a>
            @endif
        </div>
    </li>
</ul>