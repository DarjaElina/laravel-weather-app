<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Weather App</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="container">
    <div class="form">
      <h1>Weather App</h1>

      <form method="get" action="{{ route('weather') }}">
        <label class="label" for="city">Enter city name</label>

        <input
          type="text"
          name="city"
          class="input"
          placeholder="e.g., London"
          id="city"
          autocomplete="off"
          value="{{ $city }}"
        />

        <button type="submit" class="btn btn-default">Get Weather</button>
      </form>
    </div>

    @if ($error)
      <div class="alert" style="color: var(--accent-1); margin-top: 1em;">
        {{ $error }}
      </div>

    @elseif (!empty($weatherData))
      <div class="weather-result">
        <h2>Weather in {{ $weatherData['name'] }}</h2>

        <table class="table">
          <thead>
            <tr>
              <th>Attribute</th>
              <th>Value</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Temperature</td>
              <td>{{ $weatherData['main']['temp'] }}°C</td>
            </tr>
            <tr>
              <td>Weather</td>
              <td>{{ $weatherData['weather'][0]['main'] }}</td>
            </tr>
            <tr>
              <td>Humidity</td>
              <td>{{ $weatherData['main']['humidity'] }}%</td>
            </tr>
            <tr>
              <td>Wind Speed</td>
              <td>{{ $weatherData['wind']['speed'] }} m/s</td>
            </tr>
          </tbody>
        </table>
      </div>
    @endif
  </div>
</body>
</html>