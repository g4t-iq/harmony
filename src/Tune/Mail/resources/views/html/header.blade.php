@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Harmony')
<img src="https://harmony.com/img/notification-logo.png" class="logo" alt="Harmony Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
