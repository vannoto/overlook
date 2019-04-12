function loadResults(){
    var TEST_NUMRESULTS = 23;
    var RESULTS = [];
    var PLACEHOLDER_IMG = "./test.png"
    var DESCRIPTION_TEXT = "Brown Cardigan"
    var LOCATION_TEXT = "Depop"
    
    // load all images into results array, in practice, this will come from our database
    for (var i = 0; i < TEST_NUMRESULTS; i++){
        var container = document.createElement("div");
        container.id = "container";
        
        var temp_img = document.createElement("IMG");
        temp_img.id = "result_img"
        temp_img.src = PLACEHOLDER_IMG;
        temp_img.width = 180;
        temp_img.alt = "result";
        
        var description = document.createElement("p");
        var location = document.createElement("p");
        var desc = document.createTextNode(DESCRIPTION_TEXT);
        var loc = document.createTextNode(LOCATION_TEXT);
        
        container.appendChild(temp_img);
        container.appendChild(description);
        container.appendChild(location);
        description.appendChild(desc);
        location.appendChild(loc);
        RESULTS.push(container);
    }
    
    return(RESULTS);
}

function displayResults(){
    var RESULTS = loadResults();
    var numRows = Math.floor(RESULTS.length / 4) + 1;
    
    var count = 0;
    var table = document.createElement('table')
    for (row = 1; row <= numRows; row++) {
        var new_row = document.createElement('tr');
        
        // account for uneven results
        if (row == numRows){
            for (cell = 1; cell <= (RESULTS.length % 4); cell++) {
                new_cell = document.createElement('td');
                new_row.appendChild(new_cell);
            
                count++;
                new_cell.appendChild(RESULTS[count - 1]);
            }
        }
        else {
            for (cell = 1; cell <= 4; cell++) {
                new_cell = document.createElement('td');
                new_row.appendChild(new_cell);

                count++;
                new_cell.appendChild(RESULTS[count - 1]);
            }
        }
        table.appendChild(new_row);
    }
    document.getElementById('results').appendChild(table);
    
    
}