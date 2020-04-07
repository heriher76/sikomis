@component('mail::message')
{{-- Greeting --}}
<center><img src="{{ url('images/logo_komisariat.png') }}" style="width: 200px;"></center>
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Assalamu'alaikum wr.wb.
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

@if ($type == 'news')
<center>
    <b>{{ $item->title }}</b>
    <br>
    <img src="{{ url('news-thumbnail/'.$item->thumbnail) }}" style="width: 200px;">
</center>
@else
<center>
    <b>{{ $item->title }}</b>
    <br>
    <img src="{{ url('articles-thumbnail/'.$item->thumbnail) }}" style="width: 200px;">
</center>
@endif

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'green';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Salam Perjuangan,<br>Humas SIKOMIS
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
Jika anda mengalami permasalahan dengan klik tombol "{{ $actionText }}", salin dan tempel alamat URL berikut
ke laman web anda: [{{ $actionUrl }}]({!! $actionUrl !!})
@endcomponent
@endisset
@endcomponent
