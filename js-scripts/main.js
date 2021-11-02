/*
    This is note for how I think we can get
    the account management page table up

    function teamMemberStatus(data){
        $("#userTable").empty();
        var userTable = data.d;
        for (i = 0; i <= userTable.rows.length -1; i++){
            $("userTable").append("<tr><td>" + userTable.Rows[i].firstName +"</td><td>" + etc.)
        }
    }
*/
var accountTable = document.getElementById('userTable');
var row = accountTable.insertRow(0);
var cell1 = row.insertCell(0);
var cell2 = row.insertCell(1);
cell1.innerHTML = "New Cell";
cell2.innerHTML = "New Cell 2";