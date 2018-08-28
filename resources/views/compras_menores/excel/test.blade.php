<table>
    <thead>
    <tr>
        <th>
        </th>
        <th>
        </th>
        <th>
            <h1>REQUISICIÓN DE BIENES Y/O SERVICIOS</h1>
        </th>
        <th>
        </th>
        <th>
        </th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>DEPENDENCIA:</td>
            <td>MUNICIPIO DE SAN MARTIN TEXMELUCAN, PUEBLA</td>
        </tr>
        <tr>
            <td>DEPARTAMENTO SOLICITANTE:</td>
            <td>DIRECCIÓN DE ADQUISICIONES, ARRENDAMIENTOS Y SERVICIOS</td>
        </tr>
        <tr>
            <td>TELÉFONO:</td>
            <td>109 53 00 EXT. 142 -143</td>
        </tr>
        <tr>
            <th>No. Partida</th>
            <th>No. Factura</th>
            <th>Descripcion</th>
            <th>Cantidad Solicitada</th>
            <th>Cantidad Autorizada</th>
            <th>Precio Unitario 1</th>
            <th>Total</th>
            <th>Precio Unitario 2</th>
            <th>Total</th>
            <th>Cantidad Entregada</th>
            <th>Nombre y firma de recibido</th>
            <th>Fecha de recibido</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>