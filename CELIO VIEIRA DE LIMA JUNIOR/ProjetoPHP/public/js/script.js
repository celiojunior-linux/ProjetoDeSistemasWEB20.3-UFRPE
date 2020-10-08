function logout(){
    if(confirm("Are you sure?")){
        window.location.href = "/logout";
    }
}

function deleteUser(){
    if(confirm("Are you sure?")){
        document.getElementById("delete-user-form").submit();
    }
}


function deleteAllUserTasks(){
    if(confirm("Are you sure?")){
        document.getElementById("delete-all-tasks-form").submit();
    }
}