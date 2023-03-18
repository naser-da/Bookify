<h1>{{ $concert->title }}</h1>

<h2>{{ $concert->subtitle }}</h2>

<p>{{ $concert->formatted_date }}</p>
<p>Doors open at {{$concert->formatted_start_time}}</p>

<p>{{ $concert->ticket_price_in_dollars }}</p>

<p>Venue: {{$concert->venue}}</p>
<p>Venue Address: {{$concert->venue_address}}</p>
<p>Address Details: {{$concert->city}}, {{$concert->state}} {{$concert->zip}}</p>

<p>Additional Information: {{$concert->additional_information}}</p>