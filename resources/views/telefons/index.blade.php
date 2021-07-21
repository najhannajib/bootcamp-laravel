List of phone:

<ul>
    @foreach ($telefons as $telefon)
        <li>Name: {{$telefon->nama}}, Price: {{$telefon->harga}}, Brand: {{$telefon->jenama}}, Model number: {{$telefon->no_model}}, Serial number: {{$telefon->no_serial}},</li>
    @endforeach
</ul>

<form method="POST" action="/telefons">
    @csrf

    Name: <input type="text" name="nama">
    Price: <input type="number" name="harga">
    Brand: <input type="text" name="jenama">
    Model Number: <input type="text" name="no_model">
    Serial Number: <input type="text" name="no_serial">


    <input type="hidden" name="kedai_id" value=1>
    <button type="submit">Submit</button>
</form>