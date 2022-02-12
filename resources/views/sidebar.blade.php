<nav class="nav flex-column flex-nowrap vh-100 overflow-auto text-white p-2">
    <ul class="navbar-nav nav-fill">
        @if ($folders->count() > 0)
            @foreach ($folders as $oFolder)
                <li class="nav-item">
                    <a href="{{ route('folder', ['path' => $oFolder->path]) }}"
                        class="nav-link  {{ $oFolder->path == $current_folder ? 'active' : 'text-white' }}">{{ $oFolder->name }}
                        ({{ $oFolder->search()->unseen()->leaveUnread()->setFetchBody(false)->count() }})</a>
                </li>
            @endforeach
        @else
            <a>No folders found</a>
        @endif
        <li class="nav-item">
            <a href="{{ route('compose') }}" class="btn btn-primary">+ Compose</a>
        </li>
    </ul>

</nav>
