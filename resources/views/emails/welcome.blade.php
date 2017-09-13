@component('mail::message')
# Hola, {{ $name }}, bienvenido a ConsultasMD

The body of your message.

@component('mail::button', ['url' => 'cursos'])
ver cursos
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
