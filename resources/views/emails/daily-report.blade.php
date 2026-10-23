<h2>Sparrow Portal Daily Report</h2>

<p>Today's Summary:</p>

<ul>
<li>Active Jobs: {{ $jobs }}</li>

<li>New Applications:
{{ $applications }}
</li>

<li>Shortlisted:
{{ $shortlisted }}
</li>

</ul>


<h3>Top Job</h3>

<p>
{{ $topJob->position ?? 'No Data' }}
</p>
