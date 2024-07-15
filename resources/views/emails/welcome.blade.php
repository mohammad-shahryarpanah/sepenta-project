@component('mail::message')
    # خوش آمدید، {{ $user->name }}

    شما با موفقیت ثبت‌نام کرده‌اید. از شما خوش آمد می‌گوییم!

    @component('mail::button', ['url' => ''])
        مشاهده پروفایل
    @endcomponent

    با تشکر,<br>
    {{ config('app.name') }}
@endcomponent
