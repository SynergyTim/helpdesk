<!DOCTYPE html>
<html>

<head>
    <title>Laporan Helpdesk</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10pt;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            vertical-align: top;
            font-size: 9pt;
        }

        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>

    <h2>Laporan Helpdesk</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Data Pelaporan</th>
                <th>Kategori Pelaporan</th>
                <th>Penanggung Jawab</th>
                <th>Keluhan</th>
                <th>Penanganan</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp

            @foreach($helpdesk as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>
                    {{ $item->reporter }}<br />
                    {{ $item->division }}<br />
                    {{ $item->phone_number }}
                </td>
                <td>{{ $item->information }}</td>
                <td>{{ $item->unit }}</td>
                <td>{{ $item->complaint }}</td>
                <td>{{ $item->handling }}</td>
                <td>{{ $item->officer }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>