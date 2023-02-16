
<table>
    <thead>
    <tr>
        <th >Name</th>
        <th >Url</th>
        <th >Domain</th>
    </tr>
    </thead>
    <tbody>
    @foreach($universities as $university)
        <tr>
            <td >{{ $university->name }}</td>
            <td >{{ $university->web_pages[0] }}</td>
            <td >{{ $university->domains[0]??$university->domains[0]}}</td>
        </tr>
    @endforeach
    </tbody>
</table>