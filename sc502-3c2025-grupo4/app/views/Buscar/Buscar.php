<html>
<head>
    <title>Voluntariado</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/estilos.css" />
    <link rel="stylesheet" href="../../css/menu.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script>
        function searchContent() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let items = document.querySelectorAll(".searchable");
            let resultsContainer = document.getElementById("searchResults");
            resultsContainer.innerHTML = "";

            items.forEach(item => {
                let text = item.textContent.toLowerCase();
                if (text.includes(input)) {
                    let listItem = document.createElement("li");
                    listItem.innerHTML = `
                        <span>${item.textContent}</span>
                        <button class="view-btn" onclick="viewItem('${item.textContent}')">Ver</button>
                        <button class="edit-btn" onclick="editItem('${item.textContent}')">Editar</button>
                        <button class="delete-btn" onclick="deleteItem('${item.textContent}')">Eliminar</button>
                    `;
                    resultsContainer.appendChild(listItem);
                }
            });
        }

        function filterContent(criteria) {
            alert("Filtrando por: " + criteria);
        }
    </script>
</head>
<body>
    <header class="header">
        <ul class="menu">
            <div class="menu-left">
                <li class="menu-item"><a href="../plantilla.html">Voluntariado</a></li>
                <li class="menu-item searchable"><a href="#">Noticias</a></li>
                <li class="menu-item searchable"><a href="#">Eventos</a></li>
                <li class="menu-item searchable"><a href="#">Contacto</a></li>
            </div>
            <div class="menu-right">
                <button onclick="showSearch()">Buscar</button>
                <button onclick="location.href='agregarVoluntariado.html'">Agregar Voluntariado</button>
            </div>
        </ul>
    </header>

    <div class="tabs">
        <button class="active" onclick="filterContent('Todos')">Todos</button>
        <button onclick="filterContent('En progreso')">En progreso</button>
        <button onclick="filterContent('Futuros')">Futuros</button>
        <button onclick="filterContent('Pasados')">Pasados</button>
    </div>

    <div class="filter-section">
        <div class="filter-dropdown" onclick="filterContent('Último acceso')">Ordenar por: Último acceso</div>
    </div>

    <div id="searchSection">
        <input type="text" id="searchInput" placeholder="Buscar...">
        <button onclick="searchContent()">Buscar</button>
        <ul id="searchResults"></ul>
    </div>
</body>
</html>
