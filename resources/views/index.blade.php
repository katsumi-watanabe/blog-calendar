<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravelでカレンダー表示</title>
    <link rel="stylesheet" href="{{ asset('common/css/style.css') }}">
    <link href="{{ asset('common/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="calendar_box container">
        <div class="calendar-head">
        <a class="arrow-back" href="{{ route('calendar.index', ['year' => $firstDayOfMonth->copy()->subMonth()->year, 'month' => $firstDayOfMonth->copy()->subMonth()->month]) }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
            </svg>
        </a>
        <p class="current_month"><em>{{$firstDayOfMonth->format('Y')}}</em>年<em>{{$firstDayOfMonth->format('n')}}</em>月</p>
        <a class="arrow-next" href="{{ route('calendar.index', ['year' => $firstDayOfMonth->copy()->addMonth()->year, 'month' => $firstDayOfMonth->copy()->addMonth()->month]) }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
            </svg>
        </a>
        </div>
        <table class="calendar">
            <tr>
                @foreach ($weeks as $i => $week)
                    <th
                        @if ($i === \Carbon\Carbon::SUNDAY) class="sun" @elseif ($i === \Carbon\Carbon::SATURDAY) class="sat" @endif>
                        {{ $week }}
                    </th>
                @endforeach
            </tr>
            <tr>
                @foreach ($dates as $arr => $date)
                    @if ($date->isSunday())
            <tr>
                @endif
                <td
                    @if ($date->isSunday()) class="sun"
                    @elseif($date->isSaturday()) class="sat" @endif>

                    @if ($arr == 0 || $date->format('j') == 1)
                        <span>{{ $date->format('n/j') }}</span>
                    @else
                        <span>{{ $date->format('j') }}</span>
                    @endif
                </td>
                @if ($date->isSaturday())
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('common/js/bootstrap/bootstrap.min.js') }}"></script>
</body>

</html>
