<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    <h1>Job Listings</h1>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <h2>{{ $job['title'] }}</h2>
                <p>{{ $job['description'] }}</p>
            </li>
        @endforeach
    </ul>
</div>