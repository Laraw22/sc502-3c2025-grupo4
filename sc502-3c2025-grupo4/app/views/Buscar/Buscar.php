<!DOCTYPE html>
<html lang="es">


<body>


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
</html>

