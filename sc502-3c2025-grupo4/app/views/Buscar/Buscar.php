<table id="voluntariadosTable" class="display">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Finalización</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($voluntariados as $v): ?>
            <tr class="searchable">
                <td><?= htmlspecialchars($v['titulo']) ?></td>
                <td><?= htmlspecialchars($v['descripcion']) ?></td>
                <td><?= htmlspecialchars($v['fecha_inicio']) ?></td>
                <td><?= htmlspecialchars($v['fecha_fin']) ?></td>
                <td><?= htmlspecialchars($v['estado']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('#voluntariadosTable').DataTable();
    });
</script>
