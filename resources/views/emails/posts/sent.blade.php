@component('mail::message')
# 投稿がありました

{{ $postTitle }}

@component('mail::button', ['url' => route('home')])
投稿を見る
@endcomponent

{{ config('app.name') }}
@endcomponent
