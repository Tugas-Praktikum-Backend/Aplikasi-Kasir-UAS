<h1>Add Discount</h1>

<a href="{{ route('discounts.index') }}">Back</a>

<br><br>

<form action="{{ route('discounts.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Discount Name" required>
    <input type="number" step="0.01" name="percentage" placeholder="Percentage" required>
    <input type="date" name="start_date">
    <input type="date" name="end_date">
    <button type="submit">Save</button>
</form>