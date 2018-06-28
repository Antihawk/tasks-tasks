function functionPrev() {
    var taskNameModal = document.getElementById("task-name").value,
        taskEmailModal = document.getElementById("task-email").value,
        taskTextModal = document.getElementById("task-text").value;
    
        document.getElementById("modal-name").innerHTML = taskNameModal;
        document.getElementById("modal-email").innerHTML = taskEmailModal;
        document.getElementById("modal-text").innerHTML = taskTextModal;
}

