function addData() {
    // Get values from input fields
    var id = document.getElementById("id").value;
    var id_str = document.getElementById("id_str").value;
    var screen_name = document.getElementById("screen_name").value;
    var location = document.getElementById("location").value;
    var description = document.getElementById("description").value;
    var url = document.getElementById("url").value;
    var followers_count = document.getElementById("followers_count").value;
    var friends_count = document.getElementById("friends_count").value;
    var listed_count = document.getElementById("listed_count").value;
    var created_at = document.getElementById("created_at").value;
    var favourites_count = document.getElementById("favourites_count").value;
    var verified = document.getElementById("verified").value;
    var statuses_count = document.getElementById("statuses_count").value;
    var lang = document.getElementById("lang").value;
    var status = document.getElementById("status").value;
    var default_profile = document.getElementById("default_profile").value;
    var default_profile_image = document.getElementById("default_profile_image").value;
    var has_extended_profile = document.getElementById("has_extended_profile").value;
    var name = document.getElementById("name").value;

    // Get table reference
    var table = document.getElementById("dataTable");

    // Insert a new row at the last position (-1 means last position)
    var row = table.insertRow(-1);

    // Insert cells into the row
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    var cell8 = row.insertCell(7);
    var cell9 = row.insertCell(8);
    var cell10 = row.insertCell(9);
    var cell11 = row.insertCell(10);
    var cell12 = row.insertCell(11);
    var cell13 = row.insertCell(12);
    var cell14 = row.insertCell(13);
    var cell15 = row.insertCell(14);
    var cell16 = row.insertCell(15);
    var cell17 = row.insertCell(16);
    var cell18 = row.insertCell(17);
    var cell19 = row.insertCell(18);
    var cell20 = row.insertCell(19);

    // Set inner HTML of cells to the values obtained
    cell1.innerHTML = id;
    cell2.innerHTML = id_str;
    cell3.innerHTML = screen_name;
    cell4.innerHTML = location;
    cell5.innerHTML = description;
    cell6.innerHTML = url;
    cell7.innerHTML = followers_count;
    cell8.innerHTML = friends_count;
    cell9.innerHTML = listed_count;
    cell10.innerHTML = created_at;
    cell11.innerHTML = favourites_count;
    cell12.innerHTML = verified;
    cell13.innerHTML = statuses_count;
    cell14.innerHTML = lang;
    cell15.innerHTML = status;
    cell16.innerHTML = default_profile;
    cell17.innerHTML = default_profile_image;
    cell18.innerHTML = has_extended_profile;
    cell19.innerHTML = name;

    // Clear input fields after adding data
    document.getElementById("id").value = "";
    document.getElementById("id_str").value = "";
    document.getElementById("screen_name").value = "";
    document.getElementById("location").value = "";
    document.getElementById("description").value = "";
    document.getElementById("url").value = "";
    document.getElementById("followers_count").value = "";
    document.getElementById("friends_count").value = "";
    document.getElementById("listed_count").value = "";
    document.getElementById("created_at").value = "";
    document.getElementById("favourites_count").value = "";
    document.getElementById("verified").value = "";
    document.getElementById("statuses_count").value = "";
    document.getElementById("lang").value = "";
    document.getElementById("status").value = "";
    document.getElementById("default_profile").value = "";
    document.getElementById("default_profile_image").value = "";
    document.getElementById("has_extended_profile").value = "";
    document.getElementById("name").value = "";
}
