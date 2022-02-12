@extends('layouts')

@section('content')


    <div>
        <h3>Hello {{ $username }} !</h3>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>UID</th>
                <th>Subject</th>
                <th>From</th>
                <th>Date</th>
                <th>Attachments</th>
            </tr>
        </thead>
        <tbody>
            @if ($paginator->count() > 0)
                @foreach ($paginator as $oMessage)
                    <tr>
                        <td><span>{{ $oMessage->getUid() }}</span></td>
                        <td><span class="subject">{{ $oMessage->getSubject() }}</span></td>
                        <td><span class="from">{{ $oMessage->getFrom()[0]->mail }}</span></td>
                        <td><span class="date">{{ $oMessage->getDate() }}</span></td>
                        <td>{{ $oMessage->getAttachments()->count() > 0 ? 'yes' : 'no' }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No messages found</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $paginator->links() }}
@endsection
