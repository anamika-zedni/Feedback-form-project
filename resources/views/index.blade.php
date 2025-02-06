<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Submit Your Feedback</h2>
        
        <!-- Feedback Form -->
        <form method="POST" action="{{ route('feedback.store') }}">
            @csrf
            <div class="mb-3">
                <label for="feedback" class="form-label">Your Feedback</label>
                <textarea class="form-control" id="feedback" name="feedback" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Clear Feedback Button -->
        <form method="POST" action="{{ route('feedback.clear') }}" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger">Clear Feedback</button>
        </form>

        <!-- Recent Feedbacks -->
        <div class="mt-4">
            <h3>Recent Feedbacks</h3>
            <ul class="list-group">
                @if(session()->has('feedbacks') && count(session('feedbacks')) > 0)
                    @foreach(session('feedbacks') as $feedback)
                        <li class="list-group-item">{{ $feedback }}</li>
                    @endforeach
                @else
                    <li class="list-group-item text-muted">No feedback available.</li>
                @endif
            </ul>
        </div>
    </div>
</body>
</html>
