@foreach ($bookings as $booking)
    <div class="card">
        <div class="card-body">
            <p>Utente: {{ $booking->user->name }}</p>
            <p>Corso: {{ $booking->course->name }}</p>
            <p>Data e Ora: {{ $booking->date_time }}</p>
            <p>Status: {{ $booking->status }}</p>
            <form action="{{ route('bookings.accept', $booking) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Accetta</button>
            </form>
            <form action="{{ route('bookings.reject', $booking) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Rifiuta</button>
            </form>
        </div>
    </div>
@endforeach

