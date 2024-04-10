@component('mail::message')
กรุณากดปุ่มเพื่อยืนยันตัวตนคุณ {{ $name }}

@component('mail::button', ['url' => 'https://www.google.com'])
    Click here
@endcomponent

@endcomponent