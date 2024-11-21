document.addEventListener("DOMContentLoaded", function () {
  const buildingSelect = document.getElementById("building");
  const boardroomSelect = document.getElementById("boardroom");
  //const boardroomData = document.getElementById("boardroomData");

  // Fetch JSON data from the PHP file
  fetch("data.php")
    .then((response) => response.json())
    .then((data) => {
      // Populate the building select dropdown
      for (const building in data) {
        const option = document.createElement("option");
        option.value = building;
        option.textContent = building;
        buildingSelect.appendChild(option);
      }

      // Add event listener for building select change
      buildingSelect.addEventListener("change", function () {
        const selectedBuilding = buildingSelect.value;
        if (selectedBuilding) {
          populateBoardroomSelect(data[selectedBuilding]);
          boardroomSelect.disabled = false;
        } else {
          boardroomSelect.innerHTML =
            '<option value="">--Select a Boardroom--</option>';
          boardroomSelect.disabled = true;
          boardroomData.innerHTML = "";
        }
      });

      // Add event listener for boardroom select change
      boardroomSelect.addEventListener("change", function () {
        const selectedBuilding = buildingSelect.value;
        const selectedBoardroom = boardroomSelect.value;
        if (selectedBuilding && selectedBoardroom) {
          const boardrooms = data[selectedBuilding].filter(
            (room) => room.boardroom_name === selectedBoardroom
          );
          displayBoardroomData(boardrooms);
        } else {
          boardroomData.innerHTML = "";
        }
      });
    })
    .catch((error) => console.error("Error fetching data:", error));

  function populateBoardroomSelect(boardrooms) {
    boardroomSelect.innerHTML =
      '<option value="">--Select a Boardroom--</option>';
    boardrooms.forEach((room) => {
      const option = document.createElement("option");
      option.value = room.boardroom_name;
      option.textContent = room.boardroom_name;
      boardroomSelect.appendChild(option);
    });
  }

  function displayBoardroomData(boardrooms) {
    // Clear previous data
    boardroomData.innerHTML = "";

    if (boardrooms.length > 0) {
      // Create a table to display the data
      const table = document.createElement("table");
      const thead = document.createElement("thead");
      const tbody = document.createElement("tbody");

      // Define table headers
      const headers = [
        "names",
        "names",
      ];
      const tr = document.createElement("tr");
      headers.forEach((header) => {
        const th = document.createElement("th");
        th.textContent = header;
        tr.appendChild(th);
      });
      thead.appendChild(tr);

      // Populate table rows with data
      boardrooms.forEach((room) => {
        const tr = document.createElement("tr");
        Object.values(room).forEach((value) => {
          const td = document.createElement("td");
          td.textContent = value;
          tr.appendChild(td);
        });
        tbody.appendChild(tr);
      });

      table.appendChild(thead);
      table.appendChild(tbody);
      boardroomData.appendChild(table);
    } else {
      boardroomData.textContent =
        "No boardrooms found for the selected building.";
    }
  }
});
